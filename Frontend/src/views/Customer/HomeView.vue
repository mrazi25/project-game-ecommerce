<template>
  <div>
    <NavigationBar />
    <CarouselComp />
    <MainPage />
    <FooterComp />
  </div>
  
</template>

<script>
// @ is an alias to /src
import NavigationBar from "@/components/NavigationBar.vue";
import MainPage from "@/components/MainPage.vue";
import CarouselComp from "@/components/CarouselComp.vue";
import FooterComp from "@/components/FooterComp.vue";

export default {
  name: "HomeView",
  components: {
    NavigationBar,
    MainPage,
    CarouselComp,
    FooterComp,
  },
};
</script>
