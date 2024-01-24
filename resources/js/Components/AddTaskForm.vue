<template>
    <form @submit.prevent="createTask" class="flex p-4 space-x-4 border rounded">
        <div class="flex-1">
            <input class="block px-2 py-1.5 bg-gray-100 rounded w-full" placeholder="Enter your task..." type="text"
                v-model="taskForm.title" @change="validate('title')" />
            <div v-if="invalid('title')" class="bg-red-500">
                {{ taskForm.errors.title }}
            </div>
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
import { ref, computed } from 'vue';
import { useForm } from "@inertiajs/vue3";

// Initialise the form with the properties we want to update client-side send to the server-side
const taskForm = useForm({
    title: '',
});

// Create a method that tells the form to submit to TaskController@store
// it works
// const createTask = () => {
//     taskForm.post('/tasks', {
//         onError: (err) => {
//             errors.value = err;
//         }
//     });
// };
const createTask = () => {
    validate('title');
    if (!invalid.value('title')) {
        taskForm.post('/tasks', {
            onError: (err) => {
                errors.value = err;
            }
        });
    }
};

const errors = ref({});

const validate = (field) => {
    if (taskForm.values && !taskForm.values[field]) {
        errors.value[field] = `${field} is required`;
    } else {
        delete errors.value[field];
    }
};

const invalid = computed(() => {
    return field => {
        return Object.keys(errors.value).includes(field);
    };
});
</script>
