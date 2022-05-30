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
        </l-map>
    </div>
</template>

<script>

import { LMap, LTileLayer } from '@vue-leaflet/vue-leaflet';
import 'leaflet/dist/leaflet.css';

import { onBeforeMount, computed, ref, watch, inject } from 'vue';
import { useStore, mapGetters } from 'vuex';

export default {
    name: "TheMap",
    components: {
        LMap,
        LTileLayer,
    },
    setup(props, context) {
        const store = useStore();

        const routeAjax = inject('ajaxRoute');
        const defaultValues = inject ('defaultValues');

        const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        let center = ref([ defaultValues.latitude, defaultValues.longitude ]);
        const zoom = 12;

        const retailer = computed(function () {
            return store.state.retailer;
        });

        watch(retailer, function(newValue, oldValue) {
            center.value = [ parseFloat(newValue.latitude), parseFloat(newValue.longitude) ];
        })

        onBeforeMount( async () => {
            const center = [ defaultValues.latitude, defaultValues.longitude ];
            const {circleMarker} = await import("leaflet/src/Leaflet");
        });

        return {
            store,
            routeAjax,
            defaultValues,
            url,
            center,
            zoom,
        }
    }
}
</script>

<style scoped>
div {
    height: 600px;
    width: 1140px;
    margin: auto;

}

.map {
    overflow: hidden;
}
</style>
