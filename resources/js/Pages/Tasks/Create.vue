<template>
    <header class="bg-white shadow mb-10">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Task Create
            </h1>
        </div>
    </header>

    <Link :href="route('tasks.index')" class="text-indigo-600 hover:text-indigo-900 my-5 block">
        Back
    </Link>

    <form @submit.prevent="store">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input :class="{'border-red-500': form.errors.name}" v-model="form.name" type="text"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        <div class="text-red-500 mt-2" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input :class="{'border-red-500': form.errors.title}" v-model="form.title" type="text"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        <div class="text-red-500 mt-2" v-if="form.errors.title">{{ form.errors.title }}</div>
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input :class="{'border-red-500': form.errors.phone}" v-model="form.phone" type="text"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        <div class="text-red-500 mt-2" v-if="form.errors.phone">{{ form.errors.phone }}</div>
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Company</label>
                        <input :class="{'border-red-500': form.errors.company}" v-model="form.company" type="text"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        <div class="text-red-500 mt-2" v-if="form.errors.company">{{ form.errors.company }}</div>
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Text</label>

                        <textarea :class="{'border-red-500': form.errors.text}" v-model="form.text" type="text"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        </textarea>
                        <div class="text-red-500 mt-2" v-if="form.errors.text">{{ form.errors.text }}</div>
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Upload file</label>
                        <input type="file" @input="form.file = $event.target.files[0]" />
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    </div>


                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import {Link, useForm} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link
    },
    setup() {
        const form = useForm({
            name: null,
            title: null,
            phone: null,
            company: null,
            text: null,
            file: null
        });

        function store() {
            form.post(route('tasks.store'))
        }

        return {form, store};
    },
};
</script>
