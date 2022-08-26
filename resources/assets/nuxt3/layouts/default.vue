<template>
    <div>
        <Title>Breeze Test</Title>
        <nav class="bg-amber-200 p-4 flex justify-between align-center border-b border-amber-500 shadow-md">
            <NuxtLink to="/" class="font-bold">Home</NuxtLink>
            <ul class="flex justify-between align-center gap-4">
                <li><NuxtLink to="/about" class="font-bold">About</NuxtLink></li>
                <li><NuxtLink to="/contact" class="font-bold">Contact</NuxtLink></li>
            </ul>
        </nav>
        <div class="p-4">
            <slot />
        </div>
    </div>
</template>
