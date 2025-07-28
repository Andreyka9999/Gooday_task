<script setup>
import { useForm } from '@inertiajs/vue3'

// 1. Получаем props
const props = defineProps({ news: Object })

// 2. Инициализируем форму с данными из props.news
const form = useForm({
  title: props.news.title,
  short_description: props.news.short_description,
  text: props.news.text
})

// 3. Отправляем форму
function submit() {
  form.put(route('admin.news.update', props.news.id))
}
</script>

<template>
  <form @submit.prevent="submit">
    <input v-model="form.title" placeholder="Header" />
    <div v-if="form.errors.title">{{ form.errors.title }}</div>

    <input v-model="form.short_description" placeholder="Short description" />
    <div v-if="form.errors.short_description">{{ form.errors.short_description }}</div>

    <textarea v-model="form.text" placeholder="Текст"></textarea>
    <div v-if="form.errors.text">{{ form.errors.text }}</div>

    <button type="submit">Save</button>
  </form>
</template>
