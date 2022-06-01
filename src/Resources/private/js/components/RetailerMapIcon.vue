<template>
    <l-marker
        :key="marker.id"
        :lat-lng="marker.coordinates"
    >
        <l-icon ref="icon">
            <img class="retailer-icon" :src="marker.image" />
        </l-icon>

        <l-popup :content="content" />
    </l-marker>
</template>

<script>
import { LIcon, LMarker, LPopup } from '@vue-leaflet/vue-leaflet';
import { inject } from 'vue';

export default {
    components: { LIcon, LMarker, LPopup },
    props: {
        marker: {
            type: Object,
            required: true
        }
    },
    setup(props) {

        const formatPhoneNumber = inject('formatPhoneNumber');

        const content =
            '<b>' +
            props.marker.name
            + '</b><br />'
            + props.marker.street
            + '<br />'
            + props.marker.city.toUpperCase()
            + ' '
            + props.marker.postcode
            + `<br /><a href="tel:${props.marker.phoneNumber}">${formatPhoneNumber(props.marker.phoneNumber)}</a>`
        ;

        return {
            ...props,
            content,
        }
    }
}

</script>

<style scoped>
.retailer-icon {
    height: 50px;
    width: auto;
}
</style>
