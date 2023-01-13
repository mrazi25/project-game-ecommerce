<template>
  <div>
    <NavigationBar />
    <div class="c text-align-justify" v-for="product in products" :key="product.id">
    <GameCard :product="product"/>
    </div>
    
    <FooterComp />
  </div>
</template>

<script>
import NavigationBar from "@/components/NavigationBar.vue";
import GameCard from "@/components/GameCard.vue";
import FooterComp from "@/components/FooterComp.vue";
import axios from 'axios';
export default {
  name: 'GameCollections',
  data() {
    return {
      products:[],
    }
  },
  components: {
    NavigationBar,
    GameCard,
    FooterComp,
  },
  mounted(){
    this.getData();
  },
  methods: {
    getData(){
      axios
        .get("http://localhost/API_JokiE-Commerce/api/data/product/ListProduct.php")
        .then((response) => {
          this.products = response.data;
          console.log(this.products);
        });
    }
  }

};
</script>

<style>
.c{
  margin-top: 20px;
  margin-bottom: 20px;
}
</style>