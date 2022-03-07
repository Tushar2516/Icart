<template>
  <div class="total">
<<<<<<< HEAD
    <input type="submit" value="Pay Now" @click="payMent" class="pay-btn" />
=======
    <input type="submit" value="Place Order" @click="payMent" class="pay-btn" />
>>>>>>> 4679daf (third commit)
  </div>
</template>

<script>
export default {
  methods: {
    payMent() {
      this.$router.replace("/payment");
    },
  },
};
</script>

<style>
.total {
  display: block;
  width: 100%;
}
.pay-btn {
  background: #fff;
  border: 1px solid #3a0ca3;
  color: #3a0ca3;
  text-align: center;
  width: 100%;
  padding: 20px;
  font-size: 24px;
  font-weight: 700;
  cursor: pointer;
  transition: 0.5s;
}
.pay-btn:hover {
  background: #3a0ca3;
  color: #fff;
}
</style>