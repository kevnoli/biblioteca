<template>
  <v-dialog v-model="dialogo" min-width="500px" persistent>
    <v-card>
      <v-card-title>
        {{ (edicao ? "Editar" : "Adicionar") + " usuário" }}
        <v-spacer></v-spacer>
        <v-btn icon @click.stop="fechar()">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-text>
        <v-container>
          <v-form>
            <v-row>
              <v-col cols="2">
                <v-text-field v-model="usuario.cpf" label="CPF"></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                  v-model="usuario.nome"
                  label="Nome"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row justify="end">
              <v-col cols="2">
                <v-text-field
                  v-model="usuario.telefone"
                  label="Telefone"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="5">
                <v-text-field
                  v-model="usuario.senha"
                  label="Senha"
                  type="password"
                ></v-text-field>
              </v-col>
              <v-col cols="5">
                <v-text-field
                  v-model="usuario.repsenha"
                  label="Repita a senha"
                  type="password"
                ></v-text-field>
              </v-col>
            </v-row>
          </v-form>
        </v-container>
      </v-card-text>
      <v-layout justify-end>
        <v-card-actions>
          <v-btn color="primary" @click="edicao ? editar() : adicionar()"
            >CONFIRMAR</v-btn
          >
        </v-card-actions>
      </v-layout>
    </v-card>
  </v-dialog>
</template>
<script>
export default {
  name: "usuario",
  data: () => ({
    usuario: {
      cpf: "",
      nome: "",
      senha: "",
      repsenha: "",
      logradouro: "",
      numero: "",
      complemento: "",
      bairro: "",
      cep: "",
      cidade: "",
      uf: "",
    },
    edicao: false,
  }),
  methods: {
    fechar() {
      this.dialogo = false;
      for (const chave in this.usuario) {
        if (Object.hasOwnProperty.call(this.usuario, chave)) {
          this.usuario[chave] = "";
        }
      }
    },
    async adicionar() {
      let confirma = await this.$dialog.confirm({
        text: "Tem certeza de que deseja adicionar o registro?",
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
          .post("usuarios/" + this.usuario)
          .then(() => {
            this.$dialog.notify.success("Usuário adicionado com sucesso.");
          })
          .catch((e) => {
            console.error(e.response.data.message);
          });
      }
    },
    editar() {},
  },
  props: {
    value: Boolean,
  },
  computed: {
    dialogo: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit("input", value);
      },
    },
  },
};
</script>