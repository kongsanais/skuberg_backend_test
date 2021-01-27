<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class m_trade_history extends Model
{
    
    public function M_add_history_list($trade_type,$seller_id,$buy_id,$amount,$price,$crypto_type_id)
    {

        $data = DB::table('m_trade_histories')->insert(
            array(
            'trade_type' =>$trade_type, 
            'seller_id' => $seller_id,
            'buy_id'=> $buy_id,
            'amount'=> $amount,
            'price' => $price,
            'crypto_type_id' => $crypto_type_id,
            'created_at' => now()
            )
        );
                        
        return $data;
    }

    public function M_get_history(){
        $data_list = DB::select('select * from m_user_systems');
        return $data_list;
    }
    

}
