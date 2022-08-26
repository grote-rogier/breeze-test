import { defineNuxtPlugin } from '#app'

export default defineNuxtPlugin(nuxtApp => {
    nuxtApp.provide(
        'apiFetch',
        $fetch.create({ baseURL: 'http://breeze-test.localtest.me/' })
    )
})
