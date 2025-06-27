<script setup lang="ts">
    import { Head, Link, router } from '@inertiajs/vue3';
    import DarkMode from '@/components/DarkMode.vue';
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import Carousel from '@/components/Carousel.vue';

    defineOptions({ layout: AppLayout});

    defineProps({
        sermons: Object
    });

</script>

<template>
    <Head title="Sermons" />

    <div class="relative pb-16 pt-20">
        <img src="/img/cardboard-texture.webp" alt="cardboard-texture-bg" class="absolute inset-0 z-0 object-cover w-full h-full mix-blend-multiply" />
        <div class="absolute inset-0 z-0 bg-gray-100/75"></div>

        <div class="relative z-10 flex flex-col px-5 mt-12">
            <div class="z-10">
                <div v-for="sermon in sermons.data" :key="sermon.id" class="mt-12 flex flex-col md:flex-row justify-center items-center px-5 md:h-[16rem] rounded-md mb-10">
                    <img :src="sermon.image_url" alt="Image" class="w-full h-full rounded-t-lg md:max-w-md md:rounded-t-none lg:rounded-l-lg">
                    <div class="bg-[#00457A] h-full w-full md:max-w-[36rem] p-[40px] text-white rounded-b-lg md:rounded-b-none lg:rounded-r-lg">
                        <span class="block text-[1.5rem] font-bold text-center mb-1">{{ sermon.title }}</span>
                        <div v-html="sermon.description"></div>
                        <div class="mt-5 rounded">
                            <audio controls class="w-full ">
                                <source :src="sermon.audio_url" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>
                <!-- <div class=" mt-4 flex flex-row justify-center items-center px-5 gap-20">
                    <button
                        class="bg-[#00457A] p-2 text-white rounded-md disabled:bg-[#00457a92]"
                        :disabled="!sermons.prev_page_url" 
                        @click="router.get(sermons.prev_page_url, {}, { preserveState: true })">
                        Previous
                    </button>
                    
                    <span class="text-gray-500">
                        Page {{ sermons.current_page }} of {{ sermons.last_page }}
                    </span>
                    
                    <button
                        class="bg-[#00457A] p-2 text-white rounded-md disabled:bg-[#00457a92]"
                        :disabled="!sermons.next_page_url" 
                        @click="router.get(sermons.next_page_url, {}, { preserveState: true })">
                        Next
                    </button>
                </div> -->
            </div>
        </div>
    </div>

</template>

