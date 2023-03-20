<script setup>
import {Head, useForm} from "@inertiajs/vue3";
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
    <Head>
        <title>
            My App
        </title>
    </Head>


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

</template>
