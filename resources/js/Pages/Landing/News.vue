<script setup>
defineProps({ news: Object })
</script>

<template>
  <div class="max-w-2xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">News - public page</h1>
    <ul class="space-y-4">
      <li v-for="item in news.data" :key="item.id" class="p-4 border rounded shadow">
        <h2 class="text-xl font-semibold">{{ item.title }}</h2>
        <p class="text-gray-700">{{ item.short_description }}</p>
        <div class="text-sm text-gray-500">ID: {{ item.id }}</div>
      </li>
    </ul>
    <div v-if="news.links" class="mt-6 flex gap-2">
      <a
        v-for="link in news.links"
        :key="link.url"
        :href="link.url"
        v-html="link.label"
        :class="{'font-bold underline': link.active, 'text-gray-400': !link.url}"
        class="px-2"
      ></a>
    </div>
  </div>
</template>
