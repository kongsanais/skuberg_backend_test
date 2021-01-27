<template>
  <div>
    <v-app-bar color="#ffff" light app>
      <v-app-bar-nav-icon
        
        
      ></v-app-bar-nav-icon>

      <v-img
        class="pa-1"
        @click="onClickGoHome"
        max-height="50"
        max-width="50"
         src="@/assets/coin.png"
        contain
      >
      </v-img>

      <v-spacer></v-spacer>

      <!-- <div  v-for="([title, route], index) in top_right_menu" :key="index">
        <v-btn  v-if="!$store.state.isLogged"  class="mr-2 d-none d-sm-flex" @click="onClickMenu(route)">
          {{ title }}
        </v-btn>
      </div>
       <v-btn v-if="$store.state.isLogged && ($store.state.role != 'Admin')"  class="ma-2" @click="onGoProfile()">Profile</v-btn>
      <v-icon v-if="$store.state.isLogged" class="mr-2">mdi-account-circle</v-icon>
      <span v-if="$store.state.isLogged" ><b>{{ $store.getters["username"]  | capitalize }}</b></span>
      <v-btn v-if="$store.state.isLogged && ($store.state.role != 'Admin')" icon @click="onClickLogOff">
        <v-icon>mdi-export</v-icon>
      </v-btn>
    <v-btn v-if="$store.state.isLogged && ($store.state.role == 'Admin')" icon @click="onClickLogOffAdmin">
        <v-icon>mdi-export</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn> -->
      <div>
        <v-icon>mdi-account</v-icon>
        <b class="ma-1">{{name}}</b>

        <v-icon class="ma-1" @click="Logout()">mdi-export</v-icon>
      </div>
    
    </v-app-bar>

  
  </div>
</template>
<script>
import Menu from "@/components/core/Menu";
export default {
      mounted() {
     this.user_id = localStorage.getItem('user_id');
     this.name = localStorage.getItem('name');
     },
  data: () => ({
    user_id:'',
    name :'',
    drawer: false,
    group: null,
    selectedMenu: 0,
    menus_user: [
      ["mdi-apps-box", "Home", "/home"],
      ["mdi-chart-areaspline", "Job Openings", "/job"],
      ["mdi-login-variant", "Login", "/login"],
      ["mdi-file-table-box-multiple-outline", "About", "/about"],
    ],
    menus_admin: [
      ["mdi-apps-box", "Admin Home", "/home"],
    ],
    top_right_menu: [
      ["Home", "/stock"],
      ["Job", "/option_job"],
      ["Contact", "/about"],
    ],
  }),
  watch: {
    group() {
      this.drawer = false;
    },
  },
  methods: {
    Logout(){
      this.name = "";
      this.$router.push("home").catch((err) => {});
      localStorage.clear();
    },
    onClickGoHome(link) {
      this.$router.push("home").catch((err) => {});
    },
    onClickMenu(link) {
      this.$router.push(link).catch((err) => {});
    },
    onClickLogOff() {
      this.$store.dispatch("doLogout");
    },
    onClickLogOffAdmin() {
      this.$store.dispatch("doLogoutAdmin");
    },
    onGoProfile(){
      this.$router.push("/profile").catch((err) => {});
    }
  },
};
</script>

<style scoped>
.v-list-item-group .v-list-item--active {
  color: #fff !important;
  font-weight: bold;
}
</style>
