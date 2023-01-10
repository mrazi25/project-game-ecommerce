<template>
    <b-container>

        <code>no-animation</code>&nbsp;
        <code>fade</code>

        <hr />

        <b-carousel
            controls
            indicators
            img-width="300"
            img-height="150"
            :interval="3000"
            v-model="slide"
        >
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" src="../assets/valorant.png" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide img-src="../assets/valorant.png">
                <h1>Hello World!</h1>
            </b-carousel-slide>
            <b-carousel-slide>
                <template v-slot:img>
                    <img class="d-block img-fluid w-100" width="300" height="150" src="../assets/GTAV.png" />
                </template>
            </b-carousel-slide>
            <b-carousel-slide caption="Blank image" img-blank style="background: lightskyblue;">
                <p>
                    My custom slide whitout eny image here!
                </p>
            </b-carousel-slide>
            <b-carousel-slide img-src="../assets/GTAV.png"></b-carousel-slide>
        </b-carousel>

    </b-container>
</template>

<script>
export default {
  name: 'Carousel',

  data () {
    return {
        slide: 3
    }
  },

  methods: {
  }
}
</script>