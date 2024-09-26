import { createRouter, createWebHistory } from 'vue-router';
import CreateTaskComponent from '../components/CreateTaskComponent.vue';
import RegistrationComponent from "../components/RegistrationComponent.vue";

const routes = [
    {
        path: '/',
        component: CreateTaskComponent
    },
    {
        path: '/tasks',
        component: RegistrationComponent
    },
    {
        path: '/tasks/:id/edit',
        component: EditTaskComponent,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
