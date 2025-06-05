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

// Reactive state for mobile menu
import { ref } from 'vue';
const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const closeMobileMenu = () => {
    isMobileMenuOpen.value = false;
};
</script>

<template>
    <!-- Navbar -->
    <div class="fixed z-50 w-full bg-white border-b shadow-sm border-neutral-200">
        <nav class="w-full px-10 mx-auto max-w-8xl">
            <div class="relative flex items-center justify-between py-4">
                <img :src="'/img/church_logo.png'" class="max-w-12" alt="church_logo.png">
                <div class="absolute z-10 hidden -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2 lg:block">
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
                            <a href="https://www.unstoppablekidsbooks.com/blog" target="_blank" :class="navigationMenuTriggerStyle()">
                                Blog
                            </a>
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <div class="cursor-pointer lg:hidden" @click="toggleMobileMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </div>
            </div>
        </nav>
        
        <!-- Black Overlay for Mobile Menu -->
        <div 
            v-if="isMobileMenuOpen" 
            class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden" 
            @click="closeMobileMenu"
        ></div>
        
        <!-- Mobile Menu (Slides from right to left) -->
        <div 
            :class="['fixed top-0 right-0 h-full w-64 bg-white shadow-lg z-50 lg:hidden transform transition-transform duration-300 ease-in-out', 
                     isMobileMenuOpen ? 'translate-x-0' : 'translate-x-full']"
        >
            <div class="flex justify-end p-4">
                <button @click="toggleMobileMenu" class="text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col p-4 space-y-4">
                <Link href="/" :class="[$page.url === '/' ? 'text-sky-700' : '', 'text-lg font-medium text-neutral-700 hover:text-sky-700']" @click="toggleMobileMenu">
                    Home
                </Link>
                <Link href="/about-us" :class="[$page.url === '/about-us' ? 'text-sky-700' : '', 'text-lg font-medium text-neutral-700 hover:text-sky-700']" @click="toggleMobileMenu">
                    About Us
                </Link>
                <Link href="/prayer" :class="[$page.url === '/prayer' ? 'text-sky-700' : '', 'text-lg font-medium text-neutral-700 hover:text-sky-700']" @click="toggleMobileMenu">
                    Prayer
                </Link>
                <Link href="/online-giving" :class="[$page.url === '/online-giving' ? 'text-sky-700' : '', 'text-lg font-medium text-neutral-700 hover:text-sky-700']" @click="toggleMobileMenu">
                    Online Giving
                </Link>
                <Link href="/sermons" :class="[$page.url === '/sermons' ? 'text-sky-700' : '', 'text-lg font-medium text-neutral-700 hover:text-sky-700']" @click="toggleMobileMenu">
                    Sermons
                </Link>
                <a href="https://www.unstoppablekidsbooks.com/blog" target="_blank" class="text-lg font-medium text-neutral-700 hover:text-sky-700" @click="toggleMobileMenu">
                    Blog
                </a>
            </div>
        </div>
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
                        <Link href="/about-us" class="block text-neutral-300">What to Expect</Link>
                        <Link href="/about-us#our-beliefs" class="block text-neutral-300">Our Beliefs</Link>
                        <Link href="/login" class="block mt-0 underline text-neutral-300 sm:mt-16">Login Account</Link>
                    </div>
                    <div>
                        <HeadingDescription description="GET INVOLVED" class="mb-2"/>
                        <Link href="/online-giving" class="block text-neutral-300">Online Giving</Link>
                        <Link href="/prayer" class="block text-neutral-300">Submit Prayers</Link>
                    </div>
                    <div>
                        <HeadingDescription description="HELPFUL LINKS" class="mb-2"/>
                        <a href="https://thebereans.net/cult-listing/" target="_blank" class="block text-neutral-300">The Bereans</a>
                        <a href="https://answersingenesis.org/" target="_blank" class="block text-neutral-300">Answers in Genesis</a>
                        <a href="https://www.9marks.org/" target="_blank" class="block text-neutral-300">9Marks</a>
                        <a href="https://bibleproject.com/" target="_blank" class="block text-neutral-300">The Bible Project</a>
                        <a href="https://utmost.org/" target="_blank" class="block text-neutral-300">My Utmost for His Highest</a>
                        <a href="https://disntr.com/" target="_blank" class="block text-neutral-300">The DSNTR</a>
                    </div>
                    <div>
                        <HeadingDescription description="SCHEDULE" class="mb-2"/>
                        <p href="" class="block text-neutral-300">Regular Schedule</p>
                        <HeadingDescription description="SUNDAY SERVICE" class="mt-4 mb-2"/>
                        <a href="" class="block text-neutral-300">10:00 AM to 11:30 AM</a>
                    </div>
                </div>
                <HeadingDescription description="© 2025 Big Island Christian Church. All rights reserved." class="mt-4 mb-16 !text-base text-center"/>
            </div>
        </div>
    </footer>
</template>

<style>
/* Custom styles for the sliding menu and overlay */
.transform {
    transition-property: transform;
}
.transition-transform {
    transition-property: transform;
}
.duration-300 {
    transition-duration: 300ms;
}
.ease-in-out {
    transition-timing-function: ease-in-out;
}
.translate-x-0 {
    transform: translateX(0);
}
.translate-x-full {
    transform: translateX(100%);
}
</style>