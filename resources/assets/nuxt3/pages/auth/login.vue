<template>
    <div>
        <Title>Login | {{ title }}</Title>
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
    const isLoading = ref(false)
    const errors = ref([])

    const { $apiFetch } = useNuxtApp()

    async function login() {
        await $apiFetch('/login', {
            method: 'POST',
            body: {
                email: email.value,
                password: password.value
            }
        })
    }
</script>
