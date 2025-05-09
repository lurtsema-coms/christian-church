<script setup lang="ts">
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import Input from '@/components/ui/input/Input.vue';
    import Textarea from '@/components/ui/textarea/Textarea.vue';

    defineOptions({ layout: AppLayout});
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
                <div class="w-full max-w-3xl p-5 mx-auto mt-10 bg-white border shadow-sm rounded-xl md:p-10 border-neutral-300">
                    <Heading title="A traffic ticket in Kona" class="!text-[#00457A] text-center !font-semibold !text-2xl"/>
                    <img src="/img/bible.webp" alt="" class="mx-auto mt-8 rounded-md max-w-80">
                    <p class="mt-10 text-neutral-600">
                        We got a traffic ticket from a police officer in Kona on Feb 5 while we tried to get to a car check-up. Due to a misunderstanding of culture and law, we need to figure out what to do with the ticket if we are in Taiwan. Please pray for us that God works all things together for our goodness to learn something and take care of any consequences or responsibility God has for us ❤️🙏
                    </p>
                    <p class="mt-10 font-bold text-center text-sky-600">
                        Tom and Abby from Taiwan
                    </p>
                    <p class="mt-2 text-center text-neutral-600">
                        02-10-2025
                    </p>
                </div>
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
                <div class="grid max-w-2xl gap-4 mx-auto mt-8 mb-10 sm:grid-cols-2">
                    <Input type="text" placeholder="Name" class="sm:h-12 placeholder:text-lg" />
                    <Input type="email" placeholder="Email Address" class="sm:h-12 placeholder:text-lg" />
                    <Input type="text" placeholder="Prayer Title" class="sm:h-12 placeholder:text-lg" />
                    <Input type="text" placeholder="Prayer Category" class="sm:h-12 placeholder:text-lg" />
                    <Textarea placeholder="Prayer Details" class="sm:col-span-2 text-md sm:text-sm h-36 placeholder:text-lg" />
                    <div class="flex justify-end sm:col-span-2">
                        <Button class="bg-[#336699] text-white font-bold px-8 py-5 md:text-lg">Submit</Button>
                    </div>
                </div>
            </div>
        </div>


        <br>
    </div>

</template>