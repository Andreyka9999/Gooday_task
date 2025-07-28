<script setup>
defineProps({ blogs: Array })
</script>

<template>
  <div class="max-w-4xl mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6 text-center">Blog - public page</h1>
    <div v-if="blogs.length" class="grid md:grid-cols-2 gap-6">
      <div v-for="blog in blogs" :key="blog.id" class="bg-white rounded shadow p-4">
        <img :src="blog.image ?? 'https://images.freeimages.com/image/previews/9f6/socialpost-light-5690375.jpg?fmt=webp&h=120&' + blog.id" class="w-full h-36 object-cover rounded mb-2" />
        <div class="font-bold text-xl mb-1">{{ blog.title }}</div>
        <div class="text-gray-600 mb-2">{{ blog.short_description }}</div>
        <a :href="`/blog/${blog.id}`" class="text-indigo-600 hover:underline">Read more →</a>
      </div>
    </div>
    <div v-else class="text-gray-400 text-center">No blog posts</div>
  </div>
</template>
