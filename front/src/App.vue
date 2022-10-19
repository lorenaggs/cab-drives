<template>
  <Header />
  <Assignations />
  <VehiclesDrives/>
</template>

<script>
import Header from "./components/Header.vue";
import Assignations from "./components/Assignations";
import VehiclesDrives from "./components/VehiclesDrives"
export default {
  name: "App",
  components: {
    Header,
    Assignations,
    VehiclesDrives
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  background: #cb9a9a;
}
</style>
