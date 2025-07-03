<script setup lang="ts">
import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({ layout: AppLayout });

defineProps({
    sermons: Object,
});
</script>

<template>
    <Head title="Sermons" />

    <div class="relative w-full pb-16 pt-20">
        <img
            src="/img/cardboard-texture.webp"
            alt="cardboard-texture-bg"
            class="absolute inset-0 z-0 h-full w-full object-cover mix-blend-multiply"
        />
        <div class="absolute inset-0 z-0 bg-gray-100/75"></div>

        <div class="relative z-10 mt-12 flex flex-col px-5">
            <div class="z-10 w-full">
                <div
                    v-for="sermon in sermons.data"
                    :key="sermon.id"
                    class="mb-10 mt-12 flex flex-col items-center justify-center rounded-md px-5 md:h-[18rem] md:flex-row"
                >
                    <img :src="sermon.image_url" alt="Image" class="h-full w-full rounded-t-lg md:max-w-md md:rounded-t-none lg:rounded-l-lg" />
                    <div
                        class="bg-[#00457A] p-6 text-white sm:flex sm:h-full sm:w-full sm:flex-col md:max-w-[36rem] md:rounded-b-none lg:rounded-r-lg"
                    >
                        <div class="flex-1">
                            <span class="mb-1 block text-center text-[1.5rem] font-bold">{{ sermon.title }}</span>
                            <div class="text-center" v-html="sermon.description"></div>
                        </div>
                        <div class="mt-5 rounded">
                            <audio controls class="w-full">
                                <source :src="sermon.audio_url" type="audio/mpeg" />
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-center gap-20 px-5 mt-4">
                    <button
                        class="bg-[#00457A] p-2 text-white rounded-md disabled:bg-[#00457a92]"
                        :disabled="!sermons.prev_page_url" 
                        @click="$inertia.get(sermons.prev_page_url)">
                        Previous
                    </button>
                    
                    <span class="text-gray-500">
                        Page {{ sermons.current_page }} of {{ sermons.last_page }}
                    </span>
                    
                    <button
                        class="bg-[#00457A] p-2 text-white rounded-md disabled:bg-[#00457a92]"
                        :disabled="!sermons.next_page_url" 
                        @click="$inertia.get(sermons.next_page_url)">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
