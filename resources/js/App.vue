<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>

<style>
nav {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

router-link {
  text-decoration: none;
  color: blue;
}

router-link:hover {
  text-decoration: underline;
}
</style>
