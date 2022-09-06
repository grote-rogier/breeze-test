export default defineNuxtRouteMiddleware(() => {
    const { isLoggedIn } = useAuth();

    if (process.client) {
        if (!isLoggedIn.value) {
            window.location.pathname = '/auth/login'
        }
    }
})
