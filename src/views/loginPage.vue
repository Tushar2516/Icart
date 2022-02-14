<template>
  <div>
    <span class="big-text">I-Cart</span>
    <div class="nx-container py-102">
      <h1 class="py-45 px-0">Welcome to I-Cart</h1>
      <div class="flex-wrapper">
        <login></login>
        <signup></signup>
      </div>
    </div>
  </div>
</template>

<script>
import Login from "../components/signin/login.vue";
import Signup from "../components/signin/signup.vue";
export default {
  components: {
    Login,
    Signup,
  },
};
</script>

<style>
.py-45 {
  padding: 45px 25px;
}
.px-0 {
  padding-left: 0;
  padding-right: 0;
}
.py-102 {
  padding: 102px 0;
}
.flex-wrapper {
  display: flex;
  flex: 1 0 calc(100% / 2);
  padding: 0 15px;
}
.flex-wrapper > *:first-child {
  margin-right: 15px;
  padding-right: 15px;
  border-right: 1px solid #c7c7c7;
}
.flex-wrapper > div {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.user-btn {
  text-align: center;
  padding: 12px;
  border: 2px solid #3a0ca3;
  font-size: 22px;
  line-height: 28px;
  background: #fff;
  font-weight: 500;
  cursor: pointer;
  display: flex;
  justify-content: center;
  color: #3a0ca3;
  width: 100%;
  transition: 0.5s;
}
.user-btn:hover {
  color: #fff;
  background: #3a0ca3;
}

.flex-wrapper > *:first-child,
.flex-wrapper > *:nth-child(2) {
  transition: 0.5s;
}
.flex-wrapper:hover > *:first-child {
  filter: blur(5px);
}
.flex-wrapper:hover > *:nth-child(2) {
  filter: blur(5px);
}
.flex-wrapper:hover > *:first-child:hover {
  filter: blur(0px);
}
.flex-wrapper:hover > *:nth-child(2):hover {
  filter: blur(0px);
}
</style>