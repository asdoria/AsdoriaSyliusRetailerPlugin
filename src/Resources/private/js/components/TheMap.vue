<template>
    <div>
        <l-map
            :center="center"
            :zoom="zoom"
            class="map"
            ref="map"
        >
            <l-tile-layer
                :url="url"
            >
            </l-tile-layer>

            <Marker v-for="marker in markers" :key="marker.id" :marker="marker"></Marker>
        </l-map>
    </div>
</template>

<script>

import { LMap, LTileLayer } from '@vue-leaflet/vue-leaflet';
import Marker from './RetailerMapIcon.vue';
import 'leaflet/dist/leaflet.css';

import axios from 'axios';

import { onBeforeMount, computed, ref, watch, inject } from 'vue';
import { useStore } from 'vuex';

export default {
    name: "TheMap",
    components: {
        LMap,
        LTileLayer,
        Marker,
    },
    setup(props, context) {
        const store = useStore();

        const routeAjax = inject('ajaxRoute');
        const imageRoute = inject('imageRoute');
        const defaultValues = inject ('defaultValues');

        const url = 'https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png';
        const center = ref([ defaultValues.latitude, defaultValues.longitude ]);
        const markers = ref([])

        const zoom = 14;

        const retailers = computed( () => {
            return store.state.retailers;
        });

        const centerByClick = computed( () => {
            return store.state.centerByClick
        });

        watch(retailers, function (newValue, oldValue) {

            const [object] = newValue;

            center.value = [ parseFloat(object.latitude), parseFloat(object.longitude) ];
        });

        watch(centerByClick, function (newValue, oldValue) {

            center.value = newValue;
        });

        onBeforeMount( async () => {

            const center = [ defaultValues.latitude, defaultValues.longitude ];
            const routeAjax = inject('ajaxRoute').replace('0', '');
            const imageRoute = inject('imageRoute');

            const objects = await axios.get(routeAjax, {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                },
            );

            const retailers = objects.data._embedded.items;

            if (!retailers) return;

            const imageUrl = document.location.origin + '/' + imageRoute;

            retailers.forEach((item) => {
                markers.value.push(
                    {
                        id: item.id,
                        name: item.name,
                        street: item.street,
                        city: item.city,
                        postcode: item.postcode,
                        phoneNumber: item.phoneNumber,
                        image: imageUrl + item.path,
                        coordinates: [ parseFloat(item.latitude), parseFloat(item.longitude) ]
                    });
            });

            const {circleMarker} = await import("leaflet/src/Leaflet");
        });

        return {
            store,
            routeAjax,
            defaultValues,
            imageRoute,
            url,
            center,
            zoom,
            markers,
        }
    }
}
</script>

<style scoped>
div {
    height: 600px;
    width: 1127px;
    margin: auto;

}

.map {
    overflow: hidden;
}
</style>
