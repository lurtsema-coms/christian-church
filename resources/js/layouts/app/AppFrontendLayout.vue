<script setup lang="ts">
    import {
        NavigationMenu,
        NavigationMenuContent,
        NavigationMenuItem,
        NavigationMenuLink,
        NavigationMenuList,
        NavigationMenuTrigger,
        navigationMenuTriggerStyle,
    } from '@/components/ui/navigation-menu'

    import Countdown from '@/components/Coutdown.vue';
    import { Link } from '@inertiajs/vue3';

    const components: { title: string, href: string, description: string }[] = 
        [
            {
                title: 'What to Expect',
                href: '/docs/components/alert-dialog',
                description: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, quam!',
            },
            {
                title: 'Our Beliefs',
                href: '/docs/components/hover-card',
                description: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, quam!',
            },
        ]
</script>

<template>
    <!-- Navbar -->
    <div class="fixed z-50 w-full bg-white border-b shadow-sm border-neutral-200">
        <nav class="w-full px-10 mx-auto max-w-8xl">
            <div class="relative flex justify-between py-4">
                <img :src="'/img/church_logo.png'" class="max-w-12" alt="church_logo.png">
                <div class="absolute z-10 -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                    <NavigationMenu>
                        <NavigationMenuList>
                            <Link href="/" :class="[navigationMenuTriggerStyle(), $page.url === '/' ? 'text-sky-700' : '' ]">
                                Home
                            </Link>
                            <Link href="/about-us" :class="[navigationMenuTriggerStyle(), $page.url === '/about-us' ? 'text-sky-700' : '' ]">
                                About Us
                            </Link>
                            <Link href="/prayer" :class="[navigationMenuTriggerStyle(), $page.url === '/prayer' ? 'text-sky-700' : '' ]">
                                Prayer
                            </Link>
                            <Link href="/online-giving" :class="[navigationMenuTriggerStyle(), $page.url === '/online-giving' ? 'text-sky-700' : '' ]">
                                Online Giving
                            </Link>
                            <Link href="/sermons" :class="[navigationMenuTriggerStyle(), $page.url === '/sermons' ? 'text-sky-700' : '' ]">
                                Sermons
                            </Link>
                            <a href="https://www.unstoppablekidsbooks.com/blog" :class="navigationMenuTriggerStyle()">
                                Blog
                            </a>
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>
                <!-- <div class="relative flex items-center gap-2">
                    <div class="flex items-center justify-center rounded-full bg-white shadow-[#F7EDE2] border-red-400 border shadow-sm w-11 h-11">
                        <img src="/icons/heart.png" alt="" class="w-8">
                    </div>
                    <div class="flex items-center justify-center rounded-full bg-white shadow-[#F7EDE2] border-sky-400 border shadow-sm w-11 h-11">
                        <img src="/icons/loud-speaker.png" alt="" class="w-8">
                    </div>
                </div> -->
            </div>
        </nav>
    </div>
    
    <slot></slot>

    <!-- Footer -->
    <footer>
        <div class="flex flex-col">
            <div class="bg-[#12876F] w-full px-5">
                <div class="flex flex-wrap w-full max-w-4xl gap-8 py-12 mx-auto md:gap-28">
                    <img :src="'/img/church_logo_white.png'" class="max-w-24" alt="church_logo.png">
                    <div class="flex flex-col justify-center gap-2">
                        <Heading title="Connect With Us"/>
                        <p class="text-white">
                            Address: <span class="font-bold">75-5719 Ali‘i Dr #1d Kailua-Kona, Hawaii 96740</span>
                        </p>
                        <p class="text-white">
                            Phone: <span class="font-bold underline">(808)772-3996</span>
                        </p>
                        <p class="text-white">
                            Email: <span class="font-bold underline">RevKev@BigIslandChristianChurch.com</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-[#16181d] w-full px-5">
                <div class="grid w-full max-w-5xl grid-cols-2 gap-8 py-12 mx-auto md:grid-cols-3 lg:grid-cols-4">
                    <div>
                        <HeadingDescription description="ABOUT US" class="mb-2"/>
                        <a href="" class="block text-neutral-300">What to Expect</a>
                        <a href="" class="block text-neutral-300">Our Beliefs</a>
                        <a href="/login" class="block text-neutral-300 underline mt-0 sm:mt-16">Login Account</a>
                    </div>
                    <div>
                        <HeadingDescription description="Get Involved" class="mb-2"/>
                        <a href="" class="block text-neutral-300">Online Giving</a>
                        <a href="" class="block text-neutral-300">Submit Prayers</a>
                    </div>
                    <div>
                        <HeadingDescription description="AFFILIATIONS" class="mb-2"/>
                        <a href="" class="block text-neutral-300">The Bereans</a>
                        <a href="" class="block text-neutral-300">Answers in Genesis</a>
                        <a href="" class="block text-neutral-300">9Marks</a>
                        <a href="" class="block text-neutral-300">The Bible Project</a>
                        <a href="" class="block text-neutral-300">My Utmost for His Highest</a>
                        <a href="" class="block text-neutral-300">The DSNTR</a>
                    </div>
                    <div>
                        <HeadingDescription description="ABOUT US" class="mb-2"/>
                        <a href="" class="block text-neutral-300">Regular Schedule</a>
                        <a href="" class="block text-neutral-300">The Bible Project</a>
                        <HeadingDescription description="SUNDAY SERVICE" class="mt-4 mb-2"/>
                        <a href="" class="block text-neutral-300">10:00 AM to 11:30 AM</a>
                    </div>
                </div>
                <HeadingDescription description="© 2025 Big Island Christian Church. All rights reserved." class="mt-4 mb-16 !text-base text-center"/>
            </div>
        </div>
    </footer>
</template>