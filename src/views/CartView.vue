<template>
  <div>
    <NavigationBar />
    <div class="row">
      <div class="col">
        <h2>Keranjang <strong>Saya</strong></h2>
        <div class="table-responsive mt-3">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">foto</th>
                <th scope="col">Makanan</th>
                <th scope="col">Harga</th>
                <th scope="col">Hapus</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="(cartview, index) in cartview" :key="cartview.id">
                  <th>{{index+1}}</th>
                  <td>
                    <img
                      :src=" '../assets/GTAV.jpg'"
                      class="img-fluid shadow"
                      width="250"
                    />
                  </td>
                  <td>
                    <strong>{{ "" }}</strong>
                  </td>
                  <td align="right">Rp. {{ 800000 }}</td>
                  <td align="center" class="text-danger">
                    <b-icon-trash @click="hapusKeranjang(cartview.id)"></b-icon-trash>
                  </td>
                </tr>

                <tr>
                  <td colspan="3" align="right">
                    <strong>Total Harga :</strong>
                  </td>
                  <td align="right">
                    <strong>Rp. {{ totalHarga }}</strong>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavigationBar from "@/components/NavigationBar.vue";
import axios from "axios";
export default {
  name: "CartView",
  components: {
    NavigationBar,
  },
  data() {
    return {
        cartview: [],
        pesan: {},
    };
  },
  methods: {
    setCartView(data) {
        this.cartview = data;
    },
    hapusKeranjang(id) {
      axios
        .delete("http://localhost/API_JokiE-Commerce/api/data/ListProduct.php" + id)
        .then(() => {
          this.$toast.error("Sukses Hapus Keranjang", {
            type: "error",
            position: "top-right",
            duration: 3000,
            dismissible: true,
          });
          // Update Data keranjang
          axios
            .get("http://localhost/API_JokiE-Commerce/api/data/ListAccount.php")
            .then((response) => this.setKeranjangs(response.data))
            .catch((error) => console.log(error));
        })
        .catch((error) => console.log(error));
    },
    checkout() {
      if (this.pesan.nama && this.pesan.noMeja) {
        this.pesan.keranjangs = this.keranjangs;
        axios
          .post("http://localhost/API_JokiE-Commerce/api/data/ListAccount.php", this.pesan)
          .then(() => {
            // Hapus Semua Keranjang 
            this.keranjangs.map(function (item) {
              return axios
                .delete("http://localhost/API_JokiE-Commerce/api/data/ListAccount.php" + item.id)
                .catch((error) => console.log(error));
            });
            this.$router.push({ path: "/pesanan-sukses" });
            this.$toast.success("Sukses Dipesan", {
              type: "success",
              position: "top-right",
              duration: 3000,
              dismissible: true,
            });
          })
          .catch((err) => console.log(err));
      } else {
        this.$toast.error("Nama dan Nomor Meja Harus diisi", {
          type: "error",
          position: "top-right",
          duration: 3000,
          dismissible: true,
        });
      }
    },
  },

  mounted() {
    axios
        .get("http://localhost/API_JokiE-Commerce/api/data/ListAccount.php" + this.route.params.id)
        .then((response) => this.setCartView(response.data))
        .catch((error) => console.log(error));
  },
};
</script>

<style>
</style>