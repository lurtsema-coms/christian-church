<script setup lang="ts">
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import { Head  } from '@inertiajs/vue3';


    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Online Giving" />

    <div class="relative pb-16 pt-28">
        <!-- BG -->
        <img src="/img/cardboard-texture.webp" alt="cardboard-texture-bg" class="absolute inset-0 z-0 object-cover w-full h-full mix-blend-multiply" />
        <div class="absolute inset-0 z-0 bg-gray-100/75"></div>

        <!-- Content wrapper: make sure it's above the image -->
        <div class="relative z-10 flex flex-col px-5 mt-12">
            <div class="z-10">
                <HeadingDescription description="Gathering, Growing, Giving, and Going for the glory of God." class="text-center !text-[#00457A] !font-bold"/>
                <div class="relative max-w-3xl p-10 mx-auto mt-8 overflow-hidden bg-white rounded-md">
                    <!-- BG Image -->
                    <img src="/img/hands-up.webp" alt="cardboard-texture-bg"
                        class="absolute inset-0 z-0 object-cover w-full h-full" />

                    <p class="relative z-10 max-w-xl mx-auto text-lg font-semibold text-center text-white">
                        That’s the G6 Culture of Big Island Christian Church. The biblical truth of giving is always about giving BACK to God because there’s no blessing we’ve received that didn’t come from Him.
                    </p>

                    <Button class="relative z-10 bg-[#00576B] text-white font-bold px-8 py-6 md:text-lg flex mx-auto mt-8">
                        GIVE ONLINE
                    </Button>
                </div>
                <p class="max-w-lg mx-auto mt-8 italic font-semibold text-center text-neutral-700">
                    “Each one should give what they have decided in their heart to give, not out of regret or compulsion. For God loves a cheerful giver.”
                </p>
                <p class="mt-4 text-center text-sky-600">2 Cor 9:7</p>
            </div>
        </div>
    </div>
</template>