<script lang="ts" setup>
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem } from '@/types';
    import { Head, useForm, Link } from '@inertiajs/vue3';
    import PlaceholderPattern from '../components/PlaceholderPattern.vue';
    import { ref } from 'vue';
    import { Button } from '@/components/ui/button'
    import { Input } from '@/components/ui/input';
    import Required from '@/components/Required.vue';
    import Label from '@/components/ui/label/Label.vue'
    import { Save } from 'lucide-vue-next';
    import { CircleArrowLeft } from 'lucide-vue-next';

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Prayer',
            href: '/admin_prayer',
        },
    ];

    const props = defineProps<{
        prayer: {
            id: number,
            prayer_title: string,
            prayer_category: string,
            prayer_details: string,
            name: string,
            email: string,
            created_at: string,
            is_approved: boolean
        }
    }>();

    const form = useForm({
        prayer_title: props.prayer.prayer_title,
        prayer_category: props.prayer.prayer_category,
        prayer_details: props.prayer.prayer_details,
        name: props.prayer.name,
        email: props.prayer.email,
        is_approved: props.prayer.is_approved,
    })

    const submit = () => {
        form.put(route('admin_prayer.update', props.prayer.id));
    }
</script>

<template>
    <Head title="Calendar" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col flex-1 h-full gap-4 py-4 rounded-xl bg-gray-50">
            <div class="relative min-h-[100vh] flex-1 rounded-xl md:min-h-min">
                <div class="py-2 mx-auto space-y-8 rounded-xl border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">

                    <div class="max-w-xl p-6 mx-auto bg-white border rounded-md border-neutral-200">
                        <div class="flex flex-wrap justify-between gap-4">
                            <p class="flex items-center gap-2 mb-4 font-medium">
                                <Link :href="route('admin_prayer.index')">
                                    <CircleArrowLeft class="w-5 h-5" />
                                </Link>
                                Update Prayer
                            </p>
                            
                            <div class="font-medium">
                                <span class="text-green-600" v-if="props.prayer.is_approved">Active</span>
                                <span class="text-red-600" v-else>Inactive</span>
                            </div>
                        </div>
                        <form @submit.prevent="submit">
                            <p class="font-medium">{{ props.prayer.prayer_title }}</p>
                            <p class="text-sm">{{ props.prayer.prayer_category }}</p>
                            <br>
                            <p>{{ props.prayer.prayer_details }}</p>
                            <br>
                            <br>
                            <p class="font-medium">{{ props.prayer.name }}</p>
                            <p>{{ props.prayer.email }}</p>
                            <p>
                                {{ 
                                    new Date(props.prayer.created_at).toLocaleDateString('en-US', {
                                        weekday: 'short',
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric',
                                    }) 
                                }}
                            </p>

                            <div class="flex justify-end">
                                <Button
                                    :class="props.prayer.is_approved ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-green-600 hover:bg-green-700 text-white'"
                                    type="submit"
                                    class="flex items-center px-4 py-2 mt-4 transition rounded-md"
                                >
                                    <Save class="w-5 h-5 mr-2" />
                                    <span>
                                        {{ props.prayer.is_approved ? 'Inactive' : 'Active' }}
                                    </span>
                                </Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>