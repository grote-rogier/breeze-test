<template>
    <div>
        <ul v-if="errors.length">
            <li v-for="(error, index) in errors" :key="index" class="text-red-700">{{ error }}</li>
        </ul>

        <h2 class="text-4xl font-bold mb-4">Create a Post</h2>

        <form @submit.prevent="createPost" class="w-1/2">
            <input type="text" v-model="title" placeholder="title"  class="p-3 mb-4 w-full block shadow" />
            <textarea v-model="body" class="p-3 shadow w-full h-80" />
            <div class="flex justify-between">
                <button class="bg-amber-300 px-4 py-2 shadow rounded">Create</button>
                <NuxtLink to="/posts" class="bg-gray-300 px-4 py-2 shadow rounded">Cancel</NuxtLink>
            </div>
        </form>
    </div>
</template>

<script setup>
definePageMeta({
    middleware: ['auth']
})

const title = ref('')
const body = ref('')
const errors = ref([])

async function createPost() {
    try {
        const post = await useNuxtApp().$apiFetch('api/posts', {
            method: 'POST',
            body: {
                title: title.value,
                body: body.value,
            }
        });

        title.value = ''
        body.value = ''

        useRouter().push('/posts')
    } catch (err) {
        errors.value = Object.values(err.data.errors).flat()
    }

}
</script>
