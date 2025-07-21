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
import { PencilIcon, Trash } from 'lucide-vue-next';



const props = defineProps<{ users: any }>(); 

const approveUser = (id: number) => {
    router.put(`/admin_accounts/${id}/approve`);
};

const rejectUser = (id: number) =>{
    router.put(`/admin_accounts/${id}/reject`)
};

const deleteUser = (id: number) =>{
    router.put(`/admin_accounts/${id}/delete`)
};

const editAccount = (account) =>{
    router.get(route('accounts.edit', account.id));
}


// onMounted(() => {
// console.log('Logging approval_status and types:');
//     props.users.data.forEach((user: any) => {
//         console.log(`User ID: ${user.id}, approval_status:`, user.approval_status, `(${typeof user.approval_status})`);
//     });
// });

</script>



<template>
    <div class="mt-8 overflow-hidden rounded-md">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#12876F] border-b">
                    <tr>
                        <th class="p-4 text-sm text-left text-white dark:text-white whitespace-nowrap">Name</th>
                        <th class="p-4 text-sm text-left text-white dark:text-white whitespace-nowrap">Email</th>
                        <th class="p-4 text-sm text-left text-white dark:text-white whitespace-nowrap">Role</th>
                        <th class="p-4 text-sm text-left text-white dark:text-white whitespace-nowrap">Status</th>
                        <th class="p-4 text-sm text-left text-white dark:text-white whitespace-nowrap">Created At</th>
                        <th class="p-4 text-sm text-left text-white dark:text-white whitespace-nowrap">Updated At</th>
                        <th class="p-4 text-sm text-left text-white dark:text-white whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="user in users.data" :key="user.id" class="border-b hover:bg-gray-50 last:border-b-0">
                        <td class="p-4 text-sm text-gray-700 dark:text-white whitespace-nowrap">{{ user.name }}</td>
                        <td class="p-4 text-sm text-gray-700 dark:text-white whitespace-nowrap">{{ user.email }}</td>
                        <td class="p-4 text-sm text-gray-700 dark:text-white whitespace-nowrap">{{ user.role_id === 1 ? 'Admin' : user.role_id === 2 ? 'User' : 'N/A' }}</td>
                        <td class="p-4 text-sm font-medium text-gray-700 dark:text-white whitespace-nowrap":class="{
                            'text-orange-500': user.approval_status == 0,
                            'text-green-600': user.approval_status == 1,
                            'text-red-500': user.approval_status == 2
                        }"
                        >{{ (user.approval_status == 0)? 'Pending' : (user.approval_status == 1 ? 'Accepted' : 'Rejected') }}</td>
                        <td class="p-4 text-sm text-gray-700 dark:text-white whitespace-nowrap"> {{ new Date(user.created_at).toISOString().split('T')[0] }}</td>
                        <td class="p-4 text-sm text-gray-700 dark:text-white whitespace-nowrap">  {{ new Date(user.updated_at).toISOString().split('T')[0] }}</td>
                        <td class="p-4 text-sm text-gray-700 dark:text-white whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <template v-if="user.approval_status === 0">
                                    <Dialog>
                                        <DialogTrigger>
                                            <Button>Approve</Button>
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
                                    <!-- <Button class="bg-sky-600" @click="editAccount(user)">Edit</Button> -->
                                    <!-- Edit -->
                                    <button 
                                        @click="editAccount(user)"
                                        class="text-sm cursor-pointer text-sky-600 hover:underline"
                                    >
                                        <PencilIcon class="size-5 hover:text-sky-800" />
                                    </button>
                                    <Dialog>
                                        <DialogTrigger>
                                            <!-- <Button variant="destructive">Delete</Button> -->
                                            <button 
                                                class="relative text-sm text-red-600 cursor-pointer top-0.5 hover:underline"
                                            >
                                                <Trash class="size-5 hover:text-red-800" />
                                            </button>
                                        </DialogTrigger>
                                        <DialogContent>
                                            <form class="space-y-6" >
                                                <DialogHeader class="space-y-3">
                                                    <DialogTitle>Are you sure you want to delete this account?</DialogTitle>
                                                    <DialogDescription>
                                                        Once this account is delete, you can no revert this change.
                                                    </DialogDescription>
                                                </DialogHeader>
                                                <DialogFooter class="gap-2">
                                                    <DialogClose as-child>
                                                        <Button variant="secondary"> Cancel </Button>
                                                    </DialogClose>
                                                    <Button variant="destructive">
                                                        <button type="submit" @click="deleteUser(user.id)">Delete</button>
                                                    </Button>
                                                </DialogFooter>
                                            </form>
                                        </DialogContent>
                                    </Dialog>
                                </template>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>