<template>
    <div>
        <form @submit.prevent="createPost" class="w-1/2">
            <input type="text" v-model="title" placeholder="title"  class="p-3 mb-4 w-full block shadow" />
            <textarea v-model="body" class="p-3 shadow w-full h-80" />
            <button class="bg-amber-300 px-4 py-2 shadow rounded">Create</button>
        </form>
    </div>
</template>

<script setup>
const title = ref('')
const body = ref('')
const errors = ref([])
const router = useRouter()

async function createPost() {
    const post = await useNuxtApp().$apiFetch('api/posts', {
        method: 'POST',
        body: {
            title: title.value,
            body: body.value,
        }
    });

    title.value = ''
    body.value = ''

    router.push('/')
}
</script>
