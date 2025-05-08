<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

defineProps({
    sermons: Object
});

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
                <!-- <select  class="text-sm text-black w-full px-4 border border-slate-300 rounded-lg focus:border-none focus:outline-none focus:ring-2 focus:ring-[#1F4B55]" name="" id="">
                    <option value="">All Categories</option>
                </select> -->
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
                    <tr v-for="sermon in sermons.data" :key="sermon.id">
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ sermon.title }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ sermon.description }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <img :src="sermon.image_url" alt="Image" class="h-16 w-auto rounded-md object-cover" />
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <a v-if="sermon.audio_url" :href="sermon.audio_url" target="_blank" class="text-blue-600 underline">Listen</a>
                            <span v-else class="text-gray-400 italic">N/A</span>
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ new Date(sermon.created_at).toLocaleString() }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ sermon.creator?.name || 'Unknown' }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <Button>Edit</Button>
                                <Button variant="destructive">Delete</Button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <!-- <div class="mt-6 flex justify-end gap-2">
            <Button v-if="sermons.prev_page_url" @click="router.visit(sermons.prev_page_url)">Previous</Button>
            <Button v-if="sermons.next_page_url" @click="router.visit(sermons.next_page_url)">Next</Button>
        </div> -->
    </div>
</template>