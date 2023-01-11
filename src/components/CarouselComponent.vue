<template>
    <b-container>

        <hr />

        <b-carousel
            controls
            indicators
            img-width="1000"
            img-height="1000"
            :interval="3000"
            v-model="slide"
        >
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/GTAV.jpg" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/valorant.jpg" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/EFootball23.png" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/minecraft.png" />
                </template>
            </b-carousel-slide>
        </b-carousel>

    </b-container>
</template>

<script>
export default {
  name: 'CarouselComponent',

  data () {
    return {
        slide: 3
    }
  },

  methods: {
  }
}
</script>

<style>
.d-block {
    width: 500px;
    height: 500px;
}
</style>