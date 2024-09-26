<template>
    <div class="create-task-form">
        <h2>Create Task</h2>
        <form @submit.prevent="createTask">
            <div>
                <label for="title">Title:</label>
                <input type="text" v-model="form.title" id="title" />
                <span v-if="errors.title" class="error">{{ errors.title }}</span>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea v-model="form.description" id="description"></textarea>
                <span v-if="errors.description" class="error">{{ errors.description }}</span>
            </div>

            <div>
                <label for="status">Status:</label>
                <select v-model="form.status" id="status">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
                <span v-if="errors.status" class="error">{{ errors.status }}</span>
            </div>

            <div>
                <label for="due_date">Due Date:</label>
                <input type="datetime-local" v-model="form.due_date" id="due_date" />
                <span v-if="errors.due_date" class="error">{{ errors.due_date }}</span>
            </div>

            <button type="submit">Add Task</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            form: {
                title: '',
                description: '',
                status: 'pending',
                due_date: ''
            },
            errors: {}
        };
    },
    methods: {
        createTask() {
            this.errors = {};

            if (!this.form.title) {
                this.errors.title = 'Title is required';
            }
            if (this.form.description && this.form.description.length > 500) {
                this.errors.description = 'Description cannot exceed 500 characters';
            }
            if (!this.form.status) {
                this.errors.status = 'Status is required';
            }
            if (this.form.due_date && !this.validDate(this.form.due_date)) {
                this.errors.due_date = 'Due date is not valid';
            }

            if (Object.keys(this.errors).length === 0) {
                axios.post('/api/tasks', this.form)
                    .then(response => {
                        console.log('Task created:', response.data);
                        // Можно добавить уведомление о успешном создании
                        this.resetForm();
                    })
                    .catch(error => {
                        if (error.response && error.response.status === 422) {
                            this.errors = error.response.data;
                        } else {
                            console.log('Error:', error);
                        }
                    });
            }
        },
        validDate(date) {
            return !isNaN(Date.parse(date));
        },
        resetForm() {
            this.form = {
                title: '',
                description: '',
                status: 'pending',
                due_date: ''
            };
            this.errors = {};
        }
    }
};
</script>

<style scoped>
.error {
    color: red;
}
</style>
