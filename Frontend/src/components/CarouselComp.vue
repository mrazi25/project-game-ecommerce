<template>
  <div class="container">
    <b-carousel
      controls
      indicators
      :interval="3000"
      v-model="slide"
    >
     <b-carousel-slide>
        <template v-slot:img>
          <img
            class="d-block img-fluid w-100"
            width="300"
            height="150"
            src="../assets/valorant-poster.jpeg"
          />
        </template>
      </b-carousel-slide>
      <b-carousel-slide>
        <template v-slot:img>
          <img
            class="d-block img-fluid w-100"
            width="300"
            height="150"
            src="../assets/gtav-poster.jpeg"
          />
        </template>
      </b-carousel-slide>
     
    </b-carousel>
  </div>
</template>

<script>
export default {
  name: "CarouselComp",

  data() {
    return {
      slide: 3,
    };
  },

  methods: {},
};
</script>

<style scoped>
.container{
    margin-top: 60px;
}
</style>