<script setup>
import { onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3'

// We receive props from Laravel/Inertia
const props = defineProps(['users', 'roles'])

// Add a field for selected roles to each user (for v-model)
onMounted(() => {
  props.users.forEach(user => {
    user.rolesSelected = user.roles.map(role => role.name)
  })
})

// Function for updating user roles
function updateUserRoles(user) {
  const form = useForm({
    roles: user.rolesSelected,
  })
  form.post(route('admin.permissions.updateRoles', user.id), {
    preserveScroll: true,
    onSuccess: () => {
      successMessage.value = `Roles for "${user.name}" updated successfully!`
      setTimeout(() => successMessage.value = '', 2500)
    },
  })
}
</script>

<template>
  <div class="p-8">
    <h2 class="text-2xl font-bold mb-6">Users and their roles</h2>
    <table class="min-w-full divide-y divide-gray-200">
      <thead>
        <tr>
          <th class="px-4 py-2 text-left">Name</th>
          <th class="px-4 py-2 text-left">Email</th>
          <th class="px-4 py-2 text-left">Roles</th>
          <th class="px-4 py-2"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in props.users" :key="user.id">
          <td class="px-4 py-2">{{ user.name }}</td>
          <td class="px-4 py-2">{{ user.email }}</td>
          <td class="px-4 py-2">
            <select v-model="user.rolesSelected" multiple class="rounded border-gray-300">
              <option v-for="role in props.roles" :key="role.id" :value="role.name">
                {{ role.name }}
              </option>
            </select>
          </td>
          <td class="px-4 py-2">
            <button
              class="bg-indigo-600 text-white px-3 py-1 rounded"
              @click="updateUserRoles(user)"
            >Save</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
