<script setup lang="ts">

    defineProps<{
        imgSrc: string,
        header: string,
        headerDescription: string,
        time: string,
        description: string
    }>()
</script>

<template>
    <div class="overflow-hidden bg-white rounded-md shadow-md group">
        <img :src="imgSrc" :alt="header" class="object-cover w-full transition-transform h-44 group-hover:scale-110">
        <div class="p-5 md:p-7 text-[#00457A]">
            <h4 class="font-bold md:text-2xl">{{ header }}</h4>
            <h5 class="font-bold text-md md:text-lg">{{ headerDescription }}</h5>
            <h5 class="text-md md:text-lg">{{ time }}</h5>
            
            <p class="mt-4 italic text-neutral-700">
                {{ description }}
            </p>
        </div>
    </div>
</template>