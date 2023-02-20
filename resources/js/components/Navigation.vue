<template>
    <header class="">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand text-decoration-none" href="">Dream Journal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Create Entry</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Labels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Statistics</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fas fa-user"></i> Username</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="fas fa-power-off text-danger"></i> Logout</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        name: "Navigation"
    }
</script>

<style scoped>

</style>
