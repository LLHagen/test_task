<template>
    <Head :title="title" />

    <header class="bg-white shadow mb-10">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                {{ title }}
            </h1>
        </div>
    </header>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div v-if="tasks.total > 0" class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Task Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Company
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Действия</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="task in tasks.data" :key="task.id">


                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ task.title }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ task.company }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end items-center space-x-3">
                                <Link
                                    class="text-indigo-600 hover:text-indigo-900"
                                    :href="route('tasks.show', task.id)"
                                >Show</Link>
                                <a @click="destroy(task.id)" class="text-red-600 hover:text-red-900 cursor-pointer"
                                >Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <Pagination :links="tasks.links" />
                </div>

                <div v-else class="text-center font-bold text-xl">
                    Tasks none
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import Pagination from '../../Shared/Pagination'

export default {
    components: {
        Head,
        Link,
        Pagination,
    },
    props: {
        title: String,
        tasks: Object,
    },
    methods: {
        destroy(id) {
            if(confirm('Вы уверенны?')) {
                this.$inertia.delete(this.route('tasks.destroy', id))
            }
        }
    }
}
</script>
