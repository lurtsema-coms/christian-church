<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
</script>



<template>
    <div class="px-4 py-8 mx-auto space-y-8 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between">
            <Button @click="router.visit('/admin_sermons/create')">Create</Button>
            <div class="relative p-1 overflow-hidden pointer-events-auto w-52 md:max-w-96">
                <input 
                    class="text-sm text-black w-full px-4 border border-slate-300 rounded-lg focus:border-none focus:outline-none focus:ring-2 focus:ring-[#1F4B55]" 
                    type="search" 
                    placeholder="Search..."
                >
                <select  class="text-sm text-black w-full px-4 border border-slate-300 rounded-lg focus:border-none focus:outline-none focus:ring-2 focus:ring-[#1F4B55]" name="" id="">
                    <option value="">All Categories</option>
                </select>
            </div>
        </div>
        <div class="overflow-x-auto custom-scrollbar">
            <table class="min-w-full">
                <thead class="border border-sidebar-border/70 dark:border-sidebar-border">
                    <tr>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Title</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Description</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Image</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Audio File</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">DateTime</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Created By</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-sidebar-border/70 dark:border-sidebar-border divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap"></td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap"></td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap"></td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap"></td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap"></td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap"></td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <Button>Edit</Button>
                                <Button variant="destructive" @click="">Delete</Button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>