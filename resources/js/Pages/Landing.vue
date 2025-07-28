<script setup>
import { ref } from 'vue'
import BlogSection from './Components/BlogSection.vue'

const props = defineProps(['blogs', 'news'])
const tab = ref('blog')
</script>

<template>
  <div class="max-w-7xl mx-auto py-12 px-4">
    <div class="flex gap-6 border-b mb-8">
      <button @click="tab='blog'" :class="tab==='blog' ? 'border-b-2 border-indigo-600 text-indigo-600 font-bold' : 'text-gray-500'" class="px-4 py-2">Blog</button>
      <button @click="tab='news'" :class="tab==='news' ? 'border-b-2 border-indigo-600 text-indigo-600 font-bold' : 'text-gray-500'" class="px-4 py-2">News</button>
    </div>
    <div v-if="tab==='blog'">
      <BlogSection :items="props.blogs" type="blog" />
    </div>
    <div v-else>
      <BlogSection :items="props.news" type="news" />
    </div>
  </div>
</template>
