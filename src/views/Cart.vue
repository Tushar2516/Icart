<template>
  <div>
    <span class="big-text">Cart</span>
    <div class="nx-container">
      <h1 class="py-45">Your Cart</h1>
      <div class="flex-it pad-130">
        <cart-item-cart
          v-for="product in items"
          :key="product.id"
          :product="product"
        />
        <cart-total :items="items" />
      </div>
    </div>
  </div>
</template>

<script>
import CartItemCart from "../components/cart/CartItemCard.vue";
import CartTotal from "../components/cart/CartTotal.vue";
export default {
  components: {
    CartItemCart,
    CartTotal,
  },
  computed: {
    items() {
      return this.$store.getters.cartItems;
    },
  },
};
</script>

<style>
.py-45 {
  padding: 45px 25px;
}
</style>