import { defineNuxtPlugin, useCookie, useRuntimeConfig } from '#app'

export default defineNuxtPlugin(nuxtApp => {
    const config = useRuntimeConfig()

    nuxtApp.provide(
        'apiFetch',
        $fetch.create({
            baseURL: config.BASE_URL,
            credentials: 'include',
            headers: {
                Accept: 'application/json',
                'X-XSRF-TOKEN': useCookie('XSRF-TOKEN').value
            }
        })
    )
})
