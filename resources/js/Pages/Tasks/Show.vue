<template>
    <header class="bg-white shadow mb-10">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Task
            </h1>
        </div>
    </header>

    <Link :href="route('tasks.index')" class="text-indigo-600 hover:text-indigo-900 my-5 block">
        Вернуться назад
    </Link>

    <div  v-if="task"  class="shadow overflow-hidden sm:rounded-md">

        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">

                <div v-if="task.name" class="col-span-6">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        {{ task.name }}
                    </div>
                </div>

                <div v-if="task.title" class="col-span-6">
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        {{ task.title }}
                    </div>
                </div>

                <div v-if="task.phone" class="col-span-6">
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        {{ task.phone }}
                    </div>
                </div>

                <div v-if="task.company" class="col-span-6">
                    <label class="block text-sm font-medium text-gray-700">Company</label>
                    <div class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        {{ task.company }}
                    </div>
                </div>

                <div v-if="task.text" class="col-span-6">
                    <label class="block text-sm font-medium text-gray-700">Text</label>
                    <div class="whitespace-pre-line mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        {{ task.text }}
                    </div>
                </div>

                <div v-if="task.text" class="col-span-6">
                    <label class="block text-sm font-medium text-gray-700">Text</label>
                    <div class="whitespace-pre-line mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        {{ task.text }}
                    </div>
                </div>

                <div v-if="task.files" class="col-span-6">
                    <a
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    :href="route('tasks.download', task.id)"
                    >download file</a>
                </div>

            </div>
        </div>

    </div>

    <div v-else class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <h2>Oh, No!</h2>
            </div>
        </div>
    </div>
</template>
ХХ
<script>
import {Link, useForm} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link
    },
    props: {
        task: Object,
    },

    methods: {
        download(id) {
            this.$inertia.put(this.route('tasks.download', id))
        }
    }
};
</script>
