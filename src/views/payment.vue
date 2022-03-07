<template>
<<<<<<< HEAD
=======
  <form @submit="order" method="POST">
>>>>>>> 4679daf (third commit)
  <div class="home">
    <span class="big-text">Order</span>
    <div class="nx-container">
      <h1 class="py-45 spacer">place your order</h1>
      <div class="input-wrapper">
        <label for="name">Name</label>
<<<<<<< HEAD
        <input type="text" name="name" required />
      </div>
      <div class="input-wrapper">
        <label for="address">address</label>
        <input type="text" name="address" required />
      </div>
      <div class="input-wrapper">
        <label for="telm">Mobile number</label>
        <input type="tel" name="telm" required />
      </div>
      <button class="user-btn">Place Order</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "payment",
=======
        <input type="text" name="name" required  v-model="name" />
      </div>
      
      <div class="input-wrapper">
        <label for="telm">Mobile number</label>
        <input type="tel" name="telm" required  v-model="mobile"/>
      </div>
      <div class="input-wrapper">
        <label for="address">address</label>
        <input type="text" name="address" required  v-model="address"/>
      </div>
      <button @click="order()" class="user-btn">Order</button>
    </div>
  </div>
</form>
</template>

<script>
import axios from "axios";

export default {
  name: "Order",
  props: ["baseURL"],
  data() {
    return {
      name: null,
      mobile: null,
      address: null,
      userId: null,
      orderId: null,
    };
  },
  methods: {
    //var userId = localStorage.getItem("userId");
    async order(e) {
      e.preventDefault();
      const user = {
        name: this.name,
        mobile: this.mobile,
        address: this.address,
        userId: 1
        
      };
      alert(JSON.stringify(user));
      axios
        .post(`http://localhost/API/api.php?request=4`, user)
        .then((response) => {
          alert(JSON.stringify(response));
          this.orderId = response.insert_order_id;
          this.$router.push("/");
        })
        .catch(function (error) {
          //alert("inside error block");
          console.log(error);
        });
    },
  },
>>>>>>> 4679daf (third commit)
};
</script>

<style>
</style>