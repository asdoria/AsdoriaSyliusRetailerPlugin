<template>
    <div class="ui action input">
        <input id="retailerAddress" type="text" placeholder="Adresse, Ville, CP" v-model="userInput">
        <button class="ui button" @click="search">Trouver un magasin</button>
    </div>
</template>

<script>
import { useStore } from 'vuex';
import axios from 'axios';
import { ref, watch, provide, inject } from 'vue';

export default {
    name: "TheSearch",
    setup() {
        const routeAjax = inject('ajaxRoute');
        const searchResults = inject('searchResults');
        const store = useStore();

        let userInput = ref(null);
        let urlRequest = routeAjax.replace('0', userInput.value);

        watch(userInput, function (newValue, oldValue) {
            urlRequest = urlRequest.replace(oldValue, newValue);
        });

        async function search(input) {


            input = userInput.value;
            const init = {method: 'GET', headers: {'Content-Type': 'application/json'}}
            const object = await axios.get(urlRequest, {
                    headers: {
                        Accept: 'application/json'
                    },
                },
            );

            if (!object.data) return;

            store.state.retailer = Object.assign({}, object.data[0]);
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
