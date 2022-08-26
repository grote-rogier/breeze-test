<template>
    <div class="container py-8 divide-y space-y-8 divide-gray-300">
        <div v-for="post in posts" class="flex justify-between">
            <span class="font-bold">{{ post.title }}</span>
            <span class="italic">{{ post.user.name }}</span>
        </div>
    </div>
</template>

<script setup>
const posts = await useNuxtApp().$apiFetch('/api/posts')
</script>
