<template>
    <div>
        <navigation></navigation>
        <main class="container">
            <p class="d-block"><span class="text-white h4">My dreams</span> <a href="" class="btn btn-sm btn-primary float-end text-decoration-none"><i class="fas fa-plus"></i> Add entry</a></p>
            <dashboard-entry
                v-for="entry in entries"
                :key="entry.id"
            ></dashboard-entry>
        </main>
    </div>
</template>

<script>
    import Navigation from "./Navigation";
    import DashboardEntry from "./DashboardEntry";
    export default {
        name: "App",
        components: {
            DashboardEntry,
            Navigation
        },
        methods: {
            async fetch() {
                const {data} = await window.axios.get('/api/entries');
                console.log(data);
                data.data.forEach(entry => {

                });
            }
        },
        created() {
            this.fetch();
        }
    }
</script>

<style scoped>
</style>
