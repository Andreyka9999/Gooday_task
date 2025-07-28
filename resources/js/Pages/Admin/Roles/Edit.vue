<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  role: Object,
  permissions: Object, // группы: { Blog: [], News: [] }
})

const form = useForm({
  permissions: Object.values(props.permissions).flat()
    .filter(p => p.checked)
    .map(p => p.name)
})

function submit() {
  form.post(route('admin.roles.updatePermissions', props.role.id))
}
</script>

<template>
  <div class="max-w-2xl mx-auto mt-12 bg-white rounded-lg shadow p-8">
    <h1 class="text-2xl font-bold mb-6">Edit Permissions for "{{ props.role.name }}"</h1>
    <form @submit.prevent="submit" class="space-y-6">
      <div v-for="(perms, group) in props.permissions" :key="group">
        <div class="font-semibold mb-2">{{ group }}</div>
        <div class="space-y-2 pl-4">
          <div v-for="perm in perms" :key="perm.id" class="flex items-center">
            <input
              type="checkbox"
              :id="perm.name"
              :value="perm.name"
              v-model="form.permissions"
              class="mr-2"
            />
            <label :for="perm.name" class="text-gray-700">{{ perm.name }}</label>
          </div>
        </div>
      </div>
      <button
        type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded"
        :disabled="form.processing"
      >
        Save
      </button>
    </form>
  </div>
</template>
