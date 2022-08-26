<template>
    <div>
        This is the posts page
    </div>
</template>

<script setup>
const { data:posts } = await useFetch('http://breeze-test.localtest.me/api/posts')
</script>
