<template>
    <div class="bg-gray-100 min-h-screen text-gray-900">
        <Title>{{ title }}</Title>
        <nav class="bg-amber-200 px-6 flex justify-between items-center border-b border-amber-500 shadow-md">
            <ul class="flex align-center space-x-4">
                <li class="p-4 font-bold hover:bg-amber-400"><NuxtLink to="/">Home</NuxtLink></li>
                <li class="p-4 font-bold hover:bg-amber-400"><NuxtLink to="/posts">Posts</NuxtLink></li>
            </ul>
            <ClientOnly>
                <ul class="flex align-center space-x-4">
                    <li v-if="isLoggedIn" class="p-4 font-bold bg-amber-100">
                        {{ getUser()?.name }}
                    </li>
                    <li v-else class="p-4 font-bold hover:bg-amber-400">
                        <NuxtLink to="/auth/login">Login</NuxtLink>
                    </li>
                    <li v-if="isLoggedIn" class="p-4 font-bold hover:bg-amber-400 cursor-pointer" @click="logout">
                        Logout
                    </li>
                    <li
                        v-if="!isLoggedIn"
                        class="p-4 font-bold hover:bg-amber-400"
                    >
                        <NuxtLink to="/auth/register">Register</NuxtLink>
                    </li>
                    <li class="p-4 font-bold hover:bg-amber-400"><NuxtLink to="/about">About</NuxtLink></li>
                    <li class="p-4 font-bold hover:bg-amber-400"><NuxtLink to="/contact">Contact</NuxtLink></li>
                </ul>
            </ClientOnly>
        </nav>

        <div class="container mx-auto w-1/2 py-8">
            <slot />
        </div>
    </div>
</template>

<script setup>
import { useAuth } from '../composables/useAuth';

const { $apiFetch } = useNuxtApp()
const { getUser, isLoggedIn, removeUser } = useAuth()
const title = useState('title', () => 'Nuxt3 Breeze Test')

async function logout() {
    try {
        await $apiFetch('/logout', {
            method: 'POST'
        })
    } catch (err) {
        console.error(err)
    } finally {
        removeUser()

        window.location.pathname = '/'
    }
}
</script>

<style>
    .router-link-active {
        border-bottom: 1px solid rgba(0 0 0 / 20%)
    }
</style>
