<script setup>
defineProps({ blogs: Object })
</script>

<template>
  <div class="max-w-2xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Blog - public page</h1>
    <ul class="space-y-4">
      <li v-for="blog in blogs.data" :key="blog.id" class="p-4 border rounded shadow">
        <h2 class="text-xl font-semibold">{{ blog.title }}</h2>
        <p class="text-gray-700">{{ blog.short_description }}</p>
        <div class="text-sm text-gray-500">ID: {{ blog.id }}</div>
      </li>
    </ul>
    <div v-if="blogs.links" class="mt-6 flex gap-2">
      <a
        v-for="link in blogs.links"
        :key="link.url"
        :href="link.url"
        v-html="link.label"
        :class="{'font-bold underline': link.active, 'text-gray-400': !link.url}"
        class="px-2"
      ></a>
    </div>
  </div>
</template>
