<script setup>
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    cores: {
        type: Object,
        default: () => ({}),
    },
});


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

    <Pagination :cores="cores" />

</div>


</template>
