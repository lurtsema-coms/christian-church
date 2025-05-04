<script setup lang="ts">
    const props = defineProps<{
        description: string,
        class?: string | string[];
    }>()
</script>

<template>
    <h5 :class="[props.class, 'text-lg', 'md:text-2xl', 'text-white']">
        {{ props.description }}
    </h5>
</template>