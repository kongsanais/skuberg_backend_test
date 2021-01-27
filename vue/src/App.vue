<template>
  <v-app>
    <Header/>
    <!-- <Menu /> -->
    <Content />
    <Footer />
  </v-app>
</template>

<script>
import Header from "@/components/core/Header";
//import Menu from "@/components/core/Menu";
import Content from "@/components/core/Content";
import Footer from "@/components/core/Footer";

export default {
  name: "App",
  components: {
    Header,
    //Menu,
    Content,
    Footer
  },
  mounted() {
    // this.$store.dispatch({ type: "restoreLogin" });
  },
};
</script>
<style></style>
