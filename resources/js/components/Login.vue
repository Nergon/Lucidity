<template>
    <main class="login text-center">
        <form>

            <h1 class="h2 mb-3 fw-normal">Dream Journal</h1>
            <h2 class="h4 mb-3 fw-normal">Please sign in</h2>
            <div class="mb-3">
                <label for="inputEmail"  class="visually-hidden">Username</label>
                <input v-model="form.username" type="text" name="username" id="inputEmail" class="form-control" v-bind:class="{ 'border-danger': errors.username }" placeholder="Username" required autofocus>
                <p class="text-danger text-sm-start" v-if="errors.username">
                    {{ errors.username }}
                 </p>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="visually-hidden">Password</label>
                <input v-model="form.password" type="password" name="password" id="inputPassword" class="form-control" v-bind:class="{ 'border-danger': errors.password }" placeholder="Password" required>
                <p class="text-danger text-sm-start" v-if="errors.password">
                    {{ errors.password }}
                 </p>
            </div>
            <button class="btn btn-primary w-100" @click.prevent="login">Sign in</button>
            <p class="mt-3 mb-3">&copy; Nergon 2020</p>
        </form>
    </main>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                form: {
                    username: "",
                    password: ""
                },
                errors: []
            }
        },
        methods: {
            login() {
                if(!this.form.username) {
                    this.errors["username"] = "Username required";
                    this.$forceUpdate();
                    return;
                }
                if(!this.form.password) {
                    this.errors["password"] = "Password required";
                    this.$forceUpdate();
                    return;
                }
                window.axios.get('/sanctum/csrf-cookie').then(() => {
                    window.axios.post('/api/login', this.form).then((response) => {
                        if(response.data.success) {
                            localStorage.setItem('auth','true');
                            this.$router.push("/");
                        } else {
                            Swal.fire({
                                'icon': 'error',
                                'text': 'The provided credentials do not match our records.'
                            });
                        }
                    }).catch(() => {
                        Swal.fire({
                            'icon': 'error',
                            'text': 'The provided credentials do not match our records.'
                        })
                    });
                });
            }
        }
    }
</script>

<style scoped>

</style>
