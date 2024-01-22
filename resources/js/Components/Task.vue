<template>
    <div class="flex flex-row px-4 py-2 space-x-4 bg-gray-100 rounded">
        <input type="checkbox" />

        <p>{{ task.title }}</p>
    </div>
</template>


<script setup>
defineProps([
    'task',
]);
</script>
