<template>
    <div>
        This is a dynamic route: {{ $route.params.id }}
        <h1 class="text-4xl font-bold mb-4">{{ post.title }}</h1>
        <p class="text-stone-600 text-justify">{{ post.body }}</p>
    </div>
</template>

<script setup>
const { $apiFetch } = useNuxtApp()
const post = await $apiFetch('/api/posts/' + useRoute().params.id )

</script>
