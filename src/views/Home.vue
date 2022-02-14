<template>
  <div class="home">
    <span class="big-text">NFT</span>
    <div class="nx-container">
      <h1 class="py-45 spacer">
        Get NFT
        <div class="filters">
          <button
            :class="{ active: isActiveAc, sortas: true }"
            @click="sortUp(), setFalse(1)"
          >
            Price low to Hight
          </button>
          <button
            :class="{ active: isActiveDc, sortas: true }"
            @click="sortDown(), setFalse(2)"
          >
            Price Hight to Low
          </button>
        </div>
      </h1>
      <div class="flex-it pad-130">
        <product-details
          :product="product"
          :active="active.product_detail"
          v-on:closeDetails="closeDetails()"
        ></product-details>
        <product-summary-container
          v-for="product in items"
          :key="product.id"
          :product="product"
          v-on:explore="viewProduct($event)"
        ></product-summary-container>
      </div>
    </div>
  </div>
</template>

<script>
import ProductSummaryContainer from "../components/products/ProductSummaryContainer.vue";
import ProductDetails from "../components/products/ProductDetails.vue";

import items from "../data/items";

export default {
  name: "Home",
  components: { ProductSummaryContainer, ProductDetails },
  data() {
    return {
      items: items,
      product: null,
      active: {
        product_detail: false,
      },
      isActiveAc: false,
      isActiveDc: false,
    };
  },
  methods: {
    viewProduct(product) {
      this.product = product;
      this.active.product_detail = true;
      console.log(product);
    },
    closeDetails() {
      this.active.product_detail = false;
    },
    sortUp() {
      return this.items.sort((a, b) => parseFloat(a.val) - parseFloat(b.val));
    },
    sortDown() {
      return this.items.sort((a, b) => parseFloat(b.val) - parseFloat(a.val));
    },
    setFalse(c) {
      if (c == 1) {
        this.isActiveAc = true;
        this.isActiveDc = !this.isActiveAc;
      } else if (c == 2) {
        this.isActiveDc = true;
        this.isActiveAc = !this.isActiveDc;
      }
    },
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
  text-align: initial;
}
.nx-container {
  max-width: 1200px;
  overflow-x: hidden;
  overflow-y: auto;
  margin: 0 auto;
}
.flex-it {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}
.pad-130 {
  padding: 0px 15px 130px;
}
.big-text {
  font-family: "Poppins";
  font-size: 16em;
  text-transform: uppercase;
  font-weight: 800;
  position: absolute;
  top: 0;
  right: 0;
  z-index: -6;
  -webkit-text-fill-color: transparent;
  -webkit-text-stroke-width: 0.3px;
}
#app {
  position: relative;
}
.sortas {
  border: 1px solid #3a0ca3;
  background: #fff;
  color: #3a0ca3;
  padding: 4px;
  font-size: 20px;
  text-transform: capitalize;
  transition: 0.5s;
}
.sortas:hover,
.sortas.active {
  color: #fff;
  background: #3a0ca3;
}
.filters {
  display: flex;
  gap: 5px;
}
.spacer {
  display: flex;
  justify-content: space-between;
}
</style>