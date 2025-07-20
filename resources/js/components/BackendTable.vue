<script lang="ts" setup>
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'

import {
  Pagination,
  PaginationContent,
  PaginationEllipsis,
  PaginationItem,
  PaginationNext,
  PaginationPrevious,
} from '@/components/ui/pagination'
import { PencilIcon } from 'lucide-vue-next';
import { router, usePage, Link } from '@inertiajs/vue3'

const props = defineProps<{
  tableData: {
    data: Record<string, any>[]
    current_page: number
    last_page: number
    total: number
    per_page: number
  }
  tableHeaders: Record<string, string>
  tableLink: string
  tableEditLink: (id: number) => string
}>()

function goToPage(page: number) {
  const currentParams = new URLSearchParams(usePage().url.split('?')[1])
  const search = currentParams.get('search') || ''

  router.get(`/${props.tableLink}`, { page, search }, {
    preserveScroll: true,
    preserveState: true,
  })
}
</script>

<template>
  <div class="space-y-4 overflow-hidden rounded-md">
    <!-- Table -->
    <Table>
      <TableHeader>
        <TableRow>
          <TableHead v-for="(label, key) in props.tableHeaders" :key="key">
            {{ label }}
          </TableHead>
        </TableRow>
      </TableHeader>

      <TableBody class="bg-white">
        <TableRow v-for="row in props.tableData.data" :key="row.id">
          <TableCell
            v-for="(label, key) in props.tableHeaders"
            :key="key"
            class="truncate max-w-60"
          >
            <template v-if="key === 'actions'">
              <div class="flex items-center">
                <Link :href="props.tableEditLink(row.id)">
                  <button class="text-sm cursor-pointer text-sky-600 hover:underline">
                    <PencilIcon class="size-5 hover:text-sky-800" />
                  </button>
                </Link>
              </div>
            </template>

            <template v-else-if="key === 'status' || key === 'is_approved'">
              <span
                :class="{
                  'text-green-600 font-semibold': row[key] === 'Active' || row[key] === 'Accepted' || row[key] === true,
                  'text-orange-500 font-semibold': row[key] === 'Pending',
                  'text-red-600 font-semibold': row[key] === 'Rejected' || row[key] === 'Inactive' || row[key] === false,
                }"
              >
                {{ row[key] }}
              </span>
            </template>

            <template v-else>
              {{ row[key] ?? '-' }}
            </template>
          </TableCell>
        </TableRow>
      </TableBody>
    </Table>

    <!-- No data -->
    <div v-if="props.tableData.data.length === 0" class="text-center">
      <img src="/img/no-result-found.webp" alt="no-result-found" class="mx-auto max-w-64" />
    </div>

    <!-- Pagination -->
    <div v-if="props.tableData.last_page > 1" class="mt-4">
      <Pagination
        v-slot="{ page }"
        :items-per-page="props.tableData.per_page"
        :total="props.tableData.total"
        :default-page="props.tableData.current_page"
      >
        <PaginationContent v-slot="{ items }">
          <!-- First -->
          <PaginationPrevious
            v-if="page > 1"
            @click="goToPage(1)"
            class="hidden sm:block"
          >
            « First
          </PaginationPrevious>

          <!-- Previous -->
          <PaginationPrevious
            v-if="page > 1"
            @click="goToPage(page - 1)"
          />

          <!-- Page numbers -->
          <template v-for="(item, index) in items" :key="index">
            <PaginationItem
              v-if="item.type === 'page'"
              :value="item.value"
              :is-active="item.value === page"
              @click="goToPage(item.value)"
            >
              {{ item.value }}
            </PaginationItem>
          </template>

          <!-- Ellipsis -->
          <PaginationEllipsis
            v-if="props.tableData.last_page > 5"
            :index="4"
          />

          <!-- Next -->
          <PaginationNext
            v-if="page < props.tableData.last_page"
            @click="goToPage(page + 1)"
          />

          <!-- Last -->
          <PaginationNext
            v-if="page < props.tableData.last_page"
            @click="goToPage(props.tableData.last_page)"
            class="hidden sm:block"
          >
            Last »
          </PaginationNext>
        </PaginationContent>
      </Pagination>
    </div>
  </div>
</template>
