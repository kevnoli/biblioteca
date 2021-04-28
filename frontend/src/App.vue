<template>
  <v-app>
  <v-navigation-drawer app>
  </v-navigation-drawer>

  <v-app-bar app>
    <v-app-bar-nav-icon></v-app-bar-nav-icon>
    <v-app-bar-title>Biblioteca</v-app-bar-title>
  </v-app-bar>

  <v-main>
    <v-container fluid>
      <router-view></router-view>
    </v-container>
  </v-main>
</v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    //
  }),
};
</script>
