<template>
    <div>
        <div v-for="(row, index) in rows">
            <article class="media">
                <div class="media-content">
                    <slot v-bind:row="row" v-bind:errors="getErrors(index)"></slot>
                </div>
                <div class="media-right">
                    <button type="button" class="delete" v-show="rows.length > 1" v-on:click="deleteOne(index)"></button>
                </div>
            </article>
        </div>
        <button type="button" class="button is-info is-small" v-on:click="addMore">+ Add Another</button>
    </div>
</template>

<style>
    button {
        margin-top: 10px;
    }
</style>

<script>
    export default {
        props: ['errors'],
        data: () => ({
            // One row by default, user can supply the rest, validations happen on backend
            rows: [{}],
        }),
        watch: {
            rows: function (newRows, oldRows) {
                this.$emit('input', newRows);
            }
        },
        methods: {
            addMore() {
                this.rows.push({});
            },
            deleteOne(i) {
                this.rows.splice(i, 1);
            },
            getErrors(index) {
                if(this.errors && index in this.errors) {
                    return this.errors[index]
                }

                return [];
            }
        },
    }
</script>
