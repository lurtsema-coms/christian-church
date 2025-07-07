<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem } from '@/types';
    import { Head, Link, router, usePage } from '@inertiajs/vue3';
    import PlaceholderPattern from '../components/PlaceholderPattern.vue';
    import { ref, watch } from 'vue';
    import { Button } from '@/components/ui/button'

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Calendar',
            href: '/admin_calendar',
        },
    ];

    const props = defineProps<{
        calendars: {
            data: {
                id: number,
                title: string,
                description: string,
                date_time: string,
                location: string,
                img_url: string
            }[],
            current_page: number,
            last_page: number,
            total: number,
            per_page: number
        }
    }>();

    type FlashProps = {
        success?: string,
        error?: string,
    }

    const page = usePage<{ flash: FlashProps }>();
    const showSuccess = ref(false);
    watch(
        () => page.props.flash?.success,
        (newVal) => {
            if (newVal) {
                showSuccess.value = true;
                setTimeout(() => {
                    showSuccess.value = false;
                }, 3000)
            }
        },
        { immediate: true }
    );
</script>

<template>
    <Head title="Calendar" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col flex-1 h-full gap-4 p-4 rounded-xl bg-gray-50">
            <div class="relative bg-white border rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <!-- Table -->
                <div class="overflow-x-auto p-7">
                    <Link :href="route('admin_calendar.create')">
                        <Button class="mb-7">Create</Button>
                    </Link>
                    <table class="w-full min-w-full">
                        <thead class="border border-sidebar-border/70 dark:border-sidebar-border">
                        <tr>
                            <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Title</th>
                            <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Description</th>
                            <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Location</th>
                            <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Date</th>
                            <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="border divide-y divide-gray-200 border-sidebar-border/70 dark:border-sidebar-border">
                            <tr v-if="props.calendars.data.length === 0">                    
                                <td colspan="5" class="px-6 py-3 text-sm text-center text-gray-700">
                                    No data requests as of the moment
                                </td>
                            </tr>
                            <tr v-else v-for="calendar in props.calendars.data" :key="calendar.id">
                                <td class="max-w-xs px-6 py-3 text-sm text-gray-700">{{ calendar.title }}</td>
                                <td class="max-w-xs px-6 py-3 text-sm text-gray-700">{{ calendar.description }}</td>
                                <td class="max-w-xs px-6 py-3 text-sm text-gray-700">{{ calendar.location }}</td>
                                <td class="max-w-xs px-6 py-3 text-sm text-gray-700">
                                    {{
                                        new Date(calendar.date_time).toLocaleString('en-US', {
                                            weekday: 'short',   // "Fri"
                                            year: 'numeric',    // "2025"
                                            month: 'long',      // "June"
                                            day: '2-digit',     // "24"
                                            hour: 'numeric',    // "12"
                                            minute: '2-digit',  // "31"
                                            hour12: true        // "PM"
                                        })
                                    }}
                                </td>
                                <td class="max-w-xs px-6 py-3">
                                    <Link :href="route('admin_calendar.edit', calendar.id)">
                                        <Button class="mr-2">Edit</Button>
                                    </Link>
                                    <Button
                                        variant="destructive"
                                        @click="router.delete(route('admin_calendar.destroy', calendar.id), {
                                            preserveScroll: true,
                                            preserveState: true,
                                            onSuccess: () => {
                                                router.reload();
                                            }
                                        })"
                                    >
                                        Delete
                                    </Button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- ✅ Flash success message -->
                    <div
                        v-if="showSuccess"
                        class="mt-8 text-sm font-medium text-right text-green-600"
                    >
                        {{ page.props.flash.success }}
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
