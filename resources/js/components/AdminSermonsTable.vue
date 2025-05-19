<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

defineProps({
    sermons: Object
});



const editSermon = (sermon) =>{
    router.get(route('sermons.edit', sermon.id));
}

const deleteProduct = (id) => {
    if (confirm('Are you sure you want to delete this Sermon?')) {
        router.delete(route('sermons.destroy', id), {
            preserveState: true,
            replace: true
        });
    }
};

</script>



<template>
    <div class="px-4 py-8 mx-auto space-y-8 border rounded-xl border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
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
                <tbody class="border divide-y divide-gray-200 border-sidebar-border/70 dark:border-sidebar-border">
                    <tr v-for="sermon in sermons.data" :key="sermon.id">
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ sermon.title }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ sermon.description }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <img :src="sermon.image_url" alt="Image" class="object-cover w-auto h-16 rounded-md" />
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <a v-if="sermon.audio_url" :href="sermon.audio_url" target="_blank" class="text-blue-600 underline">Listen Audio</a>
                            <span v-else class="italic text-gray-400">N/A</span>
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ new Date(sermon.created_at).toLocaleString() }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ sermon.creator?.name || 'Unknown' }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <Button @click="editSermon(sermon)">Edit</Button>
                                <Button variant="destructive" @click="deleteProduct(sermon.id)">Delete</Button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4">
            <Button 
                :disabled="!sermons.prev_page_url" 
                @click="router.get(sermons.prev_page_url, {}, { preserveState: true })">
                Previous
            </Button>
            
            <span class="text-gray-500">
                Page {{ sermons.current_page }} of {{ sermons.last_page }}
            </span>
            
            <Button 
                :disabled="!sermons.next_page_url" 
                @click="router.get(sermons.next_page_url, {}, { preserveState: true })">
                Next
            </Button>
        </div>
    </div>
</template>