<script setup>
const props = defineProps(['items', 'type'])
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div v-for="item in props.items" :key="item.id" class="flex flex-col bg-white rounded-xl shadow p-6">
      <img :src="item.image ?? 'https://images.freeimages.com/image/previews/9f6/socialpost-light-5690375.jpg?fmt=webp&h=350'+item.id" class="w-full h-44 object-cover rounded-lg mb-4" />
      <span class="text-xs text-gray-500 mb-2">{{ new Date(item.created_at).toLocaleDateString() }}</span>
      <h3 class="text-lg font-semibold mb-2">
        <a :href="route(`landing.${props.type}_show`, item.id)" class="hover:text-indigo-700">{{ item.title }}</a>
      </h3>
      <p class="text-gray-600 line-clamp-3 mb-4">{{ item.short_description }}</p>
      <span class="text-xs text-gray-500">By {{ item.author ?? 'Anonymous' }}</span>
      <a :href="route(`landing.${props.type}_show`, item.id)" class="mt-2 text-indigo-600 font-medium">Read more →</a>
    </div>
  </div>
</template>
