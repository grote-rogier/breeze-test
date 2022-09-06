<template>
    <div>
        <ul v-if="errors.length">
            <li v-for="(error, index) in errors" :key="index" class="text-red-700">{{ error }}</li>
        </ul>

        <h2 class="text-4xl font-bold mb-4">Edit Post</h2>

        <form @submit.prevent="updatePost" class="w-1/2">
            <input type="text" v-model="title" placeholder="title"  class="p-3 mb-4 w-full block shadow" />
            <textarea v-model="body" class="p-3 shadow w-full h-80" />
            <div class="flex justify-between">
                <button class="bg-amber-300 px-4 py-2 shadow rounded">Update</button>
                <NuxtLink to="/posts" class="bg-gray-300 px-4 py-2 shadow rounded">Cancel</NuxtLink>
            </div>
        </form>

        <div class="mt-4">
            <button class="bg-red-400 px-4 py-3 shadow rounded text-white" @click="deletePost">Delete post</button>
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    middleware: ['auth']
})

const title = ref('')
const body = ref('')
const errors = ref([])
const { $apiFetch } = useNuxtApp()
const route = useRoute()
const post = ref(null)

onMounted(async () => {
    post.value = await $apiFetch(`/api/posts/${route.params.id}`)
    title.value = post.value.title
    body.value = post.value.body
})

async function updatePost() {
    try {
        const post = await $apiFetch(`api/posts/${route.params.id}`, {
            method: 'PATCH',
            body: {
                title: title.value,
                body: body.value,
            }
        });

        title.value = ''
        body.value = ''

        useRouter().push('/dashboard')
    } catch (err) {
        errors.value = Object.values(err.data.errors).flat()
    }
}

async function deletePost() {
    try {
        const post = await $apiFetch(`api/posts/${route.params.id}`, {
            method: 'DELETE',
        });

        useRouter().push('/dashboard')
    } catch (err) {
        errors.value = Object.values(err.data.errors).flat()
    }
}
</script>
