<template>
  <div>
    <NavbarAdmin />
    <div class="container">
      <b-table
        :items="listProduct"
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
            >
              <b-form-input
                id="input-2"
                v-model="form.judul"
                placeholder="NAMA GAME"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group>
              <b-form-input
                id="input-3"
                v-model="form.harga"
                placeholder="HARGA GAME"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group>
              <b-form-input
                id="input-4"
                v-model="form.file_foto"
                placeholder="FILE FOTO"
                required
              ></b-form-input>
            </b-form-group>
            <b-form-group>
              <b-form-input
                id="input-5"
                v-model="form.terjual"
                placeholder="TERJUAL"
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
  name: "ListProduct",
  values: {},
  data() {
    return {
      listProduct: [],
      acc: [],
      form: {
        id: null,
        judul: "",
        harga:'',
        terjual: "",
        file_foto: "",
      },
      sortBy: "id",
      sortDesc: false,
      selectedId: {
        id: 0,
      },
      dummy: {
        judul: "",
      },
      delData: {
        id: 0,
      },
      createGame:{
        id: null,
        judul: "",
        harga:'',
        developer:'',
        terjual: "",
        file_foto: "",
        deskripsi:'',
      },
      fields: [
        { key: "id", sortable: true },
        { key: "judul", sortable: true },
        { key: "harga", sortable: true },
        { key: "developer", sortable: true },
        { key: "terjual", sortable: true },
        { key: "file_foto", sortable: true },
      ],
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
          "http://localhost/API_JokiE-Commerce/api/data/product/ListProduct.php"
        )
        .then((response) => {
          this.listProduct = response.data;
          console.log(this.listProduct);
        });
    },
    onClicked() {
      console.log(this.form);
      this.createGame.judul=this.form.judul;
      this.createGame.harga=this.form.harga;
      this.createGame.terjual=this.form.terjual;
      this.createGame.file_foto=this.form.file_foto;
      axios
        .post(
          "http://localhost/API_JokiE-Commerce/api/data/product/CreateProduct.php",
          this.createGame
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
      this.form.id = "";
      this.form.judul = "";
      this.form.harga = "";
      this.form.terjual = "";
      this.form.file_foto = "";
    },
    onDelete() {
      this.delData.id = this.form.id;
      console.log(this.delData);
      axios
        .post(
          "http://localhost/API_JokiE-Commerce/api/data/product/DeleteProduct.php",
          this.delData
        )
        .then(() => {
          console.log("delete data berhasil");
          this.getData();
          this.onReset();
        });
    },
    onUpdate() {
      this.createGame.judul=this.form.judul;
      this.createGame.harga=this.form.harga;
      this.createGame.terjual=this.form.terjual;
      this.createGame.file_foto=this.form.file_foto;
      axios
        .post(
          "http://localhost/API_JokiE-Commerce/api/data/product/UpdateProduct.php",
          this.createGame
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