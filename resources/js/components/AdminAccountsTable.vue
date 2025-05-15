<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';



const props = defineProps<{ users: any }>(); 

const approveUser = (id: number) => {
    router.put(`/admin_accounts/${id}/approve`);
};

const rejectUser = (id: number) =>{
    router.put(`/admin_accounts/${id}/reject`)
};


// onMounted(() => {
// console.log('Logging approval_status and types:');
//     props.users.data.forEach((user: any) => {
//         console.log(`User ID: ${user.id}, approval_status:`, user.approval_status, `(${typeof user.approval_status})`);
//     });
// });

</script>



<template>
    <div class="px-4 py-8 mx-auto space-y-8 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="min-w-full">
                <thead class="border border-sidebar-border/70 dark:border-sidebar-border">
                    <tr>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Name</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Email</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Role</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Status</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Created At</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Updated At</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-sidebar-border/70 dark:border-sidebar-border divide-y divide-gray-200">
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.name }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.email }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.role_id === 1 ? 'Admin' : user.role_id === 2 ? 'User' : 'N/A' }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ (user.approval_status == 0)? 'Pending' : (user.approval_status == 1 ? 'Accepted' : 'Rejected') }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.created_at }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">{{ user.updated_at }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <template v-if="user.approval_status === 0">
                                    <Dialog>
                                        <DialogTrigger>
                                            <Button >Approve</Button>
                                        </DialogTrigger>
                                        <DialogContent>
                                            <form class="space-y-6" >
                                                <DialogHeader class="space-y-3">
                                                    <DialogTitle>Are you sure you want to approve this account?</DialogTitle>
                                                    <DialogDescription>
                                                        Once this account is approved, you can no revert this change.
                                                    </DialogDescription>
                                                </DialogHeader>
                                                <DialogFooter class="gap-2">
                                                    <DialogClose as-child>
                                                        <Button variant="secondary"> Cancel </Button>
                                                    </DialogClose>
                                                    <Button variant="default">
                                                        <button type="submit" @click="approveUser(user.id)">Approve</button>
                                                    </Button>
                                                </DialogFooter>
                                            </form>
                                        </DialogContent>
                                    </Dialog>
                                    <Dialog>
                                        <DialogTrigger>
                                            <Button variant="destructive">Reject</Button>
                                        </DialogTrigger>
                                        <DialogContent>
                                            <form class="space-y-6" >
                                                <DialogHeader class="space-y-3">
                                                    <DialogTitle>Are you sure you want to reject this account?</DialogTitle>
                                                    <DialogDescription>
                                                        Once this account is rejected, you can no revert this change.
                                                    </DialogDescription>
                                                </DialogHeader>
                                                <DialogFooter class="gap-2">
                                                    <DialogClose as-child>
                                                        <Button variant="secondary"> Cancel </Button>
                                                    </DialogClose>
                                                    <Button variant="destructive">
                                                        <button type="submit" @click="rejectUser(user.id)">Reject</button>
                                                    </Button>
                                                </DialogFooter>
                                            </form>
                                        </DialogContent>
                                    </Dialog>
                                </template>
                                <template v-else-if="user.approval_status === 1">
                                    <Button>Edit</Button>
                                    <Button variant="destructive">Delete</Button>
                                </template>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>