<template>
  <div class="">
    <div
      class="productDetailsBg"
      :class="{ show: active }"
      @click="$emit('closeDetails')"
    />
    <div class="details-container" :class="{ show: active }">
      <span class="close" @click="$emit('closeDetails')">X</span>
      <div v-if="product" class="productDetails">
        <h5 class="title">{{ product.name }}</h5>
        <img :src="product.img" alt="Product image" class="cart_popup_image" />
        <p class="desc">{{ product.discription }}</p>
        <h6 class="show_price">
          Price of NFT: <span>{{ product.val }} $</span>
        </h6>
        <div class="keep-inside">
          <div class="cartTotal" v-if="productTotal">
            <h3>
              Total Items in cart:<span class="num-items"
                >{{ productTotal }}
              </span>
            </h3>
          </div>
          <div class="btns-overlap">
            <button class="remove-tocart" @click="removeItemFromCart()">
              -
            </button>
            <button class="add-tocart" @click="addItemInCart()">+</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["product", "active"],
  methods: {
    addItemInCart() {
      this.$store.commit("addItemInCart", this.product);
    },
    removeItemFromCart() {
      this.$store.commit("removeItemFromCart", this.product);
    },
  },
  computed: {
    productTotal() {
      return this.$store.getters.productQuantity(this.product);
    },
  },
};
</script>

<style>
.productDetailsBg {
  height: 100vh;
  width: 100vw;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #000;
  z-index: 100;
  transform: translateX(-100%);
  transition: 0.9s;
}
.productDetailsBg.show {
  transform: translateX(0);
}
.details-container {
  display: inline-block;
  position: fixed;
  top: 0;
  left: -100%;
  background: white;
  height: 100vh;
  width: calc(50vw);
  overflow-y: scroll;
  transition: 0.9s;
  z-index: 101;
  padding: 30px;
}
.details-container.show {
  inset: 50%;
  transform: translate(-50%, -50%);
}
.productDetails > *,
.cartTotal > * {
  text-align: center;
}
.productDetails .title {
  font-size: 48px;
  font-weight: 700;
}
.productDetails .cart_popup_image {
  height: 300px;
  width: 100%;
  object-fit: cover;
  margin: 15px 0;
}
.productDetails .desc {
  text-align: justify;
}
.show_price {
  display: flex;
  margin: 15px 0;
  font-size: 20px;
  line-height: 65px;
  justify-content: center;
  box-shadow: 0 0 15px 0 rgb(0 0 0 / 20%);
}
.cartTotal .num-items {
  margin: 0 10px;
}
.close {
  border: 1px solid #000;
  cursor: pointer;
  display: inline-block;
  position: absolute;
  top: 30px;
  padding: 12px;
  font-size: 16px;
  left: 0;
}
.btns-overlap {
  display: flex;
  justify-content: space-between;
}
.keep-inside {
  position: relative;
}
</style>