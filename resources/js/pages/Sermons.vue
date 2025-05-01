<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import DarkMode from '@/components/DarkMode.vue';
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import Carousel from '@/components/Carousel.vue';

    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Sermons" />

    <div class="relative h-[39rem] mt-12">
        <div class="flex flex-col md:flex-row justify-center items-center px-5 md:h-[14rem] rounded-md mb-10">
            <img src="/img/sample_pic.jpg" alt="" class="h-full w-full md:max-w-md rounded-t-lg md:rounded-t-none lg:rounded-l-lg">
            <div class="bg-[#00457A] h-full w-full md:max-w-[36rem] p-[40px] text-white rounded-b-lg md:rounded-b-none lg:rounded-r-lg">
                <span class="block text-[1.5rem] font-bold text-center mb-1">Resurrection Day!</span>
                <p class="">by Join us for a powerful Resurrection Day message delivered by Kevin M. Kelley on April 20, 2025, exploring Mark 16:1-8 and the hope found in Christ’s resurrection.</p>\
                <!-- <div>
                    add audio here
                </div> -->
            </div>
        </div>
    </div>
</template>

