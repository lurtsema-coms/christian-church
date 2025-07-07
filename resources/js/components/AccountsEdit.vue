<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Password from '@/pages/settings/Password.vue';
import { formatDate } from '@vueuse/core';
import { usePage } from '@inertiajs/vue3';


const { props: page } = usePage();
const props = defineProps<{ account: any; roles: any[] }>();

const fullName = ref(props.account.name)

const form = ref({
    name: props.account.name,
    email: props.account.email,
    approval_status: props.account.approval_status,
    role: props.account.role_id,
    password: '',
    password_confirmation: '',
});

const submit = () =>{
    const formData = new FormData();
    formData.append('_method','put');
    formData.append('name', form.value.name)
    formData.append('email', form.value.email)
    formData.append('role', form.value.role)
    formData.append('approval_status', form.value.approval_status)

    
    if (form.value.password && form.value.password_confirmation) {
        formData.append('password', form.value.password);
        formData.append('password_confirmation', form.value.password_confirmation);
    }


    router.post(route('accounts.update', { account: props.account.id }), formData, {
    preserveScroll: true,
    onSuccess: () => {
        // Optional: Redirect or show success message
    },
});
};



</script>

<template>
    <div class="px-4 py-2 mx-auto space-y-8 rounded-xl border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <a class="inline-block mb-4 font-medium text-gray-500 dark:text-white" href="/admin_accounts">
        <span class="flex items-center space-x-2 cursor-pointer hover:opacity-70">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>Back to Accounts Page</span>
        </span>
        </a>

        <div class="max-w-3xl p-10 mx-auto bg-white border border-neutral-200 rounded-xl">
            <form @submit.prevent="submit">
                <div class="max-w-4xl m-auto space-y-4">
                    <div class="flex flex-col gap-4 mb-6 sm:flex-row">
                        <div class="flex-1 space-y-2">
                            <div class="space-y-2">
                                <p class="font-medium text-gray-500 dark:text-white">Full Name <span class="text-red-400">*</span></p>
                                <input
                                    v-model ="form.name"
                                    class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                    type="text"
                                    required
                                    placeholder="Enter the title here"
                                />
                                <p v-if="page.errors.name" class="mt-1 text-sm text-red-500">
                                    {{ page.errors.name }}
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 space-y-2">
                            <div class="space-y-2">
                                <p class="font-medium text-gray-500 dark:text-white">Email <span class="text-red-400">*</span></p>
                                <input
                                    v-model="form.email"
                                    class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                    type="text"
                                    required
                                    placeholder="Enter the title here"
                                />
                                <p v-if="page.errors.email" class="mt-1 text-sm text-red-500">
                                    {{ page.errors.email }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 mb-6 sm:flex-row">
                        <div class="flex-1 space-y-2">
                            <div class="space-y-2">
                                <p class="font-medium text-gray-500 dark:text-white">New Password <span class="text-red-400">*</span></p>
                                <input
                                    v-model="form.password"
                                    class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                    type="password"
                                    placeholder="Enter the title here"
                                />
                                <p v-if="page.errors.password" class="mt-1 text-sm text-red-500">
                                    {{ page.errors.password }}
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 space-y-2">
                            <div class="space-y-2">
                                <p class="font-medium text-gray-500 dark:text-white">Confirm Password <span class="text-red-400">*</span></p>
                                <input
                                    v-model="form.password_confirmation"
                                    class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                                    type="password"
                                    placeholder="Enter the title here"
                                />
                                <p v-if="page.errors.password_confirmation" class="mt-1 text-sm text-red-500">
                                    {{ page.errors.password_confirmation }}
                                </p>
                            </div>
                        </div>
                    </div>

                <div class="flex flex-col gap-4 mb-6 sm:flex-row">
                    <div class="flex-1 space-y-2">
                        <label class="font-medium text-gray-500 dark:text-white">Role <span class="text-red-400">*</span></label>
                        <select
                            v-model="form.role"
                            class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                        >
                            <option v-for="role in props.roles" :key="role.id" :value="role.id">
                            {{ role.title }}
                            </option>
                        </select>
                        <p v-if="page.errors.role" class="mt-1 text-sm text-red-500">
                            {{ page.errors.role }}
                        </p>
                    </div>
                    <div class="flex-1 space-y-2">
                        <label class="font-medium text-gray-500 dark:text-white">Status <span class="text-red-400">*</span></label>
                        <select
                            v-model="form.approval_status"
                            class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]"
                        >
                            <option :value="0">Pending</option>
                            <option :value="1">Approved</option>
                            <option :value="2">Rejected</option>
                        </select>
                        <p v-if="page.errors.approval_status" class="mt-1 text-sm text-red-500">
                            {{ page.errors.approval_status }}
                        </p>
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="!mt-8 text-right">
                    <Button type="submit">Submit</Button>
                </div>
                </div>
            </form>
        </div>
    </div>
</template>
