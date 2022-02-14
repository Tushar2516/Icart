<template>
  <div>
    <div class="left-block">
      <div class="content">
        <h5 class="section-titel">About Us</h5>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor,
          accusamus dolorum tempora laboriosam ipsum saepe neque minus nobis
          voluptatem aperiam nemo laborum. Labore, quisquam quae maxime velit
          ullam doloribus natus. Lorem ipsum, dolor sit amet consectetur
          adipisicing elit. Dolor, accusamus dolorum tempora laboriosam ipsum
          saepe neque minus nobis voluptatem aperiam nemo laborum. Labore,
          quisquam quae maxime velit ullam doloribus natus.
        </p>
      </div>
      <div class="image-block">
        <img :src="image" alt="img" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      image:
        "https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aHVtYW58ZW58MHx8MHx8&w=1000&q=80",
    };
  },
};
</script>

<style>
.section-titel {
  font-size: 64px;
}
.left-block {
  display: flex;
  align-items: center;
  overflow: hidden;
  max-width: 1200px;
  margin: 0 auto;
}
.left-block > * {
  flex: 1;
}
.image-block img {
  width: 100%;
  height: 515px;
  object-fit: cover;
}
</style>