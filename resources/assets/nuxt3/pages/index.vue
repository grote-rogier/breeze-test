<template>
    <div>
        This is the main page
        <div>
            x: {{ x }}, y: {{ y }}
        </div>
        <div>
            <h1>Client fetched users</h1>
            <p>These users are fetched by the client, so this is not SEO friendly</p>
            <ul>
                <li v-for="user in csUsers" :key="user.id">{{ user.name }}</li>
            </ul>
        </div>
        <div>
            <h1>Server fetched users</h1>
            <p>These users are pre-fetched by the node server, so this IS SEO friendly</p>
            <ul>
                <li v-for="user in ssUsers" :key="user.id">{{ user.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script setup>
    const { x, y } = useMouse()
    const csUsers = ref([])

    // Client fetches users, this is not seo friendly
    onMounted(() => {
        fetch('https://jsonplaceholder.typicode.com/users')
            .then(response => response.json())
            .then(data => csUsers.value = data)
    })

    // Users are fetched by node server > seo friendly
    // const { data: ssUsers } = await useAsyncData('ssUsers', () => $fetch('https://jsonplaceholder.typicode.com/users'))
    const { data: ssUsers } = await useFetch('https://jsonplaceholder.typicode.com/users') // useFetch is short for the commented line above
</script>
