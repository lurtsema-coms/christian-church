<script setup>
import { ref, onMounted } from 'vue';

const targetDate = ref(0);
const formattedDate = ref('');

const days = ref(0);
const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);

// Calculate the next Sunday at 10:00 AM Alaska Time (AKST/AKDT)
const calculateNextSunday = () => {
  const now = new Date();

  // Alaska Time offset (AKST/AKDT)
  const alaskaOffset = -8 * 60; // UTC -8 for AKDT

  // Adjust the current time to Alaska Time (AKDT)
  const alaskaTime = new Date(now.toLocaleString('en-US', { timeZone: 'America/Anchorage' }));

  // Get the next Sunday at 10:00 AM Alaska time
  const nextSunday = new Date(alaskaTime);
  
  // Set it to Sunday at 10 AM
  nextSunday.setHours(10, 0, 0, 0);

  // If today is Sunday but before 10:00 AM, we use this Sunday
  if (alaskaTime.getDay() === 0 && alaskaTime.getHours() < 10) {
    targetDate.value = nextSunday.getTime();
  } else {
    // Otherwise, set the date to the next Sunday
    nextSunday.setDate(alaskaTime.getDate() + (7 - alaskaTime.getDay())); // Move to the next Sunday
    targetDate.value = nextSunday.getTime();
  }

  // Format the target date for display in Alaska Time
  const options = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
    hour12: true,
  };

  formattedDate.value = new Intl.DateTimeFormat('en-US', { ...options, timeZone: 'America/Anchorage' }).format(nextSunday);
};

// Update the countdown every second
const updateCountdown = () => {
  const now = new Date();
  const timeLeft = targetDate.value - now.getTime();

  if (timeLeft <= 0) {
    // Reset countdown if time has passed
    days.value = hours.value = minutes.value = seconds.value = 0;
    return;
  }

  days.value = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
  hours.value = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  minutes.value = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
  seconds.value = Math.floor((timeLeft % (1000 * 60)) / 1000);
};

onMounted(() => {
  calculateNextSunday();
  setInterval(updateCountdown, 1000); // Update countdown every second
});
</script>

<template>
  <div class="py-4 bg-orange-100">
    <p class="text-xs font-bold text-center text-neutral-800">
      Sunday Worship Service!
    </p>
    <div class="text-lg font-bold text-center text-neutral-800">
      <p>{{ formattedDate }}</p>
      <span>{{ days }} Days </span>
      <span>{{ hours }} Hr </span>
      <span>{{ minutes }} Min </span>
      <span>{{ seconds }} Sec</span>
    </div>
  </div>
</template>
