<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import SermonsEdit from '@/components/SermonsEdit.vue';

defineProps<{ sermon: any }>();


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit Sermon',
        href: '/admin_sermons/{sermon}/edit',
    },
];
</script>

<template>
    <Head title="Edit Sermon" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl py-4 ">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <SermonsEdit :sermon="sermon"/>
            </div>
        </div>
    </AppLayout>
</template>
