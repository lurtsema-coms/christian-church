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
    <div class="z-10 w-full bg-white shadow-sm">
        <nav class="w-full px-10 mx-auto max-w-8xl">
            <div class="relative flex justify-between py-4">
                <img :src="'/img/church_logo.png'" class="max-w-12" alt="church_logo.png">
                <div class="absolute z-10 -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                    <NavigationMenu>
                        <NavigationMenuList>
                            <NavigationMenuItem>
                                <NavigationMenuLink href="" :class="navigationMenuTriggerStyle()">
                                Home
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuTrigger>About Us</NavigationMenuTrigger>
                                <NavigationMenuContent>
                                <ul class="grid w-[400px] gap-3 p-4 md:w-[500px] md:grid-cols-2 lg:w-[600px]">
                                    <li v-for="component in components" :key="component.title">
                                    <NavigationMenuLink as-child>
                                        <a
                                        :href="component.href"
                                        class="block p-3 space-y-1 leading-none no-underline transition-colors rounded-md outline-none select-none hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
                                        >
                                        <div class="text-lg font-medium leading-none text-neutral-700">{{ component.title }}</div>
                                        <p class="text-sm leading-snug line-clamp-2 text-muted-foreground">
                                            {{ component.description }}
                                        </p>
                                        </a>
                                    </NavigationMenuLink>
                                    </li>
                                </ul>
                                </NavigationMenuContent>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink href="/docs/introduction" :class="navigationMenuTriggerStyle()">
                                    Team
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink href="/docs/introduction" :class="navigationMenuTriggerStyle()">
                                    Prayer
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink href="/docs/introduction" :class="navigationMenuTriggerStyle()">
                                    Online Giving
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink href="/docs/introduction" :class="navigationMenuTriggerStyle()">
                                    Sermons
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink href="/docs/introduction" :class="navigationMenuTriggerStyle()">
                                    Ministries
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuLink href="/docs/introduction" :class="navigationMenuTriggerStyle()">
                                    Member Area
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>
                </div>
                <div class="relative flex items-center gap-2">
                    <div class="flex items-center justify-center rounded-full bg-white shadow-[#F7EDE2] border-red-400 border shadow-sm w-11 h-11">
                        <img src="/icons/heart.png" alt="" class="w-8">
                    </div>
                    <div class="flex items-center justify-center rounded-full bg-white shadow-[#F7EDE2] border-sky-400 border shadow-sm w-11 h-11">
                        <img src="/icons/loud-speaker.png" alt="" class="w-8">
                    </div>
                </div>
            </div>
        </nav>
    </div>
    
    <slot></slot>
</template>