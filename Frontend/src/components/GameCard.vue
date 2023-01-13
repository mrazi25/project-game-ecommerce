<template>
  <div class="container">
    <div class="card mb-3" style="max-width: 1000px">
      <div class="row g-0">
        <div class="col-md-4">
          <img
            :src="product.file_foto"
            class="img-fluid rounded-start"
            alt="GTA-V"
          />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ product.judul }}</h5>
            <p class="card-text">
            {{ product.deskripsi }}
            </p>
            <p class="card-text">
              <a @click="pesanan" href="#" class="btn btn-primary" v-on:submit.prevent>Add to Cart</a>  
              <a> Rp {{ product.harga }}</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "GameCard",
  props: ['product'],
  data() {
    return{
      cart:{},
      game:{
        email_akun: sessionStorage.getItem('account'),
        id_game:null,
      },
    }
  },
  methods:{
    pesanan(){
      this.cart = this.product; 
      this.game.id_game=this.cart.id;
      console.log(this.game);
      axios
        .post("http://localhost/API_JokiE-Commerce/api/data/product/CreateCart.php", this.game)
        .then(() => {
        });
    },
    getData(){
      axios
        .get("http://localhost/API_JokiE-Commerce/api/data/product/DetailProduct.php?id=" + this.$route.params.id)
        .then((response) => {
          this.game = response.data;
          console.log(this.game);
        });
    }
  }  
};
</script>

<style>
#cardgame{
  display:block;
  width:700px
  
}

</style>