<template>
  <div>
    <form @submit="signup">
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
    async signup() {
      //e.preventDefault();
      const user = {
        fname: this.fname,
        lname: this.lname,
        email: this.email,
        password: this.password,
      };

      axios
        .post(`http://localhost/API/api.php?request=5`, user)
        .then((response) => {
          this.userId = response.data;
          localStorage.setItem("userId", this.userId);
        })
        .catch(function (error) {
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