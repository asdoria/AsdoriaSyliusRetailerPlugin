<template>
    <Search />
    <Map />

    <div class="ui cards" id="list" v-if="store.state.searchResultsLength > 0">
        <template
                  v-for="retailer in store.state.retailers"
                  :key="retailer.id">
            <Retailer :retailer="retailer" :image="imageURL + retailer.path" />
        </template>
    </div>

    <div class="ui ignored info message" v-else>
        {{ JSON.parse(this.$props.config).emptyResultsMessage }}
    </div>
</template>

<script>
import Search from './components/TheSearch.vue';
import Map from './components/TheMap.vue';
import Retailer from './components/TheRetailer';
import { provide, inject } from 'vue';
import { useStore } from "vuex";

export default {
    name: "App",
    components: {
        Search,
        Map,
        Retailer
    },
    props: {
        config: String,
    },
    provide() {
        return {
            ajaxRoute: JSON.parse(this.config).ajaxRoute,
            imageRoute: JSON.parse(this.config).imageRoute,
            defaultValues: JSON.parse(this.config).default,
            formatPhoneNumber: this.formatPhoneNumber,
            searchField:  JSON.parse(this.config).searchField,
            findButton:  JSON.parse(this.config).findButton,
            emptyResultsMessage:  JSON.parse(this.config).emptyResultsMessage,
        };
    },
    setup(props) {
        const store = useStore();
        const imgRoute = JSON.parse(props.config).imageRoute;
        const imageURL =  document.location.origin + '/' + imgRoute;

        function formatPhoneNumber(number) {
            // Hugo Duval -- Code :
            const MASKS = {
                '000 0 00 00 00 00': v => v.startsWith('+33') && v.length === 12,
                '00 00 00 00 00': v => v.startsWith('0') && v.length === 10,
            };

            const [mask] = Object.entries(MASKS).find(([_, condition]) => condition(number)) ?? [];

            if (!mask) return number;

            const numberArr = [...number];
            let numberIndex = 0;
            return [...mask].reduce((acc, v) => {
                if (v === ' ') return acc + ' ';

                acc += numberArr[numberIndex];
                numberIndex++;

                return acc;
            }, '');
        }

        return {
            ...props,
            store,
            imgRoute,
            imageURL,
            formatPhoneNumber,
            ...props,
        }
    }
}
</script>

<style scoped>
* {
    margin: 1em 0;
}

#list {
    margin: 1em 0;
}

#list * {
    margin: 1em;
}
</style>
