import { createApp } from 'vue';
import { createStore } from 'vuex';

import App from './App.vue';
import SuiVue from 'semantic-ui-vue';

import 'semantic-ui-css/semantic.min.css';

const el = document.querySelector('#app');

const store = createStore({
  state() {
    return {
      retailer: {
        name: '',
        street: '',
        city: '',
        postcode: '',
        latitude: '',
        longitude: '',
        id: '',
        retailerGroup: '',
      },
      defaultValues: el.dataset.default
    }
  },
  getters: {
    getRetailer(state) {
      return state.retailer;
    }
  }
});


const app = createApp(App, {
  ...el.dataset,
});

app.use(store);
app.use(SuiVue);
app.mount(el);


