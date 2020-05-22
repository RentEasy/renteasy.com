<template>
    <div class="rentals-container">
        <div class="box cta">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <TextInput type="number" placeholder="Bedrooms" v-model="filter.bedrooms"/>
                        <TextInput type="number" placeholder="Bathrooms" v-model="filter.bathrooms"/>
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

        <div class="columns">
            <div class="column">
                <Map :points="points" />
            </div>
            <div class="column rentals-list">

                <div class="columns is-multiline">
                    <div class="column is-half" v-for="rental in rentals">
                        <transition name="fade">
                            <div class="card rental-card">
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img :src="rental.primary_photo_url" alt="">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <p class="title">{{ rental.address }}</p>
                                    <p class="subtitle">{{ rental.city }}, {{ rental.state }}</p>
                                </div>
                                <footer class="card-footer">
                                    <a href="#" class="card-footer-item">Like️</a>
                                    <a :href="rental.link" class="card-footer-item">View Property</a>
                                </footer>
                            </div>
                        </transition>
                    </div>
                </div>

                <infinite-loading @infinite="infiniteHandler"></infinite-loading>
            </div>
        </div>
    </div>
</template>

<style>
    .rentals-list {
        height: 70vh;
        overflow-y: scroll;
        scroll-margin: 11px;
        min-height: 100px;
    }

    .rentals-list::-webkit-scrollbar {
        -webkit-appearance: none;
    }

    .rentals-list::-webkit-scrollbar:vertical {
        width: 11px;
    }

    .rentals-list::-webkit-scrollbar:horizontal {
        height: 11px;
    }

    .rentals-list::-webkit-scrollbar-thumb {
        border-radius: 8px;
        border: 2px solid #ECF0F3; /* should match background, can't be transparent */
        background-color: rgba(0, 0, 0, .5);
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>

<script>
import Map from "../Map.vue";
import TextInput from "../inputs/TextInput";
import InfiniteLoading from 'vue-infinite-loading';


export default {
    components: {Map, TextInput,InfiniteLoading},
    props: ['infoRoute','propertyRoute'],
    data: () => ({
        search: null,
        rentals: [],
        points: [],
        page: 1,
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
        infiniteHandler($state) {
            console.log('infi');
            window.axios.get(this.propertyRoute, {
                params: {
                    page: this.page,
                },
            }).then(({ data }) => {
                if (data.data.length) {
                    this.page += 1;
                    this.rentals.push(...data.data);
                    $state.loaded();
                } else {
                    $state.complete();
                }
            });
        },
        fetch() {
            let parent = this;
            window.axios.get(this.infoRoute, {
            }).then(function (response) {
                parent.points = response.data.coordinates;
            }).catch(function (error) {
                parent.error = true;
            });
            //
            // window.axios.get(this.propertyRoute, {
            // }).then(function (response) {
            //     parent.rentals = response.data.data;
            // }).catch(function (error) {
            //     parent.error = true;
            // });
        }
    }
}
</script>
