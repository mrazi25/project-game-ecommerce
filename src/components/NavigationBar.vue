<template>
  <div>
    <div>
      <div id="site-content">
        <div class="site-header">
          <div class="container">
            <a href="index.html" id="branding">
              <a class="navbar-brand" href="#"
                ><img
                  src="../assets/Joki.png"
                  alt="Logo"
                  width="60"
                  height="70"
                  class="d-inline-block align-text-center"
              /></a>
              <div class="logo-text">
                <h1 class="site-title">Joki</h1>
                <small class="site-description">Game murah, sini aja</small>
              </div>
            </a>
            <!-- #branding -->

            <div class="login-section" v-if="email==='' || email===null" align="right">
              <router-link class="login-button" to="/RegisterPage"
                >Login/Register</router-link
              >
            </div>
            <div class="login-section" v-if="email!==null" align="right">
              <a @click="clicked" class="login-button" href="/"
                >Logout</a
              >
            </div>
            <!-- .right-section -->
          </div>
          <!-- .container -->
          <div class="container-navbar">
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div
                  class="collapse navbar-collapse"
                  id="navbarSupportedContent"
                >
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <router-link class="nav-link" to="/"
                        ><b-icon-house-door></b-icon-house-door>
                        Home</router-link
                      >
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/GameCollections"
                        >Games</router-link
                      >
                    </li>
                  </ul>
                  <ul class="navbar-nav ml-auto mb-2 mb-lg-0" v-if="email!==null">
                    <li class="nav-item">
                      <router-link class="nav-link" to="/CartView">
                        Cart <b-icon-cart4></b-icon-cart4
                      ></router-link>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
        <!-- .site-header -->
      </div>
    </div>
    <div></div>
  </div>
</template>

<script>
export default {
  name: "NavigationBar",
  data() {
    return {
      email: sessionStorage.getItem('account')
    };
  },
  methods: {
    clicked(){
      console.log(this.email)
      sessionStorage.removeItem('account');
    }
  }
};
</script>

<style>
</style>

