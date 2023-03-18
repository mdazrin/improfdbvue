<script setup>
import {Head, router} from "@inertiajs/vue3";
import Pagination from '@/Components/Pagination.vue'
import {ref,watch} from "vue";
import {debounce} from "lodash";

const props = defineProps({
    cores:{
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
})

let search = ref(props.filters.search);

watch(search,debounce(function (value){
    router.get(
        '/',
        { search: value },
        {
            preserveState: true,
            replace:true
        })
},300));
</script>

<template>
    <Head>
        <title>
            My App
        </title>
    </Head>
    <input
        type="text"
        v-model="search"
        placeholder="Search..."
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
    />
    <select id="cars" name="cars">
        <option value="volvo">First Name</option>
        <option value="saab">Last Name</option>
        <option value="mercedes">PPI</option>
        <option value="audi">Batch</option>
    </select>
    <input type="submit" value="Submit">
    <table class="table-fixed mx-auto mt-10">
        <thead class="bg-blue-100">
        <tr>
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
