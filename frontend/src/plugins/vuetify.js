import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';
import pt from 'vuetify/lib/locale/pt';

import VuetifyDialog from 'vuetify-dialog'
import 'vuetify-dialog/dist/vuetify-dialog.min.css'

Vue.use(Vuetify);

const vuetify = new Vuetify({
  lang: {
    locales: { pt },
    current: 'pt',
  },
});

Vue.use(VuetifyDialog, {
  context: {
    vuetify
  }
});

export default vuetify;