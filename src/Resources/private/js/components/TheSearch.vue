<template>
    <div class="ui action input">
        <input id="retailerAddress" type="text" placeholder="Adresse, Ville, CP" v-model="userInput">
        <button class="ui button blue" @click="search">Trouver un magasin</button>
    </div>
</template>

<script>
import {useStore} from 'vuex';
import axios from 'axios';
import {ref, watch, provide, inject} from 'vue';

export default {
    name: "TheSearch",
    setup() {
        const routeAjax = inject('ajaxRoute');
        const store = useStore();

        let userInput = ref(null);
        let urlRequest = routeAjax.replace('0', userInput.value);

        watch(userInput, function (newValue, oldValue) {
            urlRequest = urlRequest.replace(oldValue, newValue);
        });

        async function search(input) {

            store.state.searchResultsLength = 0;

            input = userInput.value;

            if (!input) return;

            const object = await axios.get(urlRequest, {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                },
            );

            if (!object.data._embedded.items) return;

            store.state.searchResultsLength = object.data._embedded.items.length;

            store.state.retailers = object.data._embedded.items;
        }

        return {
            routeAjax,
            store,
            userInput,
            urlRequest,
            search,
        }
    }
}
</script>

<style scoped>

</style>
