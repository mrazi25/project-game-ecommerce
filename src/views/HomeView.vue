<template>
  <div>
    <NavigationBar />
    <MainPage />
  </div>
</template>

<script>
// @ is an alias to /src
import NavigationBar from "@/components/NavigationBar.vue";
import MainPage from "@/components/MainPage.vue";

export default {
  name: "HomeView",
  components: {
    NavigationBar,
    MainPage,
  },
};
</script>
