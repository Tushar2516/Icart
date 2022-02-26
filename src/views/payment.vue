<template>
  <div class="home">
    <span class="big-text">Order</span>
    <div class="nx-container">
      <h1 class="py-45 spacer">place your order</h1>
      <div class="input-wrapper">
        <label for="name">Name</label>
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
};
</script>

<style>
</style>