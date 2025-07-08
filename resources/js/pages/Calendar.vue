<script setup lang="ts">
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import { Head  } from '@inertiajs/vue3';
    import { ref, computed } from 'vue'
    import dayjs from 'dayjs'

    const currentDate = ref(dayjs())

    const weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']

    const currentMonthYear = computed(() =>
    currentDate.value.format('MMMM YYYY')
    )

    const daysInMonth = computed(() => {
    return Array.from({ length: currentDate.value.daysInMonth() }, (_, i) => i + 1)
    })

    const firstDayOfMonth = computed(() => {
    return currentDate.value.startOf('month').day()
    })

    const blanks = computed(() => {
    return Array.from({ length: firstDayOfMonth.value })
    })

    function goToPrevMonth() {
    currentDate.value = currentDate.value.subtract(1, 'month')
    }

    function goToNextMonth() {
    currentDate.value = currentDate.value.add(1, 'month')
    }

    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Calendar" />

    <div class="relative pb-16 pt-28">
        <!-- BG -->
        <img src="/img/cardboard-texture.webp" alt="cardboard-texture-bg" class="absolute inset-0 z-0 object-cover w-full h-full mix-blend-multiply" />
        <div class="absolute inset-0 z-0 bg-gray-100/75"></div>

        <div class="relative z-10 flex flex-col px-5 mt-12">
            <div class="z-10">
                <div class="bg-white p-6 rounded shadow">
                    <div class="flex justify-between items-center mb-4">
                    <button @click="goToPrevMonth" class="text-blue-600 hover:underline">← Prev</button>
                    <h2 class="text-xl font-bold">{{ currentMonthYear }}</h2>
                    <button @click="goToNextMonth" class="text-blue-600 hover:underline">Next →</button>
                    </div>

                    <div class="grid grid-cols-7 text-center font-semibold text-gray-700 border-b pb-2">
                    <div v-for="(day, index) in weekDays" :key="index">{{ day }}</div>
                    </div>

                    <div class="grid grid-cols-7 gap-2 mt-2">
                    <div v-for="(blank, i) in blanks" :key="'blank-' + i"></div>
                    <div
                        v-for="(day, i) in daysInMonth"
                        :key="i"
                        class="border p-2 text-center rounded hover:bg-blue-100 cursor-pointer"
                    >
                        {{ day }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>