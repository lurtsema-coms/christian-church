<script setup lang="ts">
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import { Head  } from '@inertiajs/vue3';

    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Events" />

    <div class="relative pb-16 pt-28">
        <!-- BG -->
        <img src="/img/cardboard-texture.webp" alt="cardboard-texture-bg" class="absolute inset-0 z-0 object-cover w-full h-full mix-blend-multiply" />
        <div class="absolute inset-0 z-0 bg-gray-100/75"></div>

        <div class="relative z-10 flex flex-col px-5 mt-12">
            <div class="z-10">
                <HeadingDescription description="Church Events & Gatherings" class="text-center !text-[#00457A] !font-bold"/>
                <p class="max-w-lg mx-auto mt-3 italic font-semibold text-center text-neutral-700 !px-1">
                    Stay connected and grow in faith with our upcoming church events! From worship nights and Bible studies to family fellowships and community outreach, there’s something for everyone. Join us as we build relationships and strengthen our walk with Christ.
                </p>
                <div class="flex flex-row items-center justify-center gap-4 p-5 mt-10 border-b border-gray-300 md:gap-16">
                    <button class="p-2 bg-[#00576B] text-white rounded-md disabled:bg-[#00457a92]">
                        Back
                    </button>
                    <span class="text-[#00576B] text-xl font-bold">
                        November 2025   
                    </span>
                    <button class="p-2 bg-[#00576B] text-white k rounded-md disabled:bg-[#00457a92]">
                        Next
                    </button>
                </div>
                <div class="mb-10 mt-12 flex flex-col items-center justify-center rounded-md px-5 md:h-[10rem] md:flex-row">
                    <div class="flex justify-center items-center w-full flex-col bg-[#00576B] text-white font-bold rounded-t-lg  sm:h-full md:w-36 md:rounded-t-none lg:rounded-l-lg">
                        <span class="text-5xl">8</span>
                        <span class="text-sm">Nov</span>
                    </div>
                    <div class="bg-white px-6 py-3 shadow-md  sm:flex sm:h-full sm:w-full sm:flex-col md:max-w-[36rem] md:rounded-b-none md:rounded-r-lg">
                        <div class="flex flex-col h-full justify-between gap-3">
                            <span class="text-[#00576B] text-xl font-bold">RANDOM TITLE HERE</span>
                            <p class="">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit"</p>
                            <div class="text-white text-sm flex gap-2">
                                <span class="bg-[#00576B] px-3 py-1 rounded-xl">1:42AM</span>
                                <span class="bg-[#00576B] px-3 py-1 rounded-xl">@ Manila, Philippines</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-10 mt-12 flex flex-col items-center justify-center rounded-md px-5 md:h-[10rem] md:flex-row">
                    <div class="flex justify-center items-center w-full flex-col bg-[#00576B] text-white font-bold rounded-t-lg  sm:h-full md:w-36 md:rounded-t-none lg:rounded-l-lg">
                        <span class="text-5xl">8</span>
                        <span class="text-sm">Nov</span>
                    </div>
                    <div class="bg-white px-6 py-3 shadow-md  sm:flex sm:h-full sm:w-full sm:flex-col md:max-w-[36rem] md:rounded-b-none md:rounded-r-lg">
                        <div class="flex flex-col h-full justify-between gap-3">
                            <span class="text-[#00576B] text-xl font-bold">RANDOM TITLE HERE</span>
                            <p class="">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit"</p>
                            <div class="text-white text-sm flex gap-2">
                                <span class="bg-[#00576B] px-3 py-1 rounded-xl">1:42AM</span>
                                <span class="bg-[#00576B] px-3 py-1 rounded-xl">@ Manila, Philippines</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-10 mt-12 flex flex-col items-center justify-center rounded-md px-5 md:h-[10rem] md:flex-row">
                    <div class="flex justify-center items-center w-full flex-col bg-[#00576B] text-white font-bold rounded-t-lg  sm:h-full md:w-36 md:rounded-t-none lg:rounded-l-lg">
                        <span class="text-5xl">8</span>
                        <span class="text-sm">Nov</span>
                    </div>
                    <div class="bg-white px-6 py-3 shadow-md  sm:flex sm:h-full sm:w-full sm:flex-col md:max-w-[36rem] md:rounded-b-none md:rounded-r-lg">
                        <div class="flex flex-col h-full justify-between gap-3">
                            <span class="text-[#00576B] text-xl font-bold">RANDOM TITLE HERE</span>
                            <p class="">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit"</p>
                            <div class="text-white text-sm flex gap-2">
                                <span class="bg-[#00576B] px-3 py-1 rounded-xl">1:42AM</span>
                                <span class="bg-[#00576B] px-3 py-1 rounded-xl">@ Manila, Philippines</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>