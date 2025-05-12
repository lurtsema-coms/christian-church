<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="flex min-h-svh bg-background">
        <div class="hidden xl:flex w-full min-h-svh bg-[url('/img/tropical-beach.webp')] bg-cover bg-center bg-fixed p-5 brightness-75">
        </div>
        <div class="flex flex-col justify-center w-full p-10 xl:max-w-2xl bg-gray-50">
            <div class="">
                <img src="/img/church_logo.png" alt="church-logo" class="w-[4rem] mx-auto mb-4"/>
                <div :class="['w-full p-10 m-auto bg-white border border-neutral-300 rounded-xl max-w-md']">
                    <div class="flex flex-col gap-8">
                        <div class="flex flex-col items-center">
                            <Link :href="route('home')" class="flex flex-col items-center gap-2 font-medium">
                                <span class="sr-only">{{ title }}</span>
                            </Link>
                            <div class="space-y-2 text-center">
                                <h1 class="text-xl font-medium">{{ title }}</h1>
                                <p class="text-sm text-center text-muted-foreground">{{ description }}</p>
                            </div>
                        </div>
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
