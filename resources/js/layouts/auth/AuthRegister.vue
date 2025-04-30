<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="flex min-h-screen flex-col items-center justify-center bg-gradient-to-r from-[#0B1C33] to-[#0D223E] p-8">
        <div class="w-full max-w-3xl">
            <div class="flex flex-col gap-8 bg-white p-6 rounded-lg shadow-md">
                <div class="flex flex-col items-center gap-4">
                    <Link :href="route('home')" class="flex flex-col items-center gap-2 font-medium">
                        <div class="mb-1 flex h-9 w-9 items-center justify-center rounded-md">
                            <AppLogoIcon class="size-9 fill-current text-[var(--foreground)] dark:text-white" />
                        </div>
                        <span class="sr-only">{{ title }}</span>
                    </Link>
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-semibold text-gray-800">{{ title }}</h1>
                        <p class="text-sm text-gray-600">{{ description }}</p>
                    </div>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
