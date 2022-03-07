<template>
  <div>
<<<<<<< HEAD
    <form @submit="signup">
=======
    <form @submit="signup" method="POST">
>>>>>>> 4679daf (third commit)
      <div class="sign-up">
        <div class="keep-togeather">
          <div class="input-wrapper">
            <label for="fname">First Name</label>
            <input type="text" name="fname" v-model="fname" />
          </div>
          <div class="input-wrapper">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" v-model="lname" />
          </div>
        </div>
        <div class="input-wrapper">
          <label for="email">Email</label>
          <input type="email" name="email" v-model="email" />
        </div>
        <div class="input-wrapper">
          <label for="pwd">Password</label>
          <input type="password" name="pwd" v-model="password" />
        </div>
        <!-- <div class="input-wrapper">
        <label for="pwd2">Re-Password</label>
        <input type="password" name="pwd2" />
      </div>-->
        <span class="i_agree">
          <input type="checkbox" name="checkBox" />
          <label for="checkBox"
            >I agree with
            <a href="javascript:void(0);">terms and condition</a></label
          >
        </span>
        <button @click="signup()" class="user-btn">Create account</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Signup",
  props: ["baseURL"],
  data() {
    return {
      fname: null,
      lname: null,
      email: null,
      password: null,
      userId: null,
    };
  },
  methods: {
<<<<<<< HEAD
    async signup() {
      //e.preventDefault();
=======
    async signup(e) {
      e.preventDefault();
>>>>>>> 4679daf (third commit)
      const user = {
        fname: this.fname,
        lname: this.lname,
        email: this.email,
        password: this.password,
      };

      axios
<<<<<<< HEAD
        .post(`http://localhost/API/api.php?request=5`, user)
        .then((response) => {
          this.userId = response.data;
          localStorage.setItem("userId", this.userId);
        })
        .catch(function (error) {
=======
        .post(`http://localhost/API/api.php?request=register`, user)
        .then((response) => {
          //alert(JSON.stringify(response));
          this.userId = response.register_user_id;
          localStorage.setItem("userId", this.userId);
        })
        .catch(function (error) {
          //alert("inside error block");
>>>>>>> 4679daf (third commit)
          console.log(error);
        });
    },
  },
};
</script>

<style>
.keep-togeather {
  display: flex;
}
</style>