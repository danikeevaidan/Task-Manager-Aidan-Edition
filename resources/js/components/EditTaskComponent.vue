<template>
    <div>
        <h2>Edit Task</h2>
        <form @submit.prevent="updateTask">
            <div>
                <label for="title">Title</label>
                <input v-model="task.title" type="text" id="title" />
            </div>

            <div>
                <label for="description">Description</label>
                <textarea v-model="task.description" id="description"></textarea>
            </div>

            <div>
                <label for="status">Status</label>
                <select v-model="task.status" id="status">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div>
                <label for="due_date">Due Date</label>
                <input v-model="task.due_date" type="date" id="due_date" />
            </div>

            <button type="submit">Update Task</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        taskId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            task: {
                title: '',
                description: '',
                status: 'pending',
                due_date: '',
            },
        };
    },
    mounted() {
        this.getTask();
    },
    methods: {
        getTask() {
            axios.get(`/api/tasks/${this.taskId}`)
                .then(response => {
                    this.task = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        updateTask() {
            axios.put(`/tasks/${this.taskId}`, this.task)
                .then(response => {
                    alert('Task updated successfully!');
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
};
</script>
