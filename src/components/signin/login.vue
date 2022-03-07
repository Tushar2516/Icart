
<template>
  <div>
    <form @submit="login" method="POST">
    <div class="input-wrapper">
      <label for="email">Email</label>
      <input type="email" name="email" v-model="email"/>
    </div>
    <div class="input-wrapper">
      <label for="pwd">Password</label>
      <input type="password" name="password" v-model="password"/>
    </div>
    <div class="link"><a href="javascript:void(0);">Forget password</a></div>
    <button class="user-btn" @click="login()">Login</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Login",
  props: ["baseURL"],
  data() {
    return {
      email: null,
      password: null,
    };
  },
  methods: {
    async login(e) {
      e.preventDefault();
      const user = {
        email: this.email,
        password: this.password,
      };

      axios
        .post(`http://localhost/API/api.php?request=login`, user)
        .then((response) => {
          //alert(JSON.stringify(response));
          this.userId = response.login_user_id;
          //localStorage.setItem("userId", this.userId);
         this.$router.push("/");
        })
        .catch(function (error) {
          //alert("inside error block");
          console.log(error);
        });
    },
  },
};
</script>

<style>
.input-wrapper {
  display: flex;
  flex-direction: column;
  position: relative;
  border: solid #acacac;
  border-width: 0 0 1px;
  margin-bottom: 15px;
  background: #fff;
}
.input-wrapper input {
  border: 0px;
  font-size: 26px;
  line-height: 40px;
}
.input-wrapper input:focus,
.input-wrapper input:active,
.input-wrapper input:focus-visible {
  border-color: #3a0ca3;
  outline: none;
}
</style>