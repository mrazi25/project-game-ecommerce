<template>
  <div>
    <NavbarAdmin />
    <div class="container">
      <b-table
        :items="listAcc"
        :fields="fields"
        :sort-by.sync="sortBy"
        :sort-desc.sync="sortDesc"
        sort-icon-left
        responsive="sm"
        class="table"
      ></b-table>

      <div>
        Sorting By: <b>{{ sortBy }}</b
        >, Sort Direction:
        <b>{{ sortDesc ? "Descending" : "Ascending" }}</b>
      </div>
    </div>
    <div class="container b">
      <p class="text-center font-weight-bold">CRUD System by ID</p>
      <div>
        <div>
          <b-form>
            <b-form-group
              description="If you want to create account, Please not to fill the textfeald above."
            >
              <b-form-input
                id="input-1"
                v-model="form.id"
                placeholder="ID"
                required
                type="number"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              description="We'll never share your email with anyone else."
            >
              <b-form-input
                id="input-2"
                v-model="form.email"
                placeholder="EMAIL"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group>
              <b-form-input
                id="input-3"
                v-model="form.pass"
                placeholder="PASSWORD"
                required
                style="password"
                aria-describedby="password-help-block"
              ></b-form-input>
            </b-form-group>

            <b-form-group>
              <b-form-input
                id="input-4"
                v-model="form.jenis_akun"
                placeholder="JENIS AKUN"
                required
              ></b-form-input>
            </b-form-group>
          </b-form>
        </div>
      </div>
      <div class="div2 text-center">
        <b-button-group class="mx-1">
          <b-button @click="onUpdate" variant="primary">Update</b-button>
          <b-button @click="onDelete" variant="primary">Delete</b-button>
          <b-button type="submit" @click="onClicked" variant="primary"
            >Create</b-button
          >
          <b-button id="btn-reset" type="reset" variant="danger"
            >Reset</b-button
          >
        </b-button-group>
      </div>
    </div>
  </div>
</template>

<script>
import NavbarAdmin from "@/components/NavbarAdmin.vue";
import axios from "axios";

export default {
  name: "ListAccount",
  values: {},
  data() {
    return {
      listAcc: [],
      acc: [],
      form: {
        id: null,
        email: "",
        jenis_akun: "",
        pass: "",
      },
      sortBy: "id",
      sortDesc: false,
      selectedId: {
        id: 0,
      },
      dummy: {
        email: "",
      },
      delData: {
        id: 0,
      },
      fields: [
        { key: "id", sortable: true },
        { key: "email", sortable: true },
        { key: "jenis_akun", sortable: true },
        { key: "password", sortable: true },
      ],
      types: ["number", "email", "text", "password"],
    };
  },
  components: {
    NavbarAdmin,
  },
  mounted() {
    this.getData();
  },
  methods: {
    getData() {
      axios
        .get(
          "http://localhost/API_JokiE-Commerce/api/data/account/ListAccount.php"
        )
        .then((response) => {
          this.listAcc = response.data;
          console.log(this.listAcc);
        });
    },
    onClicked() {
      console.log(this.form);
      axios
        .post(
          "http://localhost/API_JokiE-Commerce/api/data/account/CreateAccount.php",
          this.form
        )
        .then(() => {
          console.log("create data berhasil");
          this.getData();
        });
      axios
        .delete(
          "http://localhost/API_JokiE-Commerce/api/data/account/DeleteAccountBug.php",
          this.dummy
        )
        .then(() => {
          console.log("delete data berhasil");
          this.getData();
          this.onReset();
        });
    },
    onReset() {
      // Reset our form values
      this.form.email = "";
      this.form.pass = "";
      this.form.id = "";
      this.form.jenis_akun = "";
    },
    onDelete() {
      this.delData.id = this.form.id;
      console.log(this.delData);
      axios
        .post(
          "http://localhost/API_JokiE-Commerce/api/data/account/DeleteAccount.php",
          this.delData
        )
        .then(() => {
          console.log("delete data berhasil");
          this.getData();
          this.onReset();
        });
    },
    onUpdate() {
      axios
        .post(
          "http://localhost/API_JokiE-Commerce/api/data/account/UpdateAccount.php",
          this.form
        )
        .then(() => {
          console.log("update data berhasil");
          this.getData();
          this.onReset();
        });
    },
  },
};
</script>

<style scoped>
.container {
  margin-top: 15px;
}
.table {
  border: 2px;
  border-radius: 5px;
  border-style: solid;
}
.b {
  margin-top: 30px;
}
.row {
  margin-bottom: 50px;
}
.div2 {
  margin-top: 20px;
}
</style>