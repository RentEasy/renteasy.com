<template>
    <div>
        <div v-for="n in rows">
            <article class="media">
                <div class="media-content">
                    <slot v-bind:iteration="n"></slot>
                </div>
                <div class="media-right">
                    <button type="button" class="delete" v-show="rows > 1" v-on:click="deleteOne"></button>
                </div>
            </article>
        </div>
        <button type="button" class="button is-info is-small" v-on:click="addMore">Add More</button>
    </div>
</template>

<script>
    export default {
        data: () => ({
            rows: 1
        }),
        methods: {
            addMore() {
                this.rows++;
            },
            deleteOne() {
                this.rows--;
            }
        },
        mounted() {
            console.log(this);
            console.log('Component mounted.')
        },
    }
</script>
