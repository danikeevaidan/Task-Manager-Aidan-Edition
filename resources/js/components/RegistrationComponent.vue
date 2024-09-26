<template>
    <div class="registration-form">
        <h2>Register</h2>
        <form @submit.prevent="register">
            <div>
                <label for="name">Name:</label>
                <input type="text" v-model="form.name" id="name" />
                <span v-if="errors.name" class="error">{{ errors.name }}</span>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" v-model="form.email" id="email" />
                <span v-if="errors.email" class="error">{{ errors.email }}</span>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" v-model="form.password" id="password" />
                <span v-if="errors.password" class="error">{{ errors.password }}</span>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" v-model="form.password_confirmation" id="password_confirmation" />
                <span v-if="errors.password_confirmation" class="error">{{ errors.password_confirmation }}</span>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: {}
        };
    },
    setup() {
        const router = useRouter();
        return { router };
    },
    methods: {
        register() {
            this.errors = {};

            if (!this.form.name) {
                this.errors.name = 'Name is required';
            }
            if (!this.form.email) {
                this.errors.email = 'Email is required';
            } else if (!this.validEmail(this.form.email)) {
                this.errors.email = 'Email is not valid';
            }
            if (!this.form.password) {
                this.errors.password = 'Password is required';
            }
            if (this.form.password !== this.form.password_confirmation) {
                this.errors.password_confirmation = 'Passwords do not match';
            }

            if (Object.keys(this.errors).length === 0) {
                axios.post('/api/register', this.form)
                    .then(response => {
                        console.log('User registered:', response.data.message);
                        // Перенаправление на страницу задач после успешной регистрации
                        this.router.push('/tasks');
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
        validEmail(email) {
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    }
};
</script>

<style scoped>
.error {
    color: red;
}
</style>

