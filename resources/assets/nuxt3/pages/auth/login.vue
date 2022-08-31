<template>
    <div>
        <Title>Login | {{ title }}</Title>
        <ul v-if="errors.length">
            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
        </ul>
        <form @submit.prevent="login">
            <input
                type="email"
                v-model="email"
                placeholder="email"
                class="p-4 mb-4 w-1/2 shadow block"
            />
            <input
                type="password"
                v-model="password"
                placeholder="password"
                class="p-4 mb-4 w-1/2 shadow block"
            />
            <button class="bg-amber-300 p-4 rounded-lg shadow">Log in</button>
        </form>
    </div>
</template>

<script setup>
    const title = useState('title')

    const email = ref('')
    const password = ref('')
    const errors = ref([])

    const { $apiFetch } = useNuxtApp()

    async function csrf() {
        return await $apiFetch('/sanctum/csrf-cookie')
    }

    async function login() {
        await csrf()

        try {
            await $apiFetch('/login', {
                method: 'POST',
                body: {
                    email: email.value,
                    password: password.value
                }
            })
            navigateTo('/dashboard')
        } catch (err) {
            errors.value = Object.values(err.data.errors).flat()
        }
    }
</script>
