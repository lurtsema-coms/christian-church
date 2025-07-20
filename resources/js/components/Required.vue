<script lang="ts" setup>

    const props = defineProps<{
        isRequired?: Boolean
    }>()
</script>

<template>
    <span v-if="props.isRequired" class="relative text-red-500 left-1">*</span>
    <span v-else class="relative text-xs text-neutral-500 left-1">(Optional)</span>
</template>