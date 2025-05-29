<script setup lang="ts">
    import { Head, Link } from '@inertiajs/vue3';
    import AppLayout from '@/layouts/app/AppFrontendLayout.vue';
    import { Clock3, MapPin, CirclePlay } from 'lucide-vue-next';
    import { ref } from 'vue'

    const watchListen = ref({
        image1: 'w-2/3',
        image2: 'w-1/3',
        image3: 'w-1/3',
    })

    function handleHover(imageKey: 'image1' | 'image2' | 'image3') {
        watchListen.value.image1 = imageKey === 'image1' ? 'w-2/3' : 'w-1/3'
        watchListen.value.image2 = imageKey === 'image2' ? 'w-2/3' : 'w-1/3'
        watchListen.value.image3 = imageKey === 'image3' ? 'w-2/3' : 'w-1/3'
    }

    function resetHover() {
        watchListen.value = {
            image1: 'w-2/3',
            image2: 'w-1/3',
            image3: 'w-1/3',
        }
    }

    defineOptions({ layout: AppLayout});
</script>

<template>
    <Head title="Home" />

    <div class="relative flex items-center justify-center py-40 mb-12 overflow-hidden">
         <img src="/img/tropical-beach.webp" alt="tropical-beach-bg" class="absolute inset-0 z-0 object-cover w-full h-full mix-blend-multiply" />
        
        <div class="relative z-30 max-w-5xl p-10 text-white rounded-xl">
            <div class="relative flex items-center justify-center mx-auto bg-white rounded-full w-52 h-52">
                <img src="/img/church_logo.png" alt="church-logo" class="w-[7rem]" />
            </div>
            <h1 class="my-8 text-2xl font-bold text-center md:text-3xl lg:text-5xl" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
               Aloha and Welcome!
            </h1>
            <p class="max-w-2xl text-lg font-bold text-center text-white lg:text-2xl">
                Gathering, Growing, Giving, and Going in the power and unity of the Gospel — our G7 mission at Big Island Christian Church.            </p>
            <div class="flex justify-center gap-6 mt-8">
                <Button class="bg-[#e8efe3] text-[#0e3800] font-bold px-8 py-6 md:text-lg hover:text-white">PLAN A VISIT</Button>
                <a href="/sermons"><Button class="bg-[#0a5954] text-white font-bold px-8 py-6 md:text-lg">LISTEN TO A SERMON</Button></a>
            </div>
        </div>

        <svg class="absolute bottom-0 z-10" width="100%" height="93px" viewBox="0 0 1280 140" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <g fill="#fff">
                <path d="M853.893,86.998c-38.859,0-58.811-16.455-77.956-35.051c18.295-10.536,40.891-18.276,73.378-18.276 c38.685,0,64.132,12.564,85.489,28.347C916.192,72.012,900.8,86.998,853.893,86.998z M526.265,80.945 c-6.517-0.562-13.599-0.879-21.41-0.879c-70.799,0-91.337,27.229-134.433,35.662c14.901,3.72,32.118,6.07,52.898,6.07 C470.171,121.797,500.34,103.421,526.265,80.945z" fill-opacity=".3"/>
                <path d="M663.458,109.671c-67.137,0-80.345-23.824-137.193-28.726C567.086,45.555,597.381,0,665.691,0 c61.857,0,85.369,27.782,110.246,51.947C736.888,74.434,717.459,109.671,663.458,109.671z M217.68,94.163 c55.971,0,62.526,24.026,126.337,24.026c9.858,0,18.508-0.916,26.404-2.461c-57.186-14.278-80.177-48.808-138.659-48.808 c-77.063,0-99.96,48.569-151.751,48.569c-40.006,0-60.008-12.206-80.011-29.506v16.806c20.003,10.891,40.005,21.782,80.011,21.782 C160.014,124.57,158.608,94.163,217.68,94.163z M1200.112,46.292c-57.493,0-56.935,46.595-115.015,46.595 c-53.612,0-59.755-39.618-115.602-39.618c-15.267,0-25.381,3.751-34.69,8.749c36.096,26.675,60.503,62.552,117.342,62.552 c69.249,0,75.951-43.559,147.964-43.559c39.804,0,59.986,10.943,79.888,21.777V85.982 C1260.097,68.771,1239.916,46.292,1200.112,46.292z" fill-opacity=".5"/>
                <path d="M1052.147,124.57c-56.84,0-81.247-35.876-117.342-62.552c-18.613,9.994-34.005,24.98-80.912,24.98 c-38.859,0-58.811-16.455-77.956-35.051c-39.05,22.487-58.479,57.724-112.48,57.724c-67.137,0-80.345-23.824-137.193-28.726 c-25.925,22.475-56.093,40.852-102.946,40.852c-20.779,0-37.996-2.349-52.898-6.07c-7.895,1.545-16.546,2.461-26.404,2.461 c-63.811,0-70.366-24.026-126.337-24.026c-59.072,0-57.665,30.407-137.669,30.407c-40.006,0-60.008-10.891-80.011-21.782V140h1280 v-37.212c-19.903-10.835-40.084-21.777-79.888-21.777C1128.098,81.011,1121.397,124.57,1052.147,124.57z"/>
            </g>
        </svg>
    </div>

    <!-- Watch & Listen -->
    <div class="py-16">
        <Heading title="TUNE IN TO A SERMON" class="text-center !text-[#0A5954]"/>
        <HeadingDescription description="Catch up on inspiring and faith-filled messages from our Sunday services." class="text-center !text-neutral-700 mt-4 px-5"/>
        <div
            class="flex max-w-5xl mx-auto mt-16 overflow-hidden border cursor-pointer sm:rounded-md h-96"
            @mouseleave="resetHover"
        >
        <div
            :class="['relative h-full transition-all duration-500', watchListen.image1]"
            @mouseenter="handleHover('image1')"
        >
            <CirclePlay class="absolute z-10 text-white transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2 size-14"/>
            <img
                src="/img/ressurection_day.webp"
                alt="Church Image"
                class="object-cover w-full h-full brightness-75"
            >
        </div>
        <div
            :class="['relative h-full transition-all duration-500', watchListen.image2]"
            @mouseenter="handleHover('image2')"
        >
            <CirclePlay class="absolute z-10 text-white transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2 size-14"/>
            <img
                src="/img/ritual_or_reality.webp"
                alt="Church Image"
                class="object-cover w-full h-full brightness-75"
            >
        </div>
        <div
            :class="['relative h-full transition-all duration-500', watchListen.image3]"
            @mouseenter="handleHover('image3')"
        >
            <CirclePlay class="absolute z-10 text-white transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2 size-14"/>
            <img
                src="/img/for_the_joy.webp"
                alt="Church Image"
                class="object-cover w-full h-full brightness-75"
            >
        </div>
    </div>
        <br>
        <a href="/sermons"><Button class="bg-[#00245E] font-bold px-8 py-6 md:text-lg flex mx-auto">LISTEN TO A SERMON</Button></a>
    </div>

    <div class="relative px-5 py-16 overflow-hidden">
        <!-- background image -->
        <img src="/img/cardboard-texture.webp" alt="" class="absolute top-0 left-0 z-0 object-cover w-full h-full brightness-105" />

        <!-- content wrapper -->
        <div class="relative z-10 flex flex-col max-w-5xl gap-8 mx-auto lg:flex-row">
            <img src="/img/pastor.webp" alt="pastor-church" class="object-cover max-w-sm mx-auto rounded-md h-96 lg:rounded-none lg:rounded-l-xl" />
            <div class="flex flex-col justify-center p-5 bg-white md:p-10 rounded-r-xl">
                <HeadingDescription description="Meet Our Pastor" class="!text-[#00457A]" />
                <Heading title="Kevin M. Kelley" class="!text-neutral-800" />
                <HeadingDescription
                    description="Pastor Kevin leads with passion, humility, and a heart for discipleship, delivering Scripture-based teachings that reflect his deep love for Jesus."
                    class="!text-neutral-700 mt-8"
                />
                <div>
                    <Button class="bg-[#00576b] font-bold px-8 py-6 md:text-lg mt-8">LEARN MORE</Button>
                </div>
            </div>
        </div>
    </div>

    <!-- Support The Mission -->
    <div class="py-16 bg-[#00457A] px-5">
        <Heading title="Support The Mission" class="text-center"/>
        <div class="max-w-2xl mx-auto">
            <HeadingDescription description="Your generosity helps us serve our community and share the love of Jesus on the Big Island and beyond." class="mt-4 text-center md:mt-8"/>
        </div>
        <p class="mt-8 font-semibold text-center text-white">Thank you for partnering with us in ministry.</p>

        <div class="flex justify-center gap-6 mt-8">
            <Button class="bg-[#D67C6B] font-bold px-8 py-6 md:text-lg">GIVE ONLINE</Button>
            <Button class="bg-[#12876F] font-bold px-8 py-6 md:text-lg">LEARN MORE</Button>
        </div>
    </div>

    <!-- Prayer Request -->
    <div class="px-5 py-16 md:py-24">
        <div class="grid md:grid-cols-3 max-w-5xl mx-auto overflow-hidden border-t-8 shadow-xl md:flex-row rounded-2xl border-[#00457A]">
            <div class="flex flex-col justify-center p-10 md:col-span-2">
                <p class="text-xl">Prayer Request</p>
                <Heading title="We Believe in the Power of Prayer" class="!text-[#0A5954] mt-2 max-w-sm"/>
                <HeadingDescription description="Whatever you’re going through, we’re here to pray with you and for you." class="mt-4 md:mt-8 !text-neutral-700"/>
                <div>
                    <Button class="bg-[#00576B] font-bold px-8 py-6 mt-8 md:text-lg">SUBMIT A REQUEST</Button>
                </div>
            </div>
            <div>
                <img 
                    :src="'/img/bible-hands.webp'" 
                    alt="Church Image" 
                    class="object-cover w-full md:max-w-md h-60 md:h-full"
                >
            </div>
        </div>
    </div>


    <!-- Upcoming Events -->
    <svg class="relative top-[1px]" width="100%" height="119px" viewBox="0 0 1280 140" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <g fill="#005C63">
            <path d="M1280 3.4C1050.59 18 1019.4 84.89 734.42 84.89c-320 0-320-84.3-640-84.3C59.4.59 28.2 1.6 0 3.4V140h1280z" fill-opacity=".3"/>
            <path d="M0 24.31c43.46-5.69 94.56-9.25 158.42-9.25 320 0 320 89.24 640 89.24 256.13 0 307.28-57.16 481.58-80V140H0z" fill-opacity=".5"/>
            <path d="M1280 51.76c-201 12.49-242.43 53.4-513.58 53.4-320 0-320-57-640-57-48.85.01-90.21 1.35-126.42 3.6V140h1280z"/>
        </g>
    </svg>
    <div class="flex bg-[#005C63]">
        <div class="w-full px-5 pb-8 mx-auto max-w-7xl">
            <div>
                <Heading title="Support The Mission" />
                <div class="grid gap-8 mt-16 sm:grid-cols-2 lg:grid-cols-3">
                <CardEvent 
                        imgSrc="/img/sunday-service.webp"
                        header="Sunday Service" 
                        headerDescription="Regular Schedule"
                        time="10:00 AM to 11:30 AM"
                        description="A sacred time to gather as a community, reflect on God’s Word, lift our hearts in praise, and grow deeper in faith together."
                />
                <CardEvent 
                        imgSrc="/img/fellowship-meal.webp"
                        header="FELLOWSHIP MEAL" 
                        headerDescription="Every 2nd Sunday of the Month"
                        time="10:00 AM to 11:30 AM"
                        description="Join us for our monthly Fellowship Meal on the 2nd Sunday of each month at 11:30am following the church worship service."
                />
                <CardEvent 
                        imgSrc="/img/kelly-small-group.webp"
                        header="Kelley Small Group" 
                        headerDescription="Every Wednesday"
                        time="6:30 PM to 7:30 PM"
                        description="Come together with us in Bible study, fellowship, and prayer — a space where hearts connect, faith deepens, and lives are lifted."
                />
                </div>
            </div>
            <Button class="flex mx-auto bg-[#129EAA] font-bold px-8 py-6 mt-8 md:text-lg">SEE FULL CALENDAR</Button>
        </div>
    </div>
 
    <svg class="relative rotate-180 -top-[1px]" width="100%" height="119px" viewBox="0 0 1280 140" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <g fill="#005C63">
            <path d="M1280 3.4C1050.59 18 1019.4 84.89 734.42 84.89c-320 0-320-84.3-640-84.3C59.4.59 28.2 1.6 0 3.4V140h1280z" fill-opacity=".3"/>
            <path d="M0 24.31c43.46-5.69 94.56-9.25 158.42-9.25 320 0 320 89.24 640 89.24 256.13 0 307.28-57.16 481.58-80V140H0z" fill-opacity=".5"/>
            <path d="M1280 51.76c-201 12.49-242.43 53.4-513.58 53.4-320 0-320-57-640-57-48.85.01-90.21 1.35-126.42 3.6V140h1280z"/>
        </g>
    </svg>

    <!-- Maps -->
    <div class="flex py-16">
        <div class="w-full px-5 pb-8 mx-auto max-w-7xl">
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="flex flex-col justify-center">
                    <Heading title="Aloha in Faith, United by Love" class="md:max-w-80 !text-[#005C63]"/>
                    <HeadingDescription description="Here, you’ll find a place to belong, hearts that care, and lives growing together in Christ. Through worship, fellowship, and service, we journey together — lifting each other up and living out God’s love every day." class="mt-4 md:mt-8 !text-neutral-700"/>
                    <div class="flex items-center gap-4 mt-8 text-[#00457A]">
                        <Clock3 />
                        <span class="font-semibold md:text-xl">Sundays at 10:00 AM – 11:30 AM</span>
                    </div>
                    <div class="flex items-center gap-4 mt-4 text-[#00457A]">
                        <MapPin />
                        <span class="font-semibold md:text-xl">75-5719 Ali‘i Dr #1d, Kailua-Kona, HI 96740</span>
                    </div>
                </div>
                <div class="">
                    <div class="overflow-hidden rounded-md">
                        <div style="position: relative;">
                            <div style="position: relative; padding-bottom: 75%; height: 0; overflow: hidden;">
                                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" loading="lazy" allowfullscreen src="https://maps.google.com/maps?q=75-5719+Ali%E2%80%98i+Dr+%231d%2C+Kailua-Kona%2C+HI+96740&z=15&output=embed">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

