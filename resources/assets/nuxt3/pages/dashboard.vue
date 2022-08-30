<template>
    <div class="bg-pink-300">
        <h1 class="text-xl font-bold">DASHBOARD</h1>
        <div v-if="user">
            <p>{{ user.name }}</p>
            <p>{{ user.email }}</p>
        </div>
    </div>
</template>

<script setup>
const { $apiFetch } = useNuxtApp()
const user = ref(null)

onMounted(async () => {
    const response = await $apiFetch('/api/user')
    user.value = response;
})

</script>
