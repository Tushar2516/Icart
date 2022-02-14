<template>
  <div class="cart-card">
    <img :src="product.img" alt="Product image" class="cart_popup_image" />
    <h5>{{ product.name }}</h5>
    <div class="qnt">
      <span>Quantity</span> <span>{{ product.quantity }}</span>
    </div>
    <div class="cost">
      <span>Total Cost:</span><span>{{ itemCost.toFixed(2) }}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["product"],
  computed: {
    itemCost() {
      return this.product.val * this.product.quantity;
    },
  },
};
</script>

<style>
.cart-card {
  flex: 1 0 calc(100% / 4 - 15px);
  padding: 20px;
  border: 1px solid #3a0ca3;
  transition: all linear 0.3s;
}
.cart-card:hover {
  border: 1px solid transparent;
  box-shadow: 0 0 15px 0px #3a0ca34f;
}
.cart-card .cart_popup_image {
  height: 250px;
  width: 100%;
  object-fit: cover;
}
.cart-card h5 {
  text-transform: uppercase;
  font-size: 20px;
}
.cart-card .qnt {
  font-size: 18px;
  font-weight: 400;
  line-height: 26px;
  display: flex;
  justify-content: space-between;
}
.cart-card .cost {
  display: flex;
  justify-content: space-between;
  border-top: 1px solid #7b7b7b;
  margin-top: 5px;
  padding-top: 5px;
}
</style>