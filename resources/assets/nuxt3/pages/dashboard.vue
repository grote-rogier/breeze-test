<template>
    <div class="bg-blue-300 p-5">
        <h1 class="text-3xl font-bold">DASHBOARD</h1>
        <div v-if="user" class="mt-5">
            <p>Name: {{ user.name }}</p>
            <p>Email: {{ user.email }}</p>

            <div class="mt-4">
                <h3 class="text-2xl mb-3">Your posts</h3>
                <ul v-if="posts">
                    <li v-for="post in posts" :key="post.id">
                        <NuxtLink :to="`/posts/${post.id}`" class="text-blue-600 hover:underline">
                            {{ post.title }}
                        </NuxtLink>
                    </li>
                </ul>
            </div>
        </div>
        <div v-else class="bg-red-300 p-5">
            <h2 class="text-lg font-bold">You should not be here</h2>
        </div>
    </div>
</template>

<script setup>
const { $apiFetch } = useNuxtApp()
const user = ref(null)
const posts = ref([])

onMounted(async () => {
    user.value = await $apiFetch('/api/user')
    posts.value = await $apiFetch('/api/user/posts')
})

</script>
