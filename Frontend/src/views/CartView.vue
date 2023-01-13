<template>
  <div>
    <div><NavigationBar /></div>
    <div>
      <div class="container">
        <div class="card mb-3" style="max-width: 1000px">
          <div class="row g-0">
            <div class="col-md-4">
              <img
                :src="game.file_foto"
                class="img-fluid rounded-start"
                alt="IMG"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{ game.judul }}</h5>
                <p class="card-text">
                  {{ game.deskripsi }}
                </p>
                <p class="card-text">
                  <a
                    @click="pesan"
                    href="#"
                    class="btn btn-primary"
                    v-on:submit.prevent
                    >Buy</a
                  >
                  <a> Rp {{ game.harga }}</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div><FooterComp /></div>
  </div>
</template>

<script>
import NavigationBar from "@/components/NavigationBar.vue";
import FooterComp from "@/components/FooterComp.vue";
import axios from "axios";
export default {
  name: "CartView",
  components: {
    NavigationBar,
    FooterComp,
  },
  data() {
    return {
      product: {},
      game: [],
      order: {
        email_akun: sessionStorage.getItem("account"),
        id_game: '',
        nama_game: '',
        harga_game: '',
      },
    };
  },
  mounted() {
    this.getData();
  },
  methods: {
    getData() {
      console.log(sessionStorage.getItem("account"));
      axios
        .get(
          "http://localhost/API_JokiE-Commerce/api/data/product/DetailCart.php?email_akun=" +
            sessionStorage.getItem("account")
        )
        .then((response) => {
          console.log(response.data);
          this.product=response.data;
          axios
            .get(
              "http://localhost/API_JokiE-Commerce/api/data/product/DetailProduct.php?id=" +
                response.data.id_game
            )
            .then((response) => {
              this.game = response.data;
              console.log(this.game);
            });
        });
    },
    pesan() {
      if (this.order.email_akun == null) {
        alert("You are not login yet.");
      } else {
        this.order.id_game=this.game.id;
        this.order.nama_game=this.game.judul;
        this.order.harga_game=this.game.harga;
        axios
          .post(
            "http://localhost/API_JokiE-Commerce/api/data/product/CreateOrder.php",
            this.order
          )
          .then(() => {
            alert("pesanan berhasil.");
            axios
              .post(
                "http://localhost/API_JokiE-Commerce/api/data/product/DeleteCart.php",
                this.product
              )
              .then(() => {
                alert("data cart dihapus.");
              });
          });
      }
    },
  },
};
</script>

<style>
</style>