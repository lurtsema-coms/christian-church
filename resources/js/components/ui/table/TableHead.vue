<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cn } from '@/lib/utils'

const props = defineProps<{
  class?: HTMLAttributes['class']
}>()
</script>

<template>
  <th :class="cn('text-white h-12 px-4 text-left align-middle font-medium [&:has([role=checkbox])]:pr-0', props.class)">
    <slot />
  </th>
</template>
