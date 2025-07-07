<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem } from '@/types';
    import { Head, useForm, Link } from '@inertiajs/vue3';
    import PlaceholderPattern from '../components/PlaceholderPattern.vue';
    import { ref } from 'vue';
    import { Button } from '@/components/ui/button'

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Calendar',
            href: '/admin_calendar',
        },
    ];

    const props = defineProps<{
        calendar: {
            id: number,
            title: string,
            description: string,
            date_time: string,
            location: string,
            img_url: string
        }
    }>();

    const form = useForm({
        title: props.calendar.title || '',
        description: props.calendar.description || '',
        dateTime: props.calendar.date_time || '',
        location: props.calendar.location || '',
        imgUrl: props.calendar.img_url || '',
    });

    const submit = () => {
        form.put(route('admin_calendar.update', props.calendar.id));
    }
</script>

<template>
    <Head title="Calendar" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col flex-1 h-full gap-4 py-4 rounded-xl bg-gray-50">
            <div class="relative min-h-[100vh] flex-1 rounded-xl md:min-h-min">
                <div class="py-2 mx-auto space-y-8 rounded-xl border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
                    <Link class="inline-block mb-4 font-medium text-gray-500 dark:text-white" :href="route('admin_calendar.index')">
                        <span class="flex items-center space-x-2 cursor-pointer hover:opacity-70">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>Back to Calendar Page</span>
                        </span>
                    </Link>

                    <div class="max-w-3xl p-10 mx-auto bg-white border border-neutral-200 rounded-xl">
                        <form @submit.prevent="submit">
                            <div class="max-w-4xl m-auto space-y-4">
                                <div class="flex flex-col gap-4 mb-6 sm:flex-row">
                                    <div class="flex-1 space-y-2">
                                        <div class="space-y-2">
                                            <p class="font-medium text-gray-500 dark:text-white">Title <span class="text-red-400">*</span></p>
                                            <input
                                                v-model ="form.title"
                                                class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                                type="text"
                                                required
                                                placeholder="Enter Title"
                                            />
                                            <p v-if="form.errors.title" class="mt-1 text-sm text-red-500">
                                                {{ form.errors.title }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex-1 space-y-2">
                                        <div class="space-y-2">
                                            <p class="font-medium text-gray-500 dark:text-white">Description <span class="text-red-400">*</span></p>
                                            <input
                                                v-model="form.description"
                                                class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                                type="text"
                                                required
                                                placeholder="Enter Description"
                                            />
                                            <p v-if="form.errors.description" class="mt-1 text-sm text-red-500">
                                                {{ form.errors.description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 mb-6 sm:flex-row">
                                    <div class="flex-1 space-y-2">
                                        <div class="space-y-2">
                                            <p class="font-medium text-gray-500 dark:text-white">Date <span class="text-red-400">*</span></p>
                                            <input
                                                v-model="form.dateTime"
                                                class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                                type="datetime-local"
                                            />
                                            <p v-if="form.errors.description" class="mt-1 text-sm text-red-500">
                                                {{ form.errors.description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex-1 space-y-2">
                                        <div class="space-y-2">
                                            <p class="font-medium text-gray-500 dark:text-white">Location <span class="text-red-400">*</span></p>
                                            <input
                                                v-model="form.location"
                                                class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                                type="text"
                                                placeholder="Enter Location"
                                            />
                                            <p v-if="form.errors.location" class="mt-1 text-sm text-red-500">
                                                {{ form.errors.location }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <!-- Submit Button -->
                            <div class="!mt-8 text-right">
                                <Button type="submit">Update</Button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

    
</template>