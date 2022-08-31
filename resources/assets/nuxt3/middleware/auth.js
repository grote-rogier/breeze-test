import { navigateTo } from 'nuxt/app';

export default defineNuxtRouteMiddleware(() => {
    const { isLoggedIn } = useAuth();

    if (process.client) {
        if (!isLoggedIn.value) {
            // navigateTo('/auth/login');
            window.location.pathname = '/auth/login'
        }
    }
})
