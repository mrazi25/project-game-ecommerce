<template>
  <b-navbar toggleable type="dark" variant="dark">
    <b-navbar-brand href="#">Admin</b-navbar-brand>

    <b-navbar-toggle target="navbar-toggle-collapse">
      <template #default="{ expanded }">
        <b-icon v-if="expanded" icon="chevron-bar-up"></b-icon>
        <b-icon v-else icon="chevron-bar-down"></b-icon>
      </template>
    </b-navbar-toggle>

    <b-collapse id="navbar-toggle-collapse" is-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item href="/ListAccount">List Account</b-nav-item>
        <b-nav-item href="/ListProduct">List Product</b-nav-item>
        <b-nav-item href="/ListOrder">List Order</b-nav-item>
        <b-nav-item href="/EditProduct">Edit Product</b-nav-item>
        <a @click="clicked" href="/"
            >Logout</a
          >
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
export default {
  name: "NavbarAdmin",
  methods: {
    clicked() {
      sessionStorage.removeItem("account");
    },
  },
};
</script>

<style>
</style>