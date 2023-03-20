<script setup>
import {Head, router} from "@inertiajs/vue3";
import Pagination from '@/Components/Pagination.vue'
import {reactive, watchEffect} from "vue";
import {pickBy} from "lodash";


const props = defineProps({
    cores:{
        type: Object,
       required:true
    },
    filters: {
        type: Object,
        default:true
    },
})

let params = reactive({

    search: props.filters.search,
    field: props.filters.field,
    direction: props.filters.direction,

});

function colSort(field) {

    params.field = field;
    params.direction = params.direction === 'asc' ? 'desc' : 'asc';
    console.log(params.direction);

}

watchEffect(() => {

    let filteredParams = pickBy(params);
    router.get('/', filteredParams, { replace: true, preserveState: true });

});



</script>

<template>
    <Head>
        <title>
            My App
        </title>
    </Head>
    <input
        type="text"
        v-model="params.search"
        placeholder="Search..."
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
    />

    <table class="table-fixed mx-auto mt-10">
        <thead class="bg-blue-100">
        <tr>
            <td class="px-6 py-6" @click="colSort('id')">
                Id
            </td>
            <td class="px-6 py-6" @click="colSort('first_name')">
                First Name
            </td>
            <td class="px-6 py-6" @click="colSort('last_name')">
                Last Name
            </td>
            <td class="px-6 py-6" @click="colSort('ppi')">
                PPI
            </td>
            <td class="px-6 py-6" @click="colSort('batch')">
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
