<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem } from '@/types';
    import { Head, Link, router, usePage } from '@inertiajs/vue3';
    import PlaceholderPattern from '../components/PlaceholderPattern.vue';
    import { ref, watch, computed } from 'vue';
    import { Button } from '@/components/ui/button';
    import HeaderSub from '@/components/HeaderSub.vue';
    import BackendTable from '@/components/BackendTable.vue';
    import { PlusCircle } from 'lucide-vue-next';
    import Input from '@/components/ui/input/Input.vue'

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

    const search = ref('');
    
    let timeout: ReturnType<typeof setTimeout>
    watch(search, (val) => {
        clearTimeout(timeout)
        timeout = setTimeout(() => {
            router.get('/admin_calendar', { search: val }, {
            preserveScroll: true,
            preserveState: true,
            })
        }, 300)
    })
    const tableHeaders = {
        id: 'ID',
        title: 'Title',
        description: 'Description',
        location: 'Location',
        date_time: 'Date & Time',
        actions: 'Actions'
    };
    // ✅ Transform table data
    const tableRows = computed(() => {
        return props.calendars.data.map((calendar) => ({
            ...calendar,
            date_time: new Date(calendar.date_time).toLocaleDateString('en-US', {
                weekday: 'short',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
          }),
        }))
    })
</script>

<template>
    <Head title="Calendar" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="relative flex flex-col flex-1 h-full gap-4 p-4 bg-gray-50 rounded-xl">
            <div class="px-8">
                <HeaderSub title="Calendar" subtitle="Manage events. You can add, edit, and delete events." />

                <br />

                <div class="flex flex-col-reverse flex-wrap justify-between gap-4 mb-4 md:flex-row">
                    <Input
                        v-model="search"
                        placeholder="Search here..."
                        class="max-w-sm"
                    />
                    <Link :href="route('admin_calendar.create')">
                        <Button class="cursor-pointer bg-primaryGreen">
                            Add Event <PlusCircle class="w-4 h-4" />
                        </Button>
                    </Link>
                </div>

                <BackendTable 
                    :tableData="{ ...props.calendars, data: tableRows }"
                    :tableHeaders="tableHeaders"
                    tableLink="admin_calendar"
                    :tableEditLink="(id: number) => route('admin_calendar.edit', id)"
                />

                <div
                    v-if="showSuccess"
                    class="mt-8 text-sm font-medium text-right text-green-600"
                >
                    {{ page.props.flash.success }}
                </div>
            </div>
        </div>
        <!-- <div class="flex flex-col flex-1 h-full gap-4 p-4 rounded-xl bg-gray-50">
            <div class="relative bg-white border rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
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
                                            weekday: 'short',   
                                            year: 'numeric',    
                                            month: 'long',      
                                            day: '2-digit',     
                                            hour: 'numeric',    
                                            minute: '2-digit',  
                                            hour12: true        
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
                    <div
                        v-if="showSuccess"
                        class="mt-8 text-sm font-medium text-right text-green-600"
                    >
                        {{ page.props.flash.success }}
                    </div>
                </div>
            </div>
        </div> -->
    </AppLayout>
</template>
