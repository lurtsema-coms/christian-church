<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthRegister from '@/layouts/auth/AuthRegister.vue';  // Import the new layout
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import { countries } from '@/data/countries';



const form = useForm({
    name: '',
    email: '',
    title: '',
    country: '',
    address: '',
    city: '',
    state: '',
    contact_number: '',
    web_page: '',
    birthday: '',
    wedding_anniv: '',
    date_salvation: '',
    date_baptism: '',
    testimony: '',
    extra_detail: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthRegister title="Create an account" description="Enter your details below to create your account">
        <Head title="Register" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="flex flex-col sm:flex-row gap-2">
                    <div class="grid gap-2 w-full">
                        <Label for="email">Email address</Label>
                        <Input id="email" type="email" required :tabindex="2"  v-model="form.email" placeholder="email@example.com" />
                        <InputError :message="form.errors.email" />
                    </div>
                    <div class="grid gap-2 w-full">
                        <Label for="password">Password</Label>
                        <Input
                            id="password"
                            type="password"
                            required
                            :tabindex="3"
                            autocomplete="new-password"
                            v-model="form.password"
                            placeholder="Password"
                        />
                        <InputError :message="form.errors.password" />
                    </div>
                    <div class="grid gap-2 w-full">
                        <Label for="password_confirmation">Confirm password</Label>
                        <Input
                            id="password_confirmation"
                            type="password"
                            required
                            :tabindex="4"
                            autocomplete="new-password"
                            v-model="form.password_confirmation"
                            placeholder="Confirm password"
                        />
                        <InputError :message="form.errors.password_confirmation" />
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 ">
                    <div class="grid gap-2 w-full sm:w-3/4">
                        <Label for="name">Full Name</Label>
                        <Input id="name" type="text" required autofocus :tabindex="1" v-model="form.name" placeholder="Full Name" />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="grid gap-2 w-full sm:w-1/4">
                        <Label for="title">Title</Label>
                        <Input id="title" type="text"  autofocus :tabindex="1" v-model="form.title" placeholder="e.g. Mr., Mrs., Dr." />
                        <InputError :message="form.errors.title" />
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-2">
                    <div class="grid gap-2 w-full sm:w-3/5">
                        <Label for="contact_number">Contact Number</Label>
                        <Input id="contact_number" type="text" required autofocus :tabindex="1" v-model="form.contact_number" placeholder="Contact Number" />
                        <InputError :message="form.errors.contact_number" />
                    </div>
                    <div class="grid gap-2 w-full sm:w-1/5">
                        <Label for="birthday">Date of Birth</Label>
                        <Input id="birthday" type="date" required autofocus :tabindex="1" v-model="form.birthday" placeholder="" />
                        <InputError :message="form.errors.birthday" />
                    </div>
                </div>
                <div class="grid gap-2">
                    <Label for="address">Complete Address</Label>
                    <Input id="address" type="text" required autofocus :tabindex="1" v-model="form.address" placeholder="Complete Address" />
                    <InputError :message="form.errors.address" />
                </div>
                <div class="flex flex-col sm:flex-row gap-2">
                    <div class="grid gap-2">
                        <Label for="country">Country</Label>
                        <select
                            id="country"
                            v-model="form.country"
                            class="border border-input bg-background text-sm rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                            required
                        >
                            <option value="" disabled>Select a country</option>
                            <option v-for="country in countries" :key="country" :value="country">
                                {{ country }}
                            </option>
                        </select>
                        <InputError :message="form.errors.country" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="city">City</Label>
                        <Input id="city" type="text"  autofocus :tabindex="1" v-model="form.city" placeholder="City" />
                        <InputError :message="form.errors.city" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="state">State</Label>
                        <Input id="state" type="text"  autofocus :tabindex="1" v-model="form.state" placeholder="State" />
                        <InputError :message="form.errors.state" />
                    </div>
                </div>
                <div class="grid gap-2">
                    <Label for="web_page">Web Page</Label>
                    <Input id="web_page" type="text"  autofocus :tabindex="1" v-model="form.web_page" placeholder="e.g. https://example.com" />
                    <InputError :message="form.errors.web_page" />
                </div>
                <div class="flex flex-col sm:flex-row gap-2">
                    <div class="grid gap-2 w-full">
                        <Label for="wedding_anniv">Wedding Anniversary</Label>
                        <Input id="wedding_anniv" type="date"  autofocus :tabindex="1" v-model="form.wedding_anniv" placeholder="" />
                        <InputError :message="form.errors.wedding_anniv" />
                    </div>
                    <div class="grid gap-2 w-full">
                        <Label for="date_salvation">Date of Salvation</Label>
                        <Input id="date_salvation" type="date"  autofocus :tabindex="1" v-model="form.date_salvation" placeholder="" />
                        <InputError :message="form.errors.date_salvation" />
                    </div>
                    <div class="grid gap-2 w-full">
                        <Label for="date_baptism">Date of Baptism</Label>
                        <Input id="date_baptism" type="date"  autofocus :tabindex="1" v-model="form.date_baptism" placeholder="" />
                        <InputError :message="form.errors.date_baptism" />
                    </div>
                </div>
                <div class="grid gap-2">
                    <Label for="testimony">Testimony</Label>
                    <textarea
                        id="testimony"
                        v-model="form.testimony"
                        class="border border-input bg-background text-sm rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary resize-none h-32"
                        
                    >
                    </textarea>
                    <InputError :message="form.errors.testimony" />
                </div>
                <div class="grid gap-2">
                    <Label for="extra_detail">Extra Details</Label>
                    <textarea 
                        id="extra_detail"
                        v-model="form.extra_detail"
                        class="border border-input bg-background text-sm rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary resize-none h-32"
                        
                    >
                    </textarea>
                    <InputError :message="form.errors.extra_detail" />
                </div>


                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create account
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground">
                Already have an account?
                <TextLink :href="route('login')" class="underline underline-offset-4" :tabindex="6">Log in</TextLink>
            </div>
        </form>
    </AuthRegister>
</template>
