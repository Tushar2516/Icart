<template>
  <div id="nav">
    <div class="left">
      <router-link to="/">Home</router-link>
      <router-link to="/about">About</router-link>
      <router-link to="/cart">Cart</router-link>
    </div>
    <div class="right">
      <router-link to="/getUser" class="btn-user">Login / Sign Up</router-link>
    </div>
  </div>
  <router-view />
  <Footer></Footer>
</template>

<script>
import Footer from "./components/footer/footer.vue";

export default {
  components: {
    Footer,
  },
  mounted() {
    this.$store.commit("updateCartFromLocalStorage");
  },
};
</script>

<style>
#app {
  font-family: Jost, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
  background: #3a0ca3;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

#nav a {
  font-weight: bold;
  color: #4cc9f0;
  margin: 0 5px;
}

#nav a.router-link-exact-active {
  color: #fa65a8;
}
a.btn-user {
  border: 1px solid #fa65a8;
  background: #fff;
  text-decoration: none;
  padding: 5px;
  color: #3a0ca3 !important;
}
a.btn-user.router-link-exact-active {
  background: #fa65a8;
  color: #fff !important;
  border-color: 2px solid #fff;
}
</style>
