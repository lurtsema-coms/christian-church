<script setup lang="ts">
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import Input from '@/components/ui/input/Input.vue';
    import Textarea from '@/components/ui/textarea/Textarea.vue';
    import { useForm, usePage } from '@inertiajs/vue3';
    import { computed, ref } from 'vue';
    import Autoplay from 'embla-carousel-autoplay'
    import { Card, CardContent } from '@/components/ui/card'
    import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/components/ui/carousel'

    interface Flash {
        success: string | null;
        error: string | null;
    }

    defineOptions({ layout: AppLayout });
    const props = defineProps<{
        prayers: {
            id: number;
            name: string;
            email: string;
            prayer_title: string;
            prayer_category: string;    
            prayer_details: string;
            created_at: string;
            is_approved: boolean;
        }[];
    }>();

    console.log(props);

    const plugin = Autoplay({
        delay: 5000,
        stopOnMouseEnter: true,
        stopOnInteraction: false,
    });

    const form = useForm({
        name: '',
        email: '',
        prayer_title: '',
        prayer_category: '',
        prayer_details: '',
    });

    const flash = computed<Flash>(() => usePage().props.flash as Flash);
    const successMessage = ref<string | null>('');

    const submit = () => {
        form.post('/admin_prayer', {
            preserveScroll: true,
            onSuccess: () => {
                successMessage.value = flash.value.success;
                setTimeout(() => {
                    successMessage.value = null;
                }, 4000);
                form.reset();
            },
        });
    };
</script>

<template>
    <div class="relative pt-28">
        <!-- BG -->
        <img src="/img/cardboard-texture.webp" alt="cardboard-texture-bg" class="absolute inset-0 z-0 object-cover w-full h-full mix-blend-multiply" />
        <div class="absolute inset-0 z-0 bg-gray-100/75"></div>

        <!-- Content wrapper: make sure it's above the image -->
        <div class="relative z-10 flex flex-col px-5 mt-12">
            <div class="z-10">
                <Heading title="Prayer" class="!text-[#00457A] text-center"/>
                <div v-if="!prayers || prayers.length === 0" class="mt-8 text-lg text-center text-gray-500">
                    No prayers to display yet.
                </div>
                <Carousel
                    v-else
                    class="relative w-full max-w-3xl mx-auto mt-8"
                    :plugins="[plugin]"
                    @mouseenter="plugin.stop"
                    @mouseleave="[plugin.reset(), plugin.play()]"
                >
                    <CarouselContent>
                        <CarouselItem
                            v-for="(prayer, index) in prayers"
                            :key="`${prayer.prayer_title}-${index}`"
                        >
                            <div class="h-full p-1">
                                <Card class="h-full">
                                    <CardContent class="flex flex-col items-center p-5 md:p-10 ">
                                        <Heading
                                            :title="prayer.prayer_title"
                                            class="!text-[#00457A] text-center !font-semibold !text-2xl"
                                        />
                                        <img
                                            src="/img/bible.webp"
                                            alt=""
                                            class="mx-auto mt-8 rounded-md sm:max-w-80"
                                        />
                                        <p class="mt-10 text-center text-neutral-600">
                                            {{ prayer.prayer_details }}
                                        </p>
                                        <div class="mt-10 text-center">
                                            <p class="font-bold text-sky-600">
                                                {{ prayer.name }}
                                            </p>
                                            <p class="mt-2 text-neutral-600">
                                                {{ new Date(prayer.created_at).toISOString().split('T')[0] }}
                                            </p>
                                        </div>
                                    </CardContent>
                                </Card>
                            </div>
                        </CarouselItem>
                    </CarouselContent>
                    <CarouselPrevious />
                    <CarouselNext />
                </Carousel>

            </div>

            <!-- Line -->
            <div class="z-10 w-full max-w-7xl h-0.5 border border-neutral-200 mx-auto my-16 -left-16 relative">
            </div>

            <div class="relative">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="absolute z-0 -top-72 size-[35rem]">
                    <path fill="#ECEDEE" d="M54.9,-52.1C67.9,-41.8,73.2,-20.9,74,0.7C74.7,22.4,70.9,44.7,57.8,54.6C44.7,64.4,22.4,61.7,6.7,55C-9,48.3,-17.9,37.6,-26.2,27.8C-34.5,17.9,-42.2,9,-44,-1.8C-45.7,-12.5,-41.5,-24.9,-33.2,-35.3C-24.9,-45.6,-12.5,-53.9,4.2,-58.1C20.9,-62.3,41.8,-62.5,54.9,-52.1Z" transform="translate(100 100)" />
                </svg>
            </div>

            <div class="z-10">
                <Heading title="Submit a Prayer Request" class="!text-[#00457A] text-center !font-semibold !text-2xl"/>
                <form @submit.prevent="submit">
                    <div class="grid max-w-2xl gap-4 mx-auto mt-8 mb-10 sm:grid-cols-2">
                        <div>
                            <Input v-model="form.name" type="text" placeholder="Name" class="sm:h-12 placeholder:text-lg" />
                            <div v-if="form.errors.name" class="relative mt-1 text-red-500">{{ form.errors.name }}</div>
                        </div>
                        <div>
                            <Input v-model="form.email" type="email" placeholder="Email Address" class="sm:h-12 placeholder:text-lg" />
                            <div v-if="form.errors.email" class="relative mt-1 text-red-500">{{ form.errors.email }}</div>
                        </div>
                        <div>
                            <Input v-model="form.prayer_title" type="text" placeholder="Prayer Title" class="sm:h-12 placeholder:text-lg" />
                            <div v-if="form.errors.prayer_title" class="relative mt-1 text-red-500">{{ form.errors.prayer_title }}</div>
                        </div>
                        <div>
                            <Input v-model="form.prayer_category" type="text" placeholder="Prayer Category" class="sm:h-12 placeholder:text-lg" />
                            <div v-if="form.errors.prayer_category" class="relative mt-1 text-red-500">{{ form.errors.prayer_category }}</div>
                        </div>
                        <div class="sm:col-span-2">
                            <Textarea v-model="form.prayer_details" placeholder="Prayer Details" class="text-md sm:text-sm h-36 placeholder:text-lg" />
                            <div v-if="form.errors.prayer_details" class="relative mt-1 text-red-500">{{ form.errors.prayer_details }}</div>
                        </div>
                        <div class="flex flex-col justify-end sm:col-span-2">
                            <div class="flex justify-end">
                                <Button :disabled="form.processing" class="bg-[#336699] text-white font-bold px-8 py-5 md:text-lg">Submit</Button>
                            </div>
                            <div v-if="successMessage" class="mt-2 font-semibold text-right text-green-600">
                                {{ successMessage }}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
</template>