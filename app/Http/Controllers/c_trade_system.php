<?php

namespace App\Http\Controllers;
use App\Models\m_user_system;
use App\Models\m_wallet;
use App\Models\m_crypto;
use App\Models\m_sale_list;
use App\Models\m_buy_list;
use App\Models\m_trade_history;


use Illuminate\Http\Request;

class c_trade_system extends Controller
{

    //user add sale
    public function add_sale_list(Request $request)
    {   
            $price = $request->input('price');
            $amount = $request->input('amount');
            $seller_id = $request->input('seller_id');
            $crypto_type_id = $request->input('crypto_type_id');

            /*load sale model*/
            $m_sale_list  = new m_sale_list();
            $data = $m_sale_list->M_add_sale_list($price,$amount,$seller_id,$crypto_type_id);

            //seller amount//
            $m_crypto  = new m_crypto();
            $m_crypto  = $m_crypto->M_get_cryto_ByIDType($seller_id,$crypto_type_id);
            $coin  = $m_crypto[0]->amount;
            $result_add = $coin - $amount;
            $m_crypto  = new m_crypto();
            $m_crypto = $m_crypto->M_update_crytoByIDType($seller_id,$crypto_type_id,$result_add);

            return response()->json($data);

    }

    //user add buy
    public function add_buy_list(Request $request)
    {   
            
            $price = $request->input('price');
            $amount = $request->input('amount');
            $buy_id = $request->input('seller_id');
            $crypto_type_id = $request->input('crypto_type_id');

            /*load model*/
            $m_buy_list  = new m_buy_list();
            $data = $m_buy_list->M_add_buy_list($price,$amount,$buy_id,$crypto_type_id);

            /*load model*/
            $m_sale_list  = new m_sale_list();
            $wellet = $m_sale_list->M_get_welletwithUserID($buy_id);
            $blance = $wellet[0]->balance;
            $cal = $blance - $price;
    
            //update wallet //
            $m_wallet = new m_wallet();
            $m_wallet->M_update_wellet($cal,$buy_id);

            return response()->json($data);

    }

    //user action buy
    public function action_buy(Request $request) {

        $sale_id = $request->input('sale_id');
        $user_id = $request->input('user_id');
        $seller_id = $request->input('seller_id');
        $price = $request->input('price');
        $amount = $request->input('amount');
        $crypto_types_id = $request->input('crypto_types_id');
        

        $m_sale_list  = new m_sale_list();
        $wellet = $m_sale_list->M_get_welletwithUserID($user_id);
        $blance = $wellet[0]->balance;
        $cal = $blance - $price;

        $m_wallet = new m_wallet();
        $m_wallet->M_update_wellet($cal,$user_id);

        $m_sale_list  = new m_sale_list();
        $wellet = $m_sale_list->M_get_welletwithUserID($seller_id);
        $blance = $wellet[0]->balance;
        $cal = $blance + $price;

        /*update wallet*/
        $m_wallet = new m_wallet();
        $m_wallet  = $m_wallet->M_update_wellet($cal,$seller_id);


        /*update amount*/
        $m_crypto  = new m_crypto();
        $m_crypto  = $m_crypto->M_get_cryto_ByIDType($user_id,$crypto_types_id);
        $coin  = $m_crypto[0]->amount;
        $result_add = $coin + $amount;
        $m_crypto  = new m_crypto();
        $m_crypto = $m_crypto->M_update_crytoByIDType($user_id,$crypto_types_id,$result_add);


        //delete sale list//
        $m_sale_list = new m_sale_list();
        $m_sale_list->M_delete_sale_list($sale_id);
        
        /*save history*/
        $m_trade_history = new m_trade_history();
        $t_type = 'sale';
        $m_trade_history->M_add_history_list($t_type,$user_id,$buyer_id,$amount,$price,$crypto_types_id);

        return $m_sale_list;
    }

    //user action sale
    public function action_sale(Request $request) {

        $buy_id = $request->input('buy_id');
        $user_id = $request->input('user_id');
        $buyer_id = $request->input('buyer_id');
        $price = $request->input('price');
        $amount = $request->input('amount');
        $crypto_types_id = $request->input('crypto_types_id');
        
        /*update amount*/
        $m_crypto  = new m_crypto();
        $m_crypto  = $m_crypto->M_get_cryto_ByIDType($buyer_id,$crypto_types_id);
        $coin  = $m_crypto[0]->amount;
        $result_add = $coin + $amount;
        $m_crypto  = new m_crypto();
        $m_crypto = $m_crypto->M_update_crytoByIDType($buyer_id,$crypto_types_id,$result_add);

        /*update amount*/
        $m_crypto  = new m_crypto();
        $m_crypto  = $m_crypto->M_get_cryto_ByIDType($user_id,$crypto_types_id);
        $coin  = $m_crypto[0]->amount;
        $result_add = $coin - $amount;
        $m_crypto  = new m_crypto();
        $m_crypto = $m_crypto->M_update_crytoByIDType($user_id,$crypto_types_id,$result_add);


        /*delete buy list*/
        $m_buy_list = new m_buy_list();
        $m_buy_list->M_delete_buy_list($buy_id);

        /*save history*/
        $m_trade_history = new m_trade_history();
        $t_type = 'sale';
        $m_trade_history->M_add_history_list($t_type,$user_id,$buyer_id,$amount,$price,$crypto_types_id);
        
        return $m_crypto;
    }


    public function  get_sale_list(){
        $m_sale_list  = new m_sale_list();
        $sale_list = $m_sale_list->M_get_sale_list();
        return $sale_list;
    }

    public function  get_buy_list(){
        $m_buy_list  = new m_buy_list();
        $buy_list = $m_buy_list->M_get_buy_list();
        return $buy_list;
    }



}
