<template>
  <v-app>
    <v-navigation-drawer app temporary v-model="navbar">
      <v-list nav>
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-book-search-outline</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Consultas</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Usuários</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-bookshelf</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Acervo</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-account-supervisor</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Perfis</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-book-arrow-right</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Editoras</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-book-account</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Autores</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="primary" dark dense>
      <v-app-bar-nav-icon
        v-if="this.$auth.check()"
        @click.stop="navbar = !navbar"
      >
      </v-app-bar-nav-icon>
      <v-toolbar-title></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
        v-if="this.$auth.check()"
        :loading="logout_btn"
        :disabled="logout_btn"
        icon
        @click="logout()"
      >
        <v-icon>mdi-logout-variant</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>

    <!-- <VLibras /> -->
  </v-app>
</template>

<script>
//import { VLibras } from '@vue-a11y/vlibras'
export default {
  name: "App",

  data: () => ({
    navbar: false,
    logout_btn: false,
  }),

  methods: {
    logout() {
      this.logout_btn = true;
      this.$auth
        .logout({
          makeRequest: true,
          redirect: { name: "login" },
        })
        .then(() => {
          this.logout_btn = false;
        });
    },
  },

  /*components: {
    VLibras
  }*/
};
</script>
