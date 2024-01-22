<template>
    <form @submit.prevent="createTask" class="flex p-4 space-x-4 border rounded">
        <div class="flex-1">
            <input class="block px-2 py-1.5 bg-gray-100 rounded w-full" placeholder="Enter your task..." type="text"
                v-model="taskForm.title" />
        </div>

        <div>
            <button class="px-6 py-1.5 bg-indigo-600 rounded text-white">
                Add
            </button>
        </div>
    </form>
</template>

<script setup>
// Import the useForm helper
import { useForm } from "@inertiajs/vue3";

// Initialise the form with the properties we want to update client-side send to the server-side
const taskForm = useForm({
    title: '',
});

// Create a method that tells the form to submit to TaskController@store
const createTask = () => {
    taskForm.post('/tasks');
};
</script>
