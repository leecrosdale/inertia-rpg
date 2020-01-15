<template>

    <layout>

        <div v-if="$page.errors">{{ $page.errors }}</div>


        Username: <input type="text" name="username" v-model="data.username" />
        Password: <input type="password" name="password"  v-model="data.password"/>
        <button class="btn btn-secondary" type="submit" @click="register">Register</button>

        <button class="btn btn-secondary" type="submit" @click="login">Login</button>


    </layout>


</template>

<script>
    import Layout from "../Shared/Layout";
    export default {
        name: "test",
        components: {Layout},
        data() {
            return {
                data: {
                    username: null,
                    password: null
                }
            }
        },
        methods: {
            login() {

                this.$inertia.post(this.$route('login'), this.data, {
                    replace: false,
                    preserveState: true,
                    preserveScroll: false,
                    only: [],
                })



            },
            register() {

                this.$inertia.post(this.$route('register'), this.data, {
                    replace: false,
                    preserveState: true,
                    preserveScroll: false,
                    only: [],
                })



            }
        }
    }
</script>

<style scoped>

</style>
