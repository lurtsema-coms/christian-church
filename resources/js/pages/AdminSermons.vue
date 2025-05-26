<script setup lang="ts">
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem } from '@/types';
    import { Head } from '@inertiajs/vue3';
    import PlaceholderPattern from '../components/PlaceholderPattern.vue';
    import { ref } from 'vue';
    import { Button } from '@/components/ui/button'
import AdminSermonsTable from '@/components/AdminSermonsTable.vue';

defineProps({
    sermons: Object
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Sermons',
        href: '/admin_sermon',
    },
];
</script>

<template>
    <Head title="Sermons" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col flex-1 h-full gap-4 py-4 rounded-xl ">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <AdminSermonsTable :sermons="sermons"/>
            </div>
        </div>
    </AppLayout>
</template>
