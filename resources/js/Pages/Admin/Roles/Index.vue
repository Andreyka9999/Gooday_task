<script setup>
const props = defineProps(['roles'])
</script>

<template>
  <div class="p-8">
    <h2 class="text-2xl font-bold mb-6">Roles</h2>
    <div class="rounded-lg bg-gray-50 p-6">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="px-4 py-2 text-left">Role Name</th>
            <th class="px-4 py-2 text-left">Role Key</th>
            <th class="px-4 py-2"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="role in props.roles" :key="role.id" class="border-t">
            <td class="px-4 py-2">{{ role.name }}</td>
            <td class="px-4 py-2">{{ role.name.toLowerCase() }}</td>
            <td class="px-4 py-2">
              <a
                :href="route('admin.roles.edit', role.id)"
                class="text-indigo-600 hover:underline"
              >Permissions</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
