<script setup>
import {useForm} from "@inertiajs/vue3";
import Pagination from '@/Components/Pagination.vue'


const props = defineProps({
    cores:{
        type: Object,
       required:true
    },

})

const form = useForm({
    search: null,
    field: null,
    direction: null,

})

</script>

<template>
    <nav class="bg-neutral-50 border-b-4">
        <div class="flex justify-between">
            <div>
                <img class="w-20 h-16 md:w-32 md:h-24" src="asset/Improf.png" alt="Improf Logo">
            </div>
            <div class="px-4 pt-6">
                Username
            </div>
        </div>
    </nav>

    <div class="flex flex-row h-screen">
        <div class="bg-blue-700 basis-16 md:basis-40">
            <div class="flex ml-5 mr-1 md:ml-6 md:mr-2 mt-16">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-blue-50">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                </svg>
                <div class="hidden md:flex md:pl-2 text-white">IMProf Table</div>
            </div>
        </div>


    <div class="grow">
        <form @submit.prevent="form.get('/',{replace:true,preserveState:true})">
            <input
                type="text"
                v-model="form.search"
                placeholder="Search..."
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
            />
            <input
                type="text"
                v-model="form.field"
                placeholder="Select a fieldname"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
            />
            <input
                type="text"
                v-model="form.direction"
                placeholder="Asc or desc"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
            />
            <button type="submit">Submit</button>
        </form>


        <table class="table-fixed mx-auto mt-10">
            <thead class="bg-blue-100">
            <tr>
                <td class="px-6 py-6">
                    Id
                </td>
                <td class="px-6 py-6">
                    First Name
                </td>
                <td class="px-6 py-6">
                    Last Name
                </td>
                <td class="px-6 py-6">
                    PPI
                </td>
                <td class="px-6 py-6">
                    Batch
                </td>
            </tr>
            </thead>
            <tbody class="border-b">
            <tr v-for="core in cores.data" :key="core.id">
                <td class="px-6 py-6">
                    {{core.id}}
                </td>
                <td class="px-6 py-6">
                    {{core.first_name}}
                </td>
                <td class="px-6 py-6">
                    {{core.last_name}}
                </td>
                <td class="px-6 py-6">
                    {{core.ppi}}
                </td>
                <td class="px-6 py-6">
                    {{core.batch}}
                </td>
            </tr>
            </tbody>
        </table>

        <div>
            <Pagination :data="props.cores" />
        </div>
    </div>

    </div>


</template>
