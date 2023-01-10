<template>
  <div>
    <NavigationBar />
    <GameCard />
  </div>
</template>

<script>
import NavigationBar from "@/components/NavigationBar.vue";
import GameCard from "@/components/GameCard.vue";

export default {
  name: 'GameCollections',
  components: {
    NavigationBar,
    GameCard,
  },
};
</script>

<style>

</style>