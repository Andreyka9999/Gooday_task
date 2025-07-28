<template>
  <div class="max-w-4xl mx-auto py-10">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold">Blog List</h1>
      <!-- Кнопка создания только для разрешённых -->
      <a
        v-if="can.create"
        href="/admin/blog/create"
        class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition"
      >
        + Create Blog
      </a>
    </div>
    <div class="space-y-4">
      <div
        v-for="blog in blogs.data"
        :key="blog.id"
        class="bg-white rounded-lg shadow p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center"
      >
        <div>
          <div class="text-lg font-semibold">{{ blog.title }}</div>
          <div class="text-gray-500 text-sm">{{ blog.short_description }}</div>
          <div class="text-xs text-gray-400 mt-1">Created: {{ blog.created_at?.slice(0, 10) }}</div>
        </div>
        <div class="flex space-x-2 mt-3 sm:mt-0">
          <!-- Только для разрешённых — Edit -->
          <a
            v-if="can.edit"
            :href="`/admin/blog/${blog.id}/edit`"
            class="px-3 py-1 rounded bg-yellow-400 hover:bg-yellow-500 text-white text-sm"
          >
            Edit
          </a>
          <!-- Только для разрешённых — Delete -->
          <button
            v-if="can.delete"
            @click="deleteBlog(blog.id)"
            class="px-3 py-1 rounded bg-red-500 hover:bg-red-600 text-white text-sm"
          >
            Delete
          </button>
        </div>
      </div>
      <div v-if="!blogs.data.length" class="text-center text-gray-400 mt-10">No blogs yet.</div>
    </div>
    <div v-if="blogs.links" class="mt-8 flex justify-center space-x-2">
      <template v-for="link in blogs.links" :key="link.label">
        <button
          v-if="link.url"
          @click="goTo(link.url)"
          :class="['px-3 py-1 rounded', link.active ? 'bg-indigo-500 text-white' : 'bg-gray-200 text-gray-700']"
          v-html="link.label"
        ></button>
      </template>
    </div>
  </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
defineProps({ blogs: Object, can: Object })

function deleteBlog(id) {
  if (confirm('Delete this blog?')) {
    router.delete(`/admin/blog/${id}`)
  }
}

function goTo(url) {
  router.visit(url)
}
</script>
