<template>
  <v-dialog v-model="dialogo" persistent max-width="25em">
    <v-card class="pb-2">
      <v-card-title>Log-in</v-card-title>
      <v-card-text>
        <v-form v-model="valido">
          <label for="cpf">CPF</label>
          <v-text-field id="cpf" v-model="cpf"></v-text-field>
          <label for="senha">Senha</label>
          <v-text-field
            id="senha"
            v-model="senha"
            type="password"
            hide-details
          ></v-text-field>
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          color="primary"
          :loading="login_btn"
          :disabled="login_btn"
          @click="login"
          >ENTRAR</v-btn
        >
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
    login_btn: false,
  }),
  methods: {
    login() {
      this.login_btn = true;
      this.$auth
        .login({
          data: {
            cpf: this.cpf,
            password: this.senha,
          },
        })
        .catch((e) => {
          this.$dialog.notify.error(e.response.data.mensagem);
        })
        .finally(() => {
          this.login_btn = false;
        });
    },
  },
};
</script>
