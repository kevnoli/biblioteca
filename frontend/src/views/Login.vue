<template>
  <v-dialog v-model="dialogo" persistent max-width="25em">
    <v-card class="pb-2">
      <v-card-title>Log-in</v-card-title>
      <v-card-text>
        <v-form v-model="valido">
          <label for="cpf">CPF</label>
          <v-text-field id="cpf" v-model="cpf"></v-text-field>
          <label for="senha">Senha</label>
          <v-text-field id="senha" v-model="senha" type="password" hide-details></v-text-field>
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" @click="login">ENTRAR</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  data: () => ({
    dialogo: true,
    valido: false,
    cpf: "",
    senha: "",
  }),
  methods: {
    login() {
      this.$auth.login({
        data: {
          cpf: this.cpf,
          password: this.senha
        },
      });
    },
  },
};
</script>
