<script setup>
import Grid from '@/Components/Grid.vue'
import { ref } from 'vue'

const searchQuery = ref('')
const gridColumns = ['id', 'first_name','last_name','ppi','batch']
const gridData = defineProps({
    cores:Object
})
</script>

<template>
    <form id="search">
        Search <input name="query" v-model="searchQuery">
    </form>
    <Grid
        :data="gridData.cores"
        :columns="gridColumns"
        :filter-key="searchQuery">
    </Grid>
</template>
