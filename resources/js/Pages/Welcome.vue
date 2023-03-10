<script setup>
import {Head} from "@inertiajs/vue3";
import Layout from '@/Layouts/Layout.vue'

defineOptions({ layout: Layout })
defineProps({
    name:String,
    frameworks:Array,
})

</script>

<template>
    <Head>
        <title>
            My App
        </title>
    </Head>
    <nav class="bg-blue-50 border-b-4">
        <div class="flex justify-between">
            <div>
                <img class="w-32 h-24" src="asset/Improf.png" alt="Improf Logo">
            </div>
            <div class="flex no-wrap">
                <div class="px-1 py-5">
                    <button class="rounded-md bg-indigo-500 px-5 py-1 text-white font-semibold shadow-lg transition
                hover:-translate-y-1 hover:scale-110">
                        Sign In
                    </button>
                </div>
                <div class="px-1 py-5">
                    <button class="rounded-md bg-indigo-500 px-5 py-1 text-white font-semibold shadow-lg transition
                hover:-translate-y-1 hover:scale-110">
                        Register
                    </button>
                </div>
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
            <table class="table-fixed mx-auto mt-10">
                <thead class="bg-blue-100">
                <tr>
                    <td class="px-6 py-6">
                        Name
                    </td>
                    <td class="px-6 py-6">
                        Email
                    </td>
                    <td class="px-6 py-6">
                        Password
                    </td>
                </tr>
                </thead>
                <tbody class="border-b">
                <tr>
                    <td class="px-6 py-6">
                        Name
                    </td>
                    <td class="px-6 py-6">
                        Name
                    </td>
                    <td class="px-6 py-6">
                        Name
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

