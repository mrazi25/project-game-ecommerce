<template>
  <div>
    <LoggedNavigationBar />
    <MainPage />
  </div>
</template>

<script>
// @ is an alias to /src
import LoggedNavigationBar from "@/components/LoggedNavBar.vue";
import MainPage from "@/components/MainPage.vue";

export default {
  name: "LoggedHomeView",
  components: {
    LoggedNavigationBar,
    MainPage,
  },
};
</script>