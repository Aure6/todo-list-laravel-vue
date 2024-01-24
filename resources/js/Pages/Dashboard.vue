<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

import Task from "../Components/Task.vue";
import AddTaskForm from '@/Components/AddTaskForm.vue';

defineProps([
    'tasks',
]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <!-- <Welcome /> -->
                    <div class="max-w-3xl px-4 mx-auto mt-4 mb-4 ">
                        <h1 class="text-3xl font-light">My Todo List</h1>

                        <div class="flex flex-col mt-4 space-y-4">
                            <!-- @if (session('success'))
                            <div class="p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                                <div class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
                                    <p class="font-bold">Success</p>
                                    <p>{{ session('success') }}</p>
                                </div>
                            </div> -->
                            <AddTaskForm />
                            <Task v-for="task in tasks" :key="task.id" :task="task" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
