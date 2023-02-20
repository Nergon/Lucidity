<template>
    <a href="" class="text-decoration-none">
        <div class="card mb-3 border-5  @if($entry->lucidity == 0) border-dark @else border-primary @endif border-start-0 border-bottom-0 border-top-0"
             v-bind:class="{ 'border-primary': (lucidity > 0), 'border-dark': (lucidity === 0)}">
            <div class="card-body">
                <p class="text-uppercase text-sm-start">{{ date }} • <span v-if="lucidity === 0">Regular Dream</span> <span v-else>Lucid Dream</span></p>
                <h5 class="card-title">{{ title }}</h5>
                <p class="card-text">{{ shortContent }}</p>
                <p class="text-sm-start">

                    <span class="badge bg-light-blue" v-for="label in labels">
                        {{ label }}
                    </span>

                </p>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        name: "DashboardEntry",
        props: ['title', 'shortContent', 'labels', 'lucidity']
    }
</script>

<style scoped>

</style>
