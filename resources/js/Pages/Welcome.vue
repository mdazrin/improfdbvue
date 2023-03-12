<script setup>
import {Head} from "@inertiajs/vue3";
import Layout from '@/Layouts/Layout.vue'
import {computed, ref} from "vue";

defineOptions({ layout: Layout })
const tableData = defineProps({
    cores:Object,

})

const sortColumn = ref('name');
const sortDirection = ref('asc');

const sortedTableData = computed(() => {
    const data = [...tableData.cores];
    data.sort((a, b) => {
        if (sortDirection.value === 'asc') {
            return a[sortColumn.value] > b[sortColumn.value] ? 1 : -1;
        } else {
            return a[sortColumn.value] < b[sortColumn.value] ? 1 : -1;
        }
    });
    return data;
});

const updateSort = (column) => {
    if (column === sortColumn.value) {
        sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortColumn.value = column;
        sortDirection.value = 'asc';
    }
};



</script>

<template>
    <Head>
        <title>
            My App
        </title>
    </Head>
    <h1>Welcome</h1>
    <table class="table-fixed mx-auto mt-10">
        <thead class="bg-blue-100">
        <tr>
            <td @click="updateSort('id')" class="px-6 py-6">
                Id
            </td>
            <td @click="updateSort('first_name')" class="px-6 py-6">
                First Name
            </td>
            <td @click="updateSort('last_name')" class="px-6 py-6">
                Last Name
            </td>
            <td @click="updateSort('ppi')" class="px-6 py-6">
                PPI
            </td>
            <td @click="updateSort('batch')" class="px-6 py-6">
                Batch
            </td>
        </tr>
        </thead>
        <tbody class="border-b">
        <tr v-for="core in sortedTableData">
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


</template>

