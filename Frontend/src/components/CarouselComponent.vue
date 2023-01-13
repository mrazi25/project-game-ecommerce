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
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/gtav.png" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/Valorant.png" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/efootball.png" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="1000" height="1000" src="../assets/mineecraft.png" />
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