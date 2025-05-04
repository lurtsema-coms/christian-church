import { App } from 'vue';
// Global Components
import Heading from '../components/frontend/Heading.vue'
import HeadingDescription from '@/components/frontend/HeadingDescription.vue';
import CardEvent from '@/components/frontend/CardEvent.vue';
import { Button } from '@/components/ui/button';

export function registerGlobalComponents(app: App<Element>) {
    app.component('Heading', Heading);
    app.component('HeadingDescription', HeadingDescription);
    app.component('CardEvent', CardEvent);
    app.component('Button', Button);
}