
<template>
    <div class="flex flex-row px-4 py-2 space-x-4 bg-gray-100 rounded">
        <input type="checkbox" :true-value="1" v-model="taskForm.is_done" @change="save" />

        <button type="button" @click="deleteTask">
            X
        </button>

        <p>{{ task.title }}</p>
    </div>
</template>


<script setup>
import { useForm } from "@inertiajs/vue3";

// defineProps([
//     'task',
// ]);
// This time store a reference to props so we can pull in the defaults in the form
const props = defineProps([
    'task',
]);

// Populate form defaults based on the prop data
const taskForm = useForm({
    is_done: props.task.is_done,
    // id: props.task.id,
});

// Send an update request for the todo
const save = () => {
    console.log('Task ID: ' + props.task.id);
    console.log(taskForm.is_done);
    taskForm.put(`/tasks/${props.task.id}/update`);
};

const deleteTask = () => {
    console.log('Task ID: ' + props.task.id);
    taskForm.delete(`/tasks/${props.task.id}/delete`);
}
</script>
