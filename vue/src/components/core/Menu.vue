<template>
  <v-navigation-drawer app dark color="#1969C1"  >
    <router-link to="/" exact>
      <v-img src="@/assets/tsc-icon.png" width="260px" />
    </router-link>
    <v-list>
      <v-list-item-group v-model="selectedMenu" mandatory color="primary">
        <v-subheader>MENUS</v-subheader>
        <v-list-item
         class="tile"
          v-for="([icon, title, route], index) in menus"
          :key="index"
          @click="onClickMenu(route)"
        >
          <v-list-item-icon>
            <v-icon>{{ icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
  
</template>

<script>
export default {
  name: "Menu",
  props: [],
  data() {
    return {
      selectedMenu: 0,
      menus: [
        ["mdi-apps-box", "Home", "/stock"],
        ["mdi-chart-areaspline", "Job Openings", "/job"],
        ["mdi-file-table-box-multiple-outline", "About", "/about"],
      ],
    };
  },
  mounted() {
    this.selectedMenu = this.menus.findIndex(
      menu => menu[2] == this.$route.path
    );
  },
  methods: {
    onClickMenu(link) {
      this.$router.push(link).catch((err) => {});
    },
  },
  watch: {
    $route(to, from) {
      this.selectedMenu = this.menus.findIndex((menu) => menu[2] == to.path);
    },
  },
};
</script>

<style scoped>

.v-list-item-group .v-list-item--active{
  color: #fff !important;
  font-weight: bold;
}


/* .tile:hover {
  background: green;
} */

/* .tile:active {
  background: #05ab71;
} */
</style>
