<template>
  <v-container>
    <v-card>
      <v-card-title> Usuários </v-card-title>
      <v-card-text>
        <v-text-field v-model="pesquisa">
          <template v-slot:append>
            <v-btn icon @click="busca()">
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
          </template>
        </v-text-field>
        <v-data-table :items="itens" :headers="cabecalho">
          <template v-slot:[`item.actions`]="{ item }">
            <v-icon small @click="editar(item)">mdi-pencil</v-icon>
            <v-icon small @click="deletar(item)">mdi-delete</v-icon>
          </template>
        </v-data-table>
      </v-card-text>
    </v-card>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    pesquisa: "",
    itens: [],
    cabecalho: [
      { text: "CPF", value: "cpf" },
      { text: "Nome completo", value: "nome" },
      { text: "Telefone", value: "telefone" },
      { text: "e-mail", value: "email" },
      { text: "Ações", value: "actions" },
    ],
  }),
  methods: {
    busca() {
      if (this.pesquisa == "") {
        this.$http
          .get("usuarios/")
          .then((resp) => {
            this.itens = resp.data;
          })
          .catch((e) => {
            this.$dialog.notify.error(e.response.data.mensagem);
          });
      } else {
        this.$http
          .get("usuarios/pesquisar?nome=" + this.pesquisa)
          .then((resp) => {
            this.itens = resp.data;
          })
          .catch((e) => {
            this.$dialog.notify.error(e.response.data.mensagem);
          });
      }
    },
    editar() {},
    deletar(item) {
      console.log(item);
      this.$http.delete("usuarios/" + item.cpf).then(() => {
        this.$dialog.notify.success("Usuário deletado com sucesso.");
      });
    },
  },
};
</script>