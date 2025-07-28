<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  title: '',
  short_description: '',
  text: ''
})

function submit() {
  form.post(route('admin.news.store'))
}
</script>

<template>
  <div class="max-w-2xl mx-auto mt-12 bg-white rounded-lg shadow p-8">
    <h1 class="text-2xl font-bold mb-6">Create News</h1>
    <form @submit.prevent="submit" class="space-y-6">
      <div>
        <label class="block text-gray-700">Header</label>
        <input
          v-model="form.title"
          type="text"
          placeholder="Header"
          class="w-full border p-2 rounded focus:ring"
        />
        <div v-if="form.errors.title" class="text-red-600 text-xs">{{ form.errors.title }}</div>
      </div>
      <div>
        <label class="block text-gray-700">Short description</label>
        <input
          v-model="form.short_description"
          type="text"
          placeholder="Short description"
          class="w-full border p-2 rounded focus:ring"
        />
        <div v-if="form.errors.short_description" class="text-red-600 text-xs">{{ form.errors.short_description }}</div>
      </div>
      <div>
        <label class="block text-gray-700">Text</label>
        <textarea
          v-model="form.text"
          placeholder="Text"
          class="w-full border p-2 rounded focus:ring"
          rows="6"
        ></textarea>
        <div v-if="form.errors.text" class="text-red-600 text-xs">{{ form.errors.text }}</div>
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
