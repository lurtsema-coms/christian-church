<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import DarkMode from '@/components/DarkMode.vue';
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import Carousel from '@/components/Carousel.vue';

    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Sermons" />

    <div class="relative pb-16 pt-28">
        <div class="mt-12 flex flex-col md:flex-row justify-center items-center px-5 md:h-[16rem] rounded-md mb-10">
            <img src="/img/sample_pic.jpg" alt="" class="w-full h-full rounded-t-lg md:max-w-md md:rounded-t-none lg:rounded-l-lg">
            <div class="bg-[#00457A] h-full w-full md:max-w-[36rem] p-[40px] text-white rounded-b-lg md:rounded-b-none lg:rounded-r-lg">
                <span class="block text-[1.5rem] font-bold text-center mb-1">Resurrection Day!</span>
                <p class="">by Join us for a powerful Resurrection Day message delivered by Kevin M. Kelley on April 20, 2025, exploring Mark 16:1-8 and the hope found in Christ’s resurrection.</p>
                <div class="mt-5 rounded">
                    <audio controls class="w-full ">
                        <source src="/audio/resurrection-day.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
    </div>
</template>

