<template>
    <div>
        <Title>Register | {{ title }}</Title>
        <h1 class="font-bold text-4xl">Register</h1>
        <ul v-if="errors.length" class="mt-3">
            <li v-for="(error, index) in errors" :key="index" class="text-red-500">{{ error }}</li>
        </ul>
        <form class="mt-5 w-full space-y-4" @submit.prevent="register">
            <input type="email" v-model="email" placeholder="email" class="block py-2 px-3 shadow w-1/2">
            <input type="text" v-model="name" placeholder="name" class="block py-2 px-3 shadow w-1/2">
            <input type="password" v-model="password" placeholder="password" class="block py-2 px-3 shadow w-1/2">
            <input type="password" v-model="password_confirm" placeholder="confirm password" class="block py-2 px-3 shadow w-1/2">
            <button class="bg-amber-300 p-3 shadow font-bold">Register</button>
        </form>
    </div>
</template>

<script setup>
definePageMeta({
    middleware: ['guest']
})

const title = useState('title')
const email = ref('')
const name = ref('')
const password = ref('')
const password_confirm = ref('')
const errors = ref([])
const { $apiFetch } = useNuxtApp()

async function csrf() {
    return await $apiFetch('/sanctum/csrf-cookie')
}

async function register() {
    try {
        await csrf();

        await $apiFetch('/register', {
            method: 'POST',
            body: {
                email: email.value,
                name: name.value,
                password: password.value,
                password_confirmation: password_confirm.value
            }
        })

        const user = await $apiFetch('/api/user')
        useAuth().setUser(user.name)

        window.location.pathname = '/dashboard'
    } catch (err) {
        errors.value = Object.values(err.data.errors).flat()
    }
}
</script>
