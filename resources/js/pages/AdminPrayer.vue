<script setup lang="ts">
  import { ref, watch, computed } from 'vue';
  import AppLayout from '@/layouts/AppLayout.vue';
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
  import { useForm, Head, router } from '@inertiajs/vue3';
  import HeaderSub from '@/components/HeaderSub.vue';
  import BackendTable from '@/components/BackendTable.vue';
  import { PlusCircle } from 'lucide-vue-next';
  import Input from '@/components/ui/input/Input.vue'
  import { usePage } from '@inertiajs/vue3';
  
  const breadcrumbs: BreadcrumbItem[] = [
    {
      title: 'Prayer',
      href: '/admin_prayer',
    },
  ];
  
  const props = defineProps<{
      prayers: {
          data: {
            id: number;
            prayer_title: string;
            prayer_category: string;
            prayer_details: string;
            name: string;
            email: string;
            created_at: string;
            is_approved: boolean;
          }[],
          current_page: number,
          last_page: number,
          total: number,
          per_page: number
      }
    }>();

    const search = ref('');
    
    let timeout: ReturnType<typeof setTimeout>
    watch(search, (val) => {
        clearTimeout(timeout)
        timeout = setTimeout(() => {
            router.get('/admin_prayer', { search: val }, {
            preserveScroll: true,
            preserveState: true,
            })
        }, 300)
    })
  
  const tableHeaders = {
    id: 'ID',
    prayer_title: 'Title',
    prayer_category: 'Category',
    prayer_details: 'Details',
    name: 'Name',
    created_at: 'Date',
    is_approved: 'Status',
    actions: 'Actions',
  }
  
  // ✅ Transform table data
  const tableRows = computed(() => {
      return props.prayers.data.map((prayer) => ({
          ...prayer,
          is_approved: prayer.is_approved ? 'Active' : 'Inactive',
          created_at: new Date(prayer.created_at).toLocaleDateString('en-US', {
            weekday: 'short',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
          }),
      }))
  })

  type FlashProps = {
    success?: string,
    error?: string,
  }
  const page = usePage<{ flash: FlashProps }>();
  const showSuccess = ref(false);
  watch(
      () => page.props.flash?.success,
      (newVal) => {
          if (newVal) {
              showSuccess.value = true;
              setTimeout(() => {
                  showSuccess.value = false;
              }, 3000)
          }
      },
      { immediate: true }
  );
</script>

<template>
  <Head title="Admin Prayer" />

  <AppLayout :breadcrumbs="breadcrumbs">
  <div class="relative flex flex-col flex-1 h-full gap-4 p-4 bg-gray-50 rounded-xl">
    <div class="px-8">
          <HeaderSub title="Prayer" subtitle="Manage incoming prayers" />

          <br />

          <div class="flex flex-col-reverse flex-wrap justify-between gap-4 mb-4 md:flex-row">
              <Input
                  v-model="search"
                  placeholder="Search here..."
                  class="max-w-sm"
              />
          </div>

          <BackendTable 
              :tableData="{ ...props.prayers, data: tableRows }"
              :tableHeaders="tableHeaders"
              tableLink="admin_prayer"
              :tableEditLink="(id: number) => route('admin_prayer.edit', id)"
          />

          <div
              v-if="showSuccess"
              class="mt-8 text-sm font-medium text-right text-green-600"
          >
              {{ page.props.flash.success }}
          </div>
      </div>
  </div>
  </AppLayout>
</template>
