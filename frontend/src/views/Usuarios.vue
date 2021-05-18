<template>
  <v-container>
    <v-card>
      <v-card-title>
        Usuário
        <v-spacer />
        <v-btn @click.stop="d_adicionar = true"
          >NOVO
          <v-icon>mdi-plus</v-icon>
        </v-btn>
        <usuario v-model="d_adicionar" />
      </v-card-title>
      <usuario v-model="d_editar" v-bind="item_ativo" v-bind:editar="true" />
      <v-card-text>
        <v-text-field v-model="pesquisa">
          <template v-slot:append>
            <v-btn icon @click="buscar()">
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
          </template>
        </v-text-field>
        <v-data-table :items="itens" :headers="cabecalho">
          <template v-slot:[`item.actions`]="{ item }">
            <v-icon small @click.stop="abrir(item)">mdi-pencil</v-icon>
            <v-icon small @click="deletar(item)">mdi-delete</v-icon>
          </template>
        </v-data-table>
      </v-card-text>
    </v-card>
  </v-container>
</template>
<script>
import Usuario from "../components/Usuario.vue";
export default {
  components: { Usuario },
  data: () => ({
    d_adicionar: false,
    d_editar: false,
    pesquisa: "",
    itens: [],
    item_ativo: {},
    cabecalho: [
      { text: "CPF", value: "cpf" },
      { text: "Nome completo", value: "nome" },
      { text: "Telefone", value: "telefone" },
      { text: "e-mail", value: "email" },
      { text: "Ações", value: "actions" },
    ],
  }),
  methods: {
    buscar() {
      if (this.pesquisa == "") {
        this.$http
          .get("usuarios/")
          .then((resp) => {
            this.itens = resp.data;
          })
          .catch((e) => {
            this.$dialog.notify.error(e.response.data.message);
          });
      } else {
        this.$http
          .get("usuarios/pesquisar?nome=" + this.pesquisa)
          .then((resp) => {
            this.itens = resp.data;
          })
          .catch((exc) => {
            let errors = exc.response.data.errors;
            for (const attr in errors) {
              if (Object.hasOwnProperty.call(errors, attr)) {
                errors[attr].forEach((error) => {
                  this.$dialog.notify.error(error);
                });
              }
            }
          });
      }
    },
    editar() {},
    async deletar(item) {
      let confirma = await this.$dialog.confirm({
        text: "Tem certeza de que deseja excluir o registro?",
        title: "Alerta",
        persistent: true,
        actions: {
          false: "Não",
          true: {
            text: "Sim",
            color: "primary",
          },
        },
      });
      if (confirma) {
        this.$http
          .delete("usuarios/" + item.cpf)
          .then(() => {
            this.itens.splice(this.itens.indexOf(item), 1);
            this.$dialog.notify.success("Usuário deletado com sucesso.");
          })
          .catch((e) => {
            console.error(e.response);
          });
      }
    },
    abrir(item) {
      this.dialogo = true;
      this.item_ativo = item;
    },
  },
};
</script>