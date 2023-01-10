<template>
  <div>
    <NavigationBar />
    <MainPage />
    <Carousel />
  </div>
  
</template>

<script>
// @ is an alias to /src
import NavigationBar from "@/components/NavigationBar.vue";
import MainPage from "@/components/MainPage.vue";
import Carousel from "@/components/Carousel.vue";

export default {
  name: "HomeView",
  components: {
    NavigationBar,
    MainPage,
    Carousel,
  },
};
</script>
