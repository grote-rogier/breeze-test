<template>
    <div>
        <div class="mr-auto">
            <NuxtLink to="/posts/create" class="bg-amber-300 shadow rounded px-3 py-2">+</NuxtLink>
        </div>
        <div class="container py-8 divide-y space-y-8 divide-gray-300">
            <div v-for="post in posts" class="flex justify-between">
                <span class="font-bold">{{ post.title }}</span>
                <span class="italic">{{ post.user.name }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
const posts = await useNuxtApp().$apiFetch('/api/posts')
</script>
