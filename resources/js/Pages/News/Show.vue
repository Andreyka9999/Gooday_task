<script setup>
const props = defineProps(['item'])
</script>

<template>
  <div class="max-w-3xl mx-auto py-12">
    <img :src="props.item.image ?? 'https://images.freeimages.com/image/previews/6fc/eco-festive-social-pack-5690383.jpg?fmt=webp&h=350'+props.item.id" class="w-full h-72 object-cover rounded-xl mb-8" />
    <h1 class="text-3xl font-bold mb-2">{{ props.item.title }}</h1>
    <div class="text-gray-500 text-sm mb-4">
      {{ new Date(props.item.created_at).toLocaleDateString() }} | By {{ props.item.author ?? 'Anonymous' }}
    </div>
    <p class="text-lg">{{ props.item.text }}</p>
  </div>
</template>
