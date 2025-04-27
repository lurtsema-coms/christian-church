<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import DarkMode from '@/components/DarkMode.vue';
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import Carousel from '@/components/Carousel.vue';


    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Home" />

    <div class="relative h-[39rem]">
        <img 
            :src="'/img/church_low_angle.webp'" 
            alt="Church Image" 
            class="absolute inset-0 object-cover w-full h-[39rem] opacity-40 z-0"
        >
    </div>
</template>

