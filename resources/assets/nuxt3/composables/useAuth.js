export function useAuth() {
    function setUser(name) {
        localStorage.setItem('user', JSON.stringify({ name }))
    }

    function getUser() {
        return JSON.parse(localStorage.getItem('user'))
    }

    function removeUser() {
        localStorage.removeItem('user')
    }

    const isLoggedIn = computed(() => {
        // If this code is run on the server (ssr), localStorage does not exist there, so skip this next check
        if (process.client) {
            return !!localStorage.getItem('user')
        }
    })

    return { setUser, getUser, removeUser, isLoggedIn }
}
