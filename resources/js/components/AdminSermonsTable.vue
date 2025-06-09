<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

// defineProps({
//     sermons: Object
// });

const props = defineProps<{ sermons: any }>(); 



const editSermon = (sermon) =>{
    router.get(route('sermons.edit', sermon.id));
}

const deleteSermon = (id) => {
    if (confirm('Are you sure you want to delete this Sermon?')) {
        router.delete(route('sermons.destroy', id), {
            preserveState: true,
            replace: true
        });
    }
};

</script>



<template>
    <div class="px-4 py-8 max-w-[380px] mx-auto space-y-8 border rounded-xl border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between">
            <Button @click="router.visit('/admin_sermons/create')">Create</Button>
            <div class="relative p-1 overflow-hidden pointer-events-auto w-52 md:max-w-96">

            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border border-sidebar-border/70 dark:border-sidebar-border">
                    <tr>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 dark:text-white uppercase whitespace-nowrap">Title</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 dark:text-white uppercase whitespace-nowrap">Description</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 dark:text-white uppercase whitespace-nowrap">Image</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 dark:text-white uppercase whitespace-nowrap">Audio File</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 dark:text-white uppercase whitespace-nowrap">DateTime</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 dark:text-white uppercase whitespace-nowrap">Created By</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 dark:text-white uppercase whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="border divide-y divide-gray-200 border-sidebar-border/70 dark:border-sidebar-border">
                    <tr v-for="sermon in sermons.data" :key="sermon.id">
                        <td class="px-6 py-3 text-sm text-gray-700 dark:text-white whitespace-nowrap max-w-[200px] overflow-hidden text-ellipsis">{{ sermon.title }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 dark:text-white whitespace-nowrap max-w-[200px] overflow-hidden text-ellipsis">{{ sermon.description }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 dark:text-white whitespace-nowrap">
                            <img :src="sermon.image_url" alt="Image" class="object-cover w-auto h-16 rounded-md" />
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700 dark:text-white whitespace-nowrap">
                            <a v-if="sermon.audio_url" :href="sermon.audio_url" target="_blank" class="text-blue-600 underline">Listen Audio</a>
                            <span v-else class="italic text-gray-400">N/A</span>
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700 dark:text-white whitespace-nowrap">{{ new Date(sermon.created_at).toLocaleString() }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 dark:text-white whitespace-nowrap">{{ sermon.creator?.name || 'Unknown' }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 dark:text-white whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <Button @click="editSermon(sermon)">Edit</Button>
                                <Button variant="destructive" @click="deleteSermon(sermon.id)">Delete</Button>
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
            
            <span class="text-gray-500 dark:text-white">
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