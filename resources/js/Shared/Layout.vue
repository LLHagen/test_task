<template>
    <p v-if="$page.props.message"
       class="bg-indigo-600 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
        {{ $page.props.message }}
    </p>

    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div v-if="$page.props.auth.user" class="flex space-x-4">

                        <a :href="route('tasks.create')"
                           :class="{[activeClass]: isActive('home')}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                        >Tasks Create</a>

                        <a :href="route('tasks.index')"
                            :class="{[activeClass]: isActive('tasks')}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                        >Tasks</a>
                        <div
                            class="text-gray-300 hover:bg-gray-700 hover:text-white hover:cursor-pointer px-3 py-2 rounded-md text-sm font-medium"
                        ><a @click="logout">Log Out</a></div>

                    </div>
                    <div v-else class="flex space-x-4">
                        <a :href="route('register')"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                        >Register</a>
                        <a :href="route('login')"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                        >Log In</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto">
        <div class="my-10">
            <slot/>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'

export default {
    components: {
        Link
    },
    data: () => ({
        activeClass: 'text-blue-500'
    }),
    methods: {
        isActive(route) {
            return this.route().current() === route || this.route().current().includes(route);
        },
        logout() {
            this.$inertia.post(route('logout'))
        }
    }
};
</script>
