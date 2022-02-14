<template>
  <div class="product-item">
    <img :src="product.img" alt="Product image" />
    <div class="product-content">
      <div class="product-head">
        <div class="left">
          <h6 class="product-title">{{ product.name }}</h6>
          <span
            >By<span class="owner">{{ product.owner }}</span></span
          >
        </div>
      </div>
      <div class="product-footer">
        <div class="price">
          <span>Price</span>
          <span class="val">{{ product.val }}</span>
        </div>
        <div class="btns">
          <button class="explore" @click="$emit('explore', product)">
            Explore
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["product"],
};
</script>

<style>
.product-item {
  position: relative;
  box-shadow: 0 1px 10px rgb(24 24 24 / 7%);
  flex: 1 0 calc(100% / 3 - 60px);
}

.product-item img {
  height: 245px;
  width: 100%;
  object-fit: cover;
  transition: 0.5s;
}
.pad-130:hover .product-item img {
  filter: brightness(50%);
}
.pad-130:hover .product-item:hover img {
  filter: brightness(100%);
}
.product-item .product-content {
  padding: 15px;
}
.product-item .product-content .product-head {
  margin-bottom: 15px;
  text-align: initial;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.product-item .product-content .product-title {
  font-size: 18px;
}
.product-item .product-content .product-head span,
.product-item .product-content .product-footer .price {
  color: #c5c5c5;
  font-size: 14px;
}
.product-item .product-content .product-head .owner,
.product-item .product-content .product-footer .val {
  color: #000;
  font-size: 16px;
  margin-left: 5px;
}
.product-item .product-content .product-footer .val {
  margin-left: 0;
  font-weight: 700;
  position: relative;
}
.product-item .product-content .product-footer .val::before {
  content: "$";
}
.product-item .product-content .product-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.product-item .product-content .product-footer .price {
  display: flex;
  flex-direction: column;
}
.add-tocart,
.remove-tocart,
.explore {
  background-color: #fff;
  border: 1.5px solid #000;
  color: #000;
  text-decoration: none;
  padding: 0px 10px;
  font-size: 20px;
  transition: 0.5s;
  line-height: 30px;
}
.add-tocart:hover,
.remove-tocart:hover {
  color: #fff;
  background-color: #000;
  cursor: pointer;
}
.explore {
  border-color: #00003f;
  color: #00003f;
  cursor: pointer;
  font-size: 16px;
  padding: 0 16.5px;
}
.explore:hover {
  background-color: #00003f;
  color: #fff;
}
.btns {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 90px;
}
</style>