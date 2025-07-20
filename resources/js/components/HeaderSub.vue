<script lang="ts" setup>
    const props = defineProps<{
        title: string;
        subtitle?: string;
    }>();
</script>

<template>
    <div>
        <h1 class="text-2xl font-semibold">{{ props.title }}</h1>
        <p class="text-sm">{{ props.subtitle }}</p>
    </div>
</template>