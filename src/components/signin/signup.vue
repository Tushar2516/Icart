<template>
  <div>
    <div class="sign-up">
      <div class="input-wrapper">
        <label for="email">Email</label>
        <input type="email" name="email" />
      </div>
      <div class="input-wrapper">
        <label for="pwd">Password</label>
        <input type="password" name="pwd" />
      </div>
      <div class="input-wrapper">
        <label for="pwd2">Re-Password</label>
        <input type="password" name="pwd2" />
      </div>
      <span class="i_agree">
        <input type="checkbox" name="checkBox" />
        <label for="checkBox"
          >I agree with
          <a href="javascript:void(0);">terms and condition</a></label
        >
      </span>
      <button class="user-btn">Create account</button>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>