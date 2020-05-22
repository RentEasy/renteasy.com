<template>
    <div>
        <div class="box cta">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <TextInput type="number" v-model="filter.bedrooms" label="Bedrooms"/>
                        <input class="input is-flex" type="text" placeholder="Search for properties">
                    </div>
                    <div class="level-item">
                        <p>Showing {{ totalItems }} of {{  totalItems }} rentals</p>
                    </div>
                </div>
                <div class="level-right">
                </div>
            </div>
        </div>

        <Map :points="points" />


        <div class="columns is-multiline">
            <div class="column is-one-quarter" v-for="rental in rentals">

            </div>
        </div>

    </div>
</template>

<script>
import Map from "../Map.vue";
import TextInput from "../inputs/TextInput";

export default {
    components: {Map, TextInput},
    props: ['infoRoute','propertyRoute'],
    data: () => ({
        search: null,
        rentals: [],
        points: [],
        totalItems: 100,
        shownItems: 10,
        filter: {
            bedrooms: null,
            bathrooms: null,
        }
    }),
    mounted() {
        this.fetch();
    },
    methods: {
        fetch() {
            let parent = this;
            window.axios.get(this.propertyRoute, {
            }).then(function (response) {
                parent.rentals = response.data.rentals;
                parent.points = response.data.coordinates;
            }).catch(function (error) {
                parent.error = true;
            });
        }
    }
}
</script>
