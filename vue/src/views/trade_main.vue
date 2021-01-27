<template>

  <v-container>
    <!-- {{wc_data.data}} -->
 <v-row  class="mt-1" dense>
     <v-col  xl="2" lg="5" >
    <v-alert
      class="mt-3 ml-2 mr-2"
      border="left"
      colored-border
      color="primary"
      elevation="2"
    >

    <v-btn 
          @click="e1 = 1"
          class="ma-2" 
          tile 
          color="blue" 
          dark
          small
        >
           <v-icon left>mdi-clipboard-multiple-outline</v-icon> buy LIST
    </v-btn>

        <v-btn 
         @click="e1 = 2"
          class="ma-2" 
          tile 
          color="#00897B" 
          dark
          small
        >
           <v-icon left>mdi-clipboard-multiple-outline</v-icon> Sale LIST
    </v-btn>

    <v-btn 
          class="ma-2" 
          tile 
          color="#1976D2" 
          dark
          small
    >
           <v-icon left>mdi-history</v-icon> History
    </v-btn>

    </v-alert>
     </v-col>
    <v-col xl="2" lg="5">
    <v-alert
      class="mt-3 ml-2 mr-2"
      border="left"
      colored-border
      color="primary"
      elevation="2"
    >
   

    
    <v-btn 
          class="ma-2" 
          tile 
          color="#5D83B2" 
          dark
          small
        >
           <v-icon left>mdi-wallet</v-icon>  {{wallet}} BATH
    </v-btn>

        <v-dialog
        transition="dialog-bottom-transition"
        max-width="600"
      >
        <template v-slot:activator="{ on, attrs }">

              <v-btn class="ma-2" tile    
            v-bind="attrs"
            v-on="on" x-small>
      <v-icon left>mdi-checkbox-multiple-blank</v-icon> Sale Crytro 
    </v-btn>
        </template>
        <template v-slot:default="dialog">
          <v-card>
            <v-toolbar
              color="primary"
              dark
            >Sale Cryptocurrency</v-toolbar>
            <v-card-text>
              <div class="text-h2 pa-12">

                    <v-select
                     label="Cryptocurrency Type"
                    item-text="type"
                    item-value="id"
                    v-model="add_sale.crypto_type_id"
                    :items="people"
                    >
                    </v-select>

                  <v-text-field
                    @change="check_ch()"
                    type="number"
                    v-model="add_sale.amount"
                    label="Unit"
                    suffix="Unit"
                  ></v-text-field>

                  <v-text-field
                   type="number"
                    v-model="add_sale.price"
                    label="price"
                    suffix="Bath"
                  ></v-text-field>
              </div>
            </v-card-text>
            <v-card-actions class="justify-end">
              <v-btn
                 small
                color="error"
                @click="dialog.value = false"
              >Close</v-btn>
              <v-btn
                color="primary"
                @click="submit(dialog.value = false)"
                small
              >Submit</v-btn>
            </v-card-actions>
          </v-card>
        </template>
      </v-dialog>

      <v-dialog
        transition="dialog-bottom-transition"
        max-width="600"
      >
        <template v-slot:activator="{ on, attrs }">

              <v-btn class="ma-2" tile  
            v-bind="attrs"
            v-on="on" x-small>
      <v-icon left>mdi-checkbox-multiple-blank</v-icon> Buy Crytro 
    </v-btn>
        </template>
        <template v-slot:default="dialog">
          <v-card>
            <v-toolbar
              color="primary"
              dark
            >Buy Cryptocurrency</v-toolbar>
            <v-card-text>
              <div class="text-h2 pa-12">

                    <v-select
                     label="Cryptocurrency Type"
                    item-text="type"
                    item-value="id"
                    v-model="add_sale.crypto_type_id"
                    :items="people"
                    >
                    </v-select>

                  <v-text-field
                    @change="check_ch()"
                    type="number"
                    v-model="add_sale.amount"
                    label="Unit"
                    suffix="Unit"
                  ></v-text-field>

                  <v-text-field
                   type="number"
                    v-model="add_sale.price"
                    label="price"
                    suffix="Bath"
                  ></v-text-field>
              </div>
            </v-card-text>
            <v-card-actions class="justify-end">
              <v-btn
                 small
                color="error"
                @click="dialog.value = false"
              >Close</v-btn>
              <v-btn
                color="primary"
                @click="yes_go(dialog.value = false)"
                small
              >Submit</v-btn>
            </v-card-actions>
          </v-card>
        </template>
      </v-dialog>


    </v-alert>
     </v-col>

    <v-cols  xl="2" lg="2">
   <v-alert
      class="mt-3 ml-2 mr-2"
      border="left"
      colored-border
      color="primary"
      elevation="2"
    >
    <v-row>
    </v-row>
    
     <v-row>
       <h4 class="ml-5">Crypto List</h4>
     </v-row>
    <v-row>

           
           <ul id="example-1">
            <li v-for="item in wc_data.data" :key="item.message">
              
                <v-btn class="ma-1" tile  color="#F57F17"  dark x-small>
                <v-icon left>mdi-bitcoin</v-icon>   {{item.amount}} : {{ item.type_name}}
                </v-btn>
            </li>
          </ul>
          <!-- <v-btn class="ma-4" tile  color="#F57F17"  dark small>
          <v-icon left>mdi-bitcoin</v-icon>  {{btc}}  BTC
          </v-btn> -->
    </v-row>
    </v-alert>
  </v-cols>

      </v-row>
    <v-col xl="10" lg="10">
   <v-stepper v-model="e1">
    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card
          class="mb-12"
          color="grey "
        >
      <v-card >
        <b> Buy List</b>
      <v-data-table :search="search" :headers="headers1" :items="sale_list.data" exportable>
        <!-- table top section -->
        <template v-slot:top>
          <v-toolbar flat color="white">
            <!-- <v-toolbar-title>Applicant</v-toolbar-title> -->
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-text-field
              v-model="search"
              append-icon="search"
              label="Search"
              single-line
              hide-details
            ></v-text-field>
            <v-spacer>
            </v-spacer> 
          </v-toolbar>
        </template>

        <!-- table tr section -->
        <template v-slot:item="{item}">
          <tr class="mb-2" >
          
            <td>{{ item.name}}</td>
            <td>{{ item.price}}</td>
            <td>{{ item.amount}}</td>
            <td>{{ item.type_name}}</td>
            <td>{{ item.created_at}}</td>
            
           
            
            <td>
            <v-btn class="mr-1" color="primary" @click="trade_buy(item)" fab x-small dark>
               BUY
            </v-btn>
            </td>

          </tr>
        </template>
      </v-data-table>
  </v-card>
        </v-card>

      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card
          class="mb-12"
        >
        <b> Sale List</b>
              <v-data-table :search="search" :headers="headers2" :items="buy_list.data" exportable>
        <!-- table top section -->
        <template v-slot:top>
          <v-toolbar flat color="white">
            <!-- <v-toolbar-title>Applicant</v-toolbar-title> -->
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-text-field
              v-model="search"
              append-icon="search"
              label="Search"
              single-line
              hide-details
            ></v-text-field>
            <v-spacer>
            </v-spacer> 
          </v-toolbar>
        </template>

        <!-- table tr section -->
        <template v-slot:item="{item}">
          <tr class="mb-2" >
          
             <td>{{ item.name}}</td>
            <td>{{ item.price}}</td>
            <td>{{ item.amount}}</td>
            <td>{{ item.type_name}}</td>
            <td>{{ item.created_at}}</td>
            
           
            
            <td>
            <v-btn class="mr-1" color="primary" @click="trade_sale(item)" fab x-small dark>
               Sale
            </v-btn>
            </td>

          </tr>
        </template>
      </v-data-table>
        </v-card>

      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card
          class="mb-12"
          color="grey lighten-1"
          height="200px"
        >
        step3
        </v-card>

      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
    </v-col>
  </v-container>
</template>

<script>
import api from "@/services/api";
export default {
    async mounted() {
     this.user_id = localStorage.getItem('user_id');
     this.name = localStorage.getItem('name');
     var id = this.user_id;
     var formData = new FormData();
     formData.append('id', id);

     const user_wc =  await api.get_user_wallet_and_crytro(formData);
     this.wc_data = user_wc;
     this.wallet = user_wc.data[0].balance;


     const sale_list = await api.get_sale_list();
     this.sale_list = sale_list; 

     const buy_list = await api.get_buy_list();
     this.buy_list = buy_list; 

     },
    data() {
     return {
       wc_data : [],
       e1:"1",
       search: "",
       sale_list:[],
       buy_list:[],
      user_id:0,
      name : "",
      btc:0,
      wallet:0,
      people: [
      {
        type: "BTC",
        id: 1
      },
      {
        type: "USDT",
        id: 2
      }
      ],
      headers1: [
          { text: 'Seller', value: "name"},
          { text: 'Price', value: 'price' },
          { text: 'Amount', value: 'amount' },
          { text: 'Type', value: 'type_name' },
          { text: 'Reg Date', value: ''},
          { text: 'Action' , value:'age'},
        ],
      headers2: [
          { text: 'Buyer', value: "name"},
          { text: 'Price', value: 'price' },
          { text: 'Amount', value: 'amount' },
          { text: 'Type', value: 'type_name' },
          { text: 'Reg Date', value: ''},
          { text: 'Action' , value:'age'},
        ],
      add_sale:{
        price:0,
        amount:0,
        seller_id : 0,
        crypto_type_id :0,
      },
      check:[]
     };
    },
   methods: {
    async submit() 
    {
        this.add_sale.seller_id = this.user_id
       
        var formData = new FormData();
         await Object.keys(this.add_sale).forEach((key) =>
           formData.append(key, this.add_sale[key])
         );
         const data = await api.trade_crytro_add_sale(formData);
          this.add_sale.price = 0;
          this.add_sale.amount = 0;
          this.add_sale.seller_id =0;
          this.add_sale.crypto_type_id = 0; 

         const sale_list = await api.get_sale_list();
         this.sale_list = sale_list; 
           
           var id = this.user_id;
            var formData = new FormData();
            formData.append('id', id);

            const user_wc =  await api.get_user_wallet_and_crytro(formData);
            this.wc_data = user_wc;
            this.wallet = user_wc.data[0].balance;
    },
    async yes_go() 
    {
        this.add_sale.seller_id = this.user_id
       
        var formData = new FormData();
         await Object.keys(this.add_sale).forEach((key) =>
           formData.append(key, this.add_sale[key])
         );

         const data = await api.trade_cytro_add_buy(formData);
         
          this.add_sale.price = 0;
          this.add_sale.amount = 0;
          this.add_sale.seller_id =0;
          this.add_sale.crypto_type_id = 0; 


         const sale_list = await api.get_buy_list();
         this.buy_list = sale_list; 


          var id = this.user_id;
          var formData = new FormData();
          formData.append('id', id);

          const user_wc =  await api.get_user_wallet_and_crytro(formData);
          this.wc_data = user_wc;
          this.wallet = user_wc.data[0].balance;
    },
    check_ch(){
       this.add_sale.amount
    },
    async trade_buy(item){

        var formData = new FormData();
         await Object.keys(item).forEach((key) =>
           formData.append(key,item[key])
         );
         formData.append('user_id',this.user_id)
         const data = await api.action_buy(formData);

         const sale_list = await api.get_sale_list();
         this.sale_list = sale_list; 
          
          var id = this.user_id;
          var formData = new FormData();
          formData.append('id', id);

          const user_wc =  await api.get_user_wallet_and_crytro(formData);
          this.wc_data = user_wc;
          this.wallet = user_wc.data[0].balance;
    },
        async trade_sale(item){
          console.log(item)

          var formData = new FormData();
          await Object.keys(item).forEach((key) =>
            formData.append(key,item[key])
          );

         formData.append('user_id',this.user_id)
         const data = await api.action_sale(formData);

         const sale_list = await api.get_buy_list();
         this.buy_list = sale_list; 


          var id = this.user_id;
          var formData = new FormData();
          formData.append('id', id);

          const user_wc =  await api.get_user_wallet_and_crytro(formData);
          this.wc_data = user_wc;
          this.wallet = user_wc.data[0].balance;
    }

   },
};
</script>

<style></style>