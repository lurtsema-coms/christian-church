<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

defineProps({
    users: Object
});


</script>



<template>
    <div class="px-4 py-8 mx-auto space-y-8 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <!-- <div class="flex flex-wrap items-center justify-between">
            <Button >Create</Button>
            <div class="relative p-1 overflow-hidden pointer-events-auto w-52 md:max-w-96">
                <input 
                    class="text-sm text-black w-full px-4 border border-slate-300 rounded-lg focus:border-none focus:outline-none focus:ring-2 focus:ring-[#1F4B55]" 
                    type="search" 
                    placeholder="Search..."
                >
            </div>
        </div> -->
        <div class="overflow-x-auto custom-scrollbar">
            <table class="min-w-full">
                <thead class="border border-sidebar-border/70 dark:border-sidebar-border">
                    <tr>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Name</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Email</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Role</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Status</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Created At</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Approved At</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-sidebar-border/70 dark:border-sidebar-border divide-y divide-gray-200">
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.name }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.email }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.role_id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.approval_status }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.created_at }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.approved_at }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <Button >Edit</Button>
                                <Button variant="destructive">Delete</Button>
                                <!-- <Button >Approve</Button>
                                <Button variant="destructive">Reject</Button> -->
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>