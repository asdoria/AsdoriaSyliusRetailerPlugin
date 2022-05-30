<template>
    <Search />
    <Map />
</template>

<script>
import Search from './components/TheSearch.vue';
import Map from './components/TheMap.vue';
import { provide } from 'vue';

export default {
    name: "App",
    components: {
        Search,
        Map
    },
    props: {
        config: String,
        searchResultsLength: Number,
    },
    provide() {
        return {
            ajaxRoute: JSON.parse(this.config).ajaxRoute,
            defaultValues: JSON.parse(this.config).default,
            searchResultsLength: 0
        };
    },
    setup(props) {
        return {
            ...props,
        }
    }
}
</script>

<style scoped>
* {
    margin: 1em 0;
}
</style>
