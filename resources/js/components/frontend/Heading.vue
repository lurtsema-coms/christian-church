<script setup lang="ts">
    // Define props using the `defineProps` function
    const props = defineProps<{
        title: string,
        class?: string | string[];
    }>()
</script>

<template>
    <h3 :class="[props.class, 'text-2xl', 'md:text-4xl', 'font-bold', 'text-white']">{{ props.title }}</h3>
</template>
