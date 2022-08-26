<template>
    <div class="bg-gray-100 min-h-screen text-gray-900">
        <Title>{{ title }}</Title>
        <nav class="bg-amber-200 px-6 py-4 flex justify-between items-center border-b border-amber-500 shadow-md">
            <div>
                <NuxtLink to="/" class="font-bold mr-5">Home</NuxtLink>
                <NuxtLink to="/posts" class="font-bold">Posts</NuxtLink>
            </div>
            <ul class="flex align-center space-x-12">
                <li><NuxtLink to="/auth/login" class="font-bold">Login</NuxtLink></li>
                <li><NuxtLink to="/about" class="font-bold">About</NuxtLink></li>
                <li><NuxtLink to="/contact" class="font-bold">Contact</NuxtLink></li>
            </ul>
        </nav>

        <div class="container mx-auto w-1/2 py-8">
            <slot />
        </div>
    </div>
</template>

<script setup>
const title = useState('title', () => 'Nuxt3 Breeze Test')
</script>


<style>
    .router-link-active {
        border-bottom: 1px solid rgba(0 0 0 / 20%)
    }
</style>
