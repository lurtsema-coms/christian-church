<script setup lang="ts">
  import { ref, computed } from 'vue';
  import AppLayout from '@/layouts/AppLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { type BreadcrumbItem } from '@/types';
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
  import { Button } from '@/components/ui/button';
  import { useForm } from '@inertiajs/vue3';
  
  const breadcrumbs: BreadcrumbItem[] = [
    {
      title: 'Prayer',
      href: '/admin_prayer',
    },
  ];
  const props = defineProps<{
    prayers: {
      id: number;
      name: string;
      email: string;
      prayer_title: string;
      prayer_category: string;
      prayer_details: string;
      created_at: string;
      is_approved: boolean;
    }[];
  }>();

  const selectedPrayer = ref<typeof props.prayers[number] | null>(null);

  const displayPrayer = computed(() => selectedPrayer.value || {
    id: 0,
    prayer_title: '',
    prayer_category: '',
    prayer_details: '',
    name: '',
    email: '',
    created_at: '',
    is_approved: false,
  });
  const form = useForm({});

  function toggleStatus(id: number) {
      console.log('Toggling status for ID:', id); // Debug
      form.put(`/admin_prayer/${id}`, {
          preserveScroll: true,
          onSuccess: () => {
              if (selectedPrayer.value) {
                  selectedPrayer.value.is_approved = !selectedPrayer.value.is_approved;
                  console.log('Updated is_approved:', selectedPrayer.value.is_approved);
              }
          },
          onError: (errors) => {
              console.error('Error updating prayer:', errors); // Debug errors
          },
      });
  }


  
</script>

<template>
  <Head title="Admin Prayer" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="flex flex-col flex-1 h-full gap-4 p-4 rounded-xl">
      <div class="p-7 relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
        <!-- Table -->
        <div class="overflow-x-auto">
          <table class="w-full min-w-full">
            <thead class="border border-sidebar-border/70 dark:border-sidebar-border">
              <tr>
                <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Title</th>
                <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Category</th>
                <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Details</th>
                <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Name</th>
                <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">DateTime</th>
                <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Status</th>
                <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Actions</th>
              </tr>
            </thead>
            <tbody class="border divide-y divide-gray-200 border-sidebar-border/70 dark:border-sidebar-border">
              <tr v-if="prayers.length === 0">
                <td colspan="7" class="px-6 py-3 text-sm text-center text-gray-700">
                  No data requests as of the moment
                </td>
              </tr>
              <tr v-else v-for="prayer in prayers" :key="prayer.id">
                <td class="max-w-xs px-6 py-3 text-sm text-gray-700" :title="prayer.prayer_title">{{ prayer.prayer_title }}</td>
                <td class="px-6 py-3 text-sm text-gray-700" :title="prayer.prayer_category">{{ prayer.prayer_category }}</td>
                <td class="px-6 py-3 text-sm text-gray-700" :title="prayer.prayer_details">{{ prayer.prayer_details }}</td>
                <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap" :title="prayer.name">{{ prayer.name }}</td>
                <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                  {{ new Date(prayer.created_at).toLocaleDateString() }}
                </td>
                <td
                  :class="prayer.is_approved ? 'text-green-500' : 'text-red-500'"
                  class="px-6 py-3 text-sm font-medium whitespace-nowrap"
                >
                  {{ prayer.is_approved ? 'Active' : 'Inactive' }}
                </td>
                <td class="px-6 py-3 text-sm text-gray-700 whitespace-nowrap">
                  <Dialog>
                    <DialogTrigger as-child>
                      <Button @click="selectedPrayer = prayer">
                        View
                      </Button>
                    </DialogTrigger>
                    <DialogContent class="sm:max-w-xl">
                      <DialogHeader>
                        <DialogTitle>{{ displayPrayer.prayer_title }}</DialogTitle>
                        <DialogDescription>
                          {{ displayPrayer.prayer_category }}
                        </DialogDescription>
                      </DialogHeader>

                      <div class="space-y-2 text-sm text-gray-700">
                        <p><strong>Details:</strong> {{ displayPrayer.prayer_details }}</p>
                        <p><strong>Name:</strong> {{ displayPrayer.name }}</p>
                        <p><strong>Email:</strong> {{ displayPrayer.email }}</p>
                        <p>
                          <strong>Status: </strong>
                          <span :class="displayPrayer.is_approved ? 'text-green-600' : 'text-red-600'">
                            {{ displayPrayer.is_approved ? 'Active' : 'Inactive' }}
                          </span>
                        </p>
                        <p><strong>Date:</strong> {{ new Date(displayPrayer.created_at).toLocaleDateString() }}</p>
                      </div>

                      <DialogFooter class="justify-end">
                        <DialogClose asChild>
                          <Button
                              :variant="displayPrayer.is_approved ? 'destructive' : 'default'"
                              @click="toggleStatus(displayPrayer.id)"
                            >
                              {{ !displayPrayer.is_approved ? 'Activate' : 'Deactivate' }}
                          </Button>
                        </DialogClose>
                      </DialogFooter>
                    </DialogContent>
                  </Dialog>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
