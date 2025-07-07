<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AccountsEdit from '@/components/AccountsEdit.vue';

defineProps<{ account: any; roles: any[] }>();


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit Account',
        href: '/admin_accounts/{account}/edit',
    },
];
</script>

<template>
    <Head title="Edit Account" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col flex-1 h-full gap-4 py-4 rounded-xl bg-gray-50">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <AccountsEdit :account="account" :roles="roles"/>
            </div>
        </div>
    </AppLayout>
</template>
