<template>
        <div class="column">
            <div class="ui blue fluid card" @click="updateCenter(retailer.latitude, retailer.longitude)">
                <div class="content">
                    <div class="left floated author">
                        <img class="ui avatar image" :src="image" />
                        {{ retailer.name }}
                    </div>
                </div>
                <div class="extra content">
                    <div class="meta"><i class="map marker alternate icon"></i>{{ retailer.street }}, {{ retailer.city.toUpperCase() }} {{ retailer.postcode }}</div>
                    <div class="meta"><i class="phone icon"></i>{{ formatPhoneNumber(retailer.phoneNumber) }}</div>
                </div>
            </div>
        </div>
</template>

<script>
import { useStore } from 'vuex';
import { onBeforeMount, ref, inject } from "vue";

export default {
    name: "TheRetailer",
    props: {
      retailer: JSON,
      image: String,
    },
    setup(props) {
        const store = useStore();
        const formatPhoneNumber = inject('formatPhoneNumber');

        function updateCenter(latitude, longitude) {

            store.state.centerByClick = [ latitude, longitude ];
        }


        return {
            formatPhoneNumber,
            updateCenter,
            ...props,
        }
    }
}
</script>

<style scoped>
</style>
