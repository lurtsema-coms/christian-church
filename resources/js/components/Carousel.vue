<script setup lang="ts">
    import { Card, CardContent } from '@/components/ui/card'
    import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/components/ui/carousel'
    import Autoplay from 'embla-carousel-autoplay'

    const plugin = Autoplay({
    delay: 5000,
    stopOnMouseEnter: true,
    stopOnInteraction: false,
    });
</script>

<template>
  <Carousel
    class="relative w-full"
    :plugins="[plugin]"
  >
    <CarouselContent>
        <CarouselItem v-for="(_, index) in 5" :key="index">
            <div>
            <Card class="w-full">
                <CardContent class="flex items-center justify-center w-full h-[40rem]">
                    <!-- <img :src="'/img/church_1.webp'" alt="church_logo.png"> -->
                    <img
                        
                        :src="`/img/church_${index+1}.webp`"
                        :alt="`church_${index+1}.webp`"
                        class="object-cover w-full h-full rounded-xl brightness-50"
                    />
                </CardContent>
            </Card>
            </div>
        </CarouselItem>
    </CarouselContent>

    <!-- <CarouselPrevious /> -->
    <!-- <CarouselNext /> -->
  </Carousel>
</template>