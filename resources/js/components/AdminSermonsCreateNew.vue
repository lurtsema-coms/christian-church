<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const title = ref('');
const description = ref('');
const image = ref<File | null>(null);
const audio = ref<File | null>(null);
const isSubmitting =ref(false);

const handleImage = (e: Event) => {
    const target = e.target as HTMLInputElement;
    if (target.files?.length) {
        image.value = target.files[0];
    }
};

const handleAudio = (e: Event) => {
    const target = e.target as HTMLInputElement;
    if (target.files?.length) {
        audio.value = target.files[0];
    }
};

const submitForm = () => {
    isSubmitting.value = true;
    if (!image.value || !audio.value) {
        alert('Both image and audio files are required.');
        return;
    }

    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('description', description.value);
    formData.append('image', image.value);
    formData.append('audio', audio.value);

    router.post('/admin_sermons', formData);
};
</script>

<template>
    <div class="px-4 py-8 mx-auto space-y-8 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <a class="inline-block mb-4 font-medium text-gray-500 dark:text-white " href="/admin_sermon">
            <span class="flex items-center space-x-2 cursor-pointer hover:opacity-70">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Back to Sermons Page</span>
            </span>
        </a>

        <div class="pb-8">
            <form @submit.prevent="submitForm">
                <div class="max-w-4xl m-auto space-y-4">
                    <!-- Title -->
                    <div class="flex flex-col gap-4 sm:flex-row">
                        <div class="flex-1 space-y-2">
                            <div class="space-y-2">
                                <p class="font-medium text-gray-500 dark:text-white ">Title <span class="text-red-400">*</span></p>
                                <input
                                    v-model="title"
                                    class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                    type="text"
                                    required
                                    placeholder="Enter the title here"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Image and Audio Upload -->
                    <div class="flex flex-col gap-4 sm:flex-row">
                        <!-- Image Upload -->
                        <div class="flex-1 space-y-2">
                            <label class="font-medium text-gray-500 dark:text-white ">Upload Image <span class="text-red-400">*</span></label>
                            <input
                                class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                type="file"
                                accept="image/*"
                                required
                                @change="handleImage"
                            />
                        </div>

                        <!-- Audio Upload -->
                        <div class="flex-1 space-y-2">
                            <label class="font-medium text-gray-500 dark:text-white ">Upload Audio <span class="text-red-400">*</span></label>
                            <input
                                class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                type="file"
                                accept="audio/*"
                                required
                                @change="handleAudio"
                            />
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <div class="flex-1 space-y-2">
                            <p class="font-medium text-gray-500 dark:text-white ">Description <span class="text-red-400">*</span></p>
                            <textarea
                                v-model="description"
                                class="text-md w-full p-4 border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                cols="50"
                                rows="5"
                                required
                                placeholder="Provide a detailed description"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="!mt-8 text-right">
                        <Button type="submit":disabled="isSubmitting">
                            <template v-if="isSubmitting">
                                <svg class="animate-spin inline w-4 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                </svg>
                                Submitting...
                            </template>
                            <template v-else>
                                Submit
                            </template>
                        </Button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
