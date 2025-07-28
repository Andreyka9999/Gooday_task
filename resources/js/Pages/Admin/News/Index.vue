<template>
  <div class="max-w-4xl mx-auto py-10">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold">News List</h1>
      <a
        href="/admin/news/create"
        class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition"
      >
        + Create News
      </a>
    </div>
    <div class="space-y-4">
      <div
        v-for="newsItem in news.data"
        :key="newsItem.id"
        class="bg-white rounded-lg shadow p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center"
      >
        <div>
          <div class="text-lg font-semibold">{{ newsItem.title }}</div>
          <div class="text-gray-500 text-sm">{{ newsItem.short_description }}</div>
          <div class="text-xs text-gray-400 mt-1">Created: {{ newsItem.created_at?.slice(0, 10) }}</div>
        </div>
        <div class="flex space-x-2 mt-3 sm:mt-0">
          <a
            :href="`/admin/news/${newsItem.id}/edit`"
            class="px-3 py-1 rounded bg-yellow-400 hover:bg-yellow-500 text-white text-sm"
          >
            Edit
          </a>
          <button
            @click="deleteNews(newsItem.id)"
            class="px-3 py-1 rounded bg-red-500 hover:bg-red-600 text-white text-sm"
          >
            Delete
          </button>
        </div>
      </div>
      <div v-if="!news.data.length" class="text-center text-gray-400 mt-10">No news yet.</div>
    </div>
    <div v-if="news.links" class="mt-8 flex justify-center space-x-2">
      <template v-for="link in news.links" :key="link.label">
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
defineProps({ news: Object })

function deleteNews(id) {
  if (confirm('Delete this news?')) {
    router.delete(`/admin/news/${id}`)
  }
}

function goTo(url) {
  router.visit(url)
}
</script>
