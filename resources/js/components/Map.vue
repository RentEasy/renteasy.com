<template>
    <div style="height: 100%; width: 100%">
        <l-map
            v-if="showMap"
            :zoom="zoom"
            :center="center"
            :options="mapOptions"
            @ready="ready"
            @update:center="centerUpdate"
            @update:zoom="zoomUpdate"
            @update:bounds="boundsUpdated"
        >
            <l-tile-layer
                :url="url"
                :attribution="attribution"
            />
            <l-marker v-for="point in points" :key="point.id" :lat-lng="pointToLatLng(point)">
                <l-popup>
                    <div @click="innerClick">
                        I am a popup
                        <p v-show="showParagraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                            sed pretium nisl, ut sagittis sapien. Sed vel sollicitudin nisi.
                            Donec finibus semper metus id malesuada.
                        </p>
                    </div>
                </l-popup>
            </l-marker>
            <l-marker :lat-lng="withTooltip">
                <l-tooltip :options="{ permanent: true, interactive: true }">
                    <div @click="innerClick">
                        I am a tooltip
                        <p v-show="showParagraph">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                            sed pretium nisl, ut sagittis sapien. Sed vel sollicitudin nisi.
                            Donec finibus semper metus id malesuada.
                        </p>
                    </div>
                </l-tooltip>
            </l-marker>
        </l-map>
    </div>
</template>

<script>
    import { latLng } from "leaflet";
    import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";

    export default {
        name: "Map",
        props: ['points'],
        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LTooltip
        },
        data() {
            return {
                zoom: 12,
                bounds: null,
                center: latLng(40.4419646,-80.0130456),
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution:
                    '&copy; & &hearts; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                withPopup: latLng(47.41322, -1.219482),
                withTooltip: latLng(47.41422, -1.250482),
                currentZoom: 11.5,
                currentCenter: latLng(40.4419646,-80.0130456),
                showParagraph: false,
                mapOptions: {
                    zoomSnap: 0.5
                },
                showMap: true
            };
        },
        methods: {
            ready(inp) {
                console.log(inp)
            },
            pointToLatLng(point) {
                return latLng(point['latitude'], point['longitude']);
            },
            zoomUpdate(zoom) {
                this.currentZoom = zoom;
            },
            centerUpdate(center) {
                this.currentCenter = center;
            },
            boundsUpdated (bounds) {
                this.bounds = bounds;
            },
            showLongText() {
                this.showParagraph = !this.showParagraph;
            },
            innerClick() {
                alert("Click!");
            }
        }
    };
</script>
