<template>
  <div>
    <NavigationBar />
    <CarouselComponent />
    <MainPage />
  </div>
  
</template>

<script>
// @ is an alias to /src
import NavigationBar from "@/components/NavigationBar.vue";
import MainPage from "@/components/MainPage.vue";
import CarouselComponent from "@/components/CarouselComponent.vue";

export default {
  name: "HomeView",
  components: {
    NavigationBar,
    MainPage,
    CarouselComponent,
  },
};
</script>
