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

    <div class="py-16">
        <p class="text-center text-[#0A5954] text-4xl font-bold">WATCH & LISTEN</p>
        <div class="max-w-4xl mx-auto mt-16 border rounded-md h-96">

        </div>
        <button class="bg-[#00245E] text-white px-4 py-2 rounded-md mx-auto flex mt-16 text-2xl">WATCH THE SERMONS</button>
    </div>

    <div class="py-16 bg-[#00457A]">
        <p class="text-4xl font-semibold text-center text-white">Support The Mission</p>
        <p class="max-w-2xl mx-auto mt-8 text-2xl font-semibold text-center text-white">Your generosity helps us serve our community and share the love of Jesus on the Big Island and beyond.</p>
        <p class="mt-8 text-base font-semibold text-center text-white">Thank you for partnering with us in ministry.</p>

        <div class="flex justify-center gap-8">
            <button class="bg-[#D67C6B] text-white px-8 py-4 rounded-md mt-16 font-bold text-lg">GIVE ONLINE</button>
            <button class="bg-[#12876F] text-white px-8 py-2 rounded-md mt-16 font-bold text-lg">LEARN MORE</button>
        </div>
    </div>

    <div class="py-16">
        <div class="max-w-4xl mx-auto overflow-hidden border shadow-xl rounded-2xl">
            <div class="p-10">
                <p class="text-xl">Prayer Request</p>
                <p class="mt-4 text-4xl text-[#0A5954] font-semibold">We Believe in the Power of Prayer</p>
                <p class="text-2xl">Whatever you’re going through, we’re here to pray with you and for you.</p>

                <button class="bg-[#00576B] text-white px-8 py-2 rounded-md mt-8 font-bold text-lg">SUBMIT A REQUEST</button>
            </div>
            <div>
                <img 
                    :src="'/img/church_low_angle.webp'" 
                    alt="Church Image" 
                    class="w-full bg-cover h-96"
                >
            </div>
        </div>
    </div>
</template>

