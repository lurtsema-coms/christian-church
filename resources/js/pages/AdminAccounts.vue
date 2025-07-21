<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Button } from '@/components/ui/button'
import HeaderSub from '@/components/HeaderSub.vue';
import AdminAccountsTable from '@/components/AdminAccountsTable.vue';

defineProps({
    users: Object
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Accounts',
        href: '/admin_accounts',
    },
];
</script>

<template>
    <Head title="Accounts" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col flex-1 h-full gap-4 p-4 rounded-xl bg-gray-50">
            <div class="relative min-h-[100vh] flex-1  md:min-h-min px-8">
                <HeaderSub title="Accounts" subtitle="Manage the users of your application. You can edit, and delete accounts." />
                <AdminAccountsTable :users="users" />
            </div>
        </div>
    </AppLayout>
</template>
