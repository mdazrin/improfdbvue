<script setup>
import {Head} from "@inertiajs/vue3";
import Layout from '@/Layouts/Layout.vue'

defineOptions({ layout: Layout })
defineProps({
    cores:Object,

})

</script>

<template>
    <Head>
        <title>
            My App
        </title>
    </Head>
    <h1>Welcome</h1>
    <li v-for="core in cores">
        {{ core.id }}
        {{ core.first_name }}
        {{ core.last_name }}
        {{ core.ppi }}
    </li>


</template>

