<template>
  <v-container>
    <v-row class="justify-center">
      <v-card style="width:400px;" class="mt-8">


          <v-card-title primary-title>
            Register
          </v-card-title>
       
       
        <v-card-text>
          <v-form
            @submit.prevent="submit"
            ref="form"
            
            lazy-validation
          >
<!-- v-model="valid" -->
             <!-- Name -->
            <v-text-field
              name="email"
              label="Name"
              id="email"
              v-model="register_user.name"
            />


            <!-- Username -->
            <v-text-field
              name="email"
              label="Email"
              id="email"
              v-model="register_user.email"
            />


            <!-- Password -->
            <v-text-field
              name="password"
              label="Password"
              id="password"
              v-model="register_user.password"
             :append-icon="isShowPassword ? 'visibility' : 'visibility_off'"
              @click:append="isShowPassword = !isShowPassword"
              :type="isShowPassword ? 'text' : 'password'"
              :rules="[(v1) => !!v1 || 'Password is required']"
            />

            <v-row class="justify-space-between px-3 pt-4">
              <!-- <v-btn
                class="mt-2"
                @click.prevent="$router.push('/register_engineer')"
                color="indigo"
                dark
                >Register</v-btn
              > -->
              <v-btn type="submit" color="success" class="mt-2">Register</v-btn>
            </v-row>

          </v-form>
        </v-card-text>
      </v-card>
    </v-row>

    <v-dialog
      v-model="dialog"
      max-width="290"
    >
      <v-card>
        <v-card-title class="headline">
         Message
        </v-card-title>

        <v-card-text>
          {{dialog_text}}
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            small
            color="error"
            @click="dialog = false"
          >
            Disagree
          </v-btn>

          <v-btn
            small
            color="success"
            @click="go_next()"
          >
            Agree
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>


  </v-container>
</template>



<script>
import api from "@/services/api";
export default {
  async mounted() {
  },
  data() {
    return {
      register_user: {
        name: "",
        email: "",
        password: "",
      },
      dialog :false,
      dialog_text : ''
    };
  },
  methods: {
    async submit() 
    {
    try {
        var formData = new FormData();
         await Object.keys(this.register_user).forEach((key) =>
           formData.append(key, this.register_user[key])
         );
         const data = await api.register(formData);
         console.log(data)
         if(data.data){
            this.dialog_text = 'Register Success';
            this.dialog = true;
            //go_next();
         }
        }
        catch(err) {
            this.dialog_text = 'Register Fail';
            this.dialog = true; 
        }
    },
     go_next(){
          this.$router.push('/home');
     }
  },
};
</script>

<style></style>