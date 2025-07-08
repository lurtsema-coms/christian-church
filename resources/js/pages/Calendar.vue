<script setup lang="ts">
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import { Head  } from '@inertiajs/vue3';


    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Calendar" />

    <div class="relative pb-16 pt-28">
        <!-- BG -->
        <img src="/img/cardboard-texture.webp" alt="cardboard-texture-bg" class="absolute inset-0 z-0 object-cover w-full h-full mix-blend-multiply" />
        <div class="absolute inset-0 z-0 bg-gray-100/75"></div>

        <div class="relative z-10 flex flex-col px-5 mt-12">
            <div class="z-10">
                <HeadingDescription description="Under Construction Coming Soon!" class="text-center !text-[#00457A] !font-bold !text-4xl"/>
            </div>
        </div>
    </div>
</template>