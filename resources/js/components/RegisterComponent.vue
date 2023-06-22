
<template>
    <div>
        <h1>Register</h1>
        <p v-if="error" style="color: red;">{{error}}</p>
        <form method="POST" @submit.prevent="register">
            <label>Username:</label>
            <input type="text" required v-model="username">

            <label>Email:</label>
            <input type="email" required v-model="email">

            <label>Password:</label>
            <input type="password" required v-model="password">

            <button type="submit">Register</button>
        </form>
        <p>Username: {{username}}</p>
        <p>Email: {{email}}</p>
        <p>Password: {{password}}</p>
    </div>

</template>

<script>

export default{
    props: ['formRoute'],

    data(){
        return{
            username: '',
            email: '',
            password: '',
            error: ''
        }
    },

    methods: {
        register(){
            axios.post(this.formRoute, {
                username: this.username,
                email: this.email,
                password: this.password
            })
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                this.error = error.response.data.message;
                console.log(error.response);
            })
        }
    }
}
</script>

<style scoped>

</style>
