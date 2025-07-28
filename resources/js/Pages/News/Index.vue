<script setup>
defineProps({ news: Array })
</script>

<template>
  <div class="max-w-4xl mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6 text-center">News - public page</h1>
    <div v-if="news.length" class="grid md:grid-cols-2 gap-6">
      <div v-for="item in news" :key="item.id" class="bg-white rounded shadow p-4">
        <img :src="item.image ?? 'https://images.freeimages.com/image/previews/9f6/socialpost-light-5690375.jpg?fmt=webp&h=120&' + item.id" class="w-full h-36 object-cover rounded mb-2" />
        <div class="font-bold text-xl mb-1">{{ item.title }}</div>
        <div class="text-gray-600 mb-2">{{ item.short_description }}</div>
        <a :href="`/news/${item.id}`" class="text-indigo-600 hover:underline">Read more →</a>
      </div>
    </div>
    <div v-else class="text-gray-400 text-center">No news</div>
  </div>
</template>
