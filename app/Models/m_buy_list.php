<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class m_buy_list extends Model
{
    

    public function M_add_buy_list($price,$amount,$sale_id,$crypto_type_id)
    {

        $data = DB::table('m_buy_lists')->insert(
            array(
            'price' =>$price, 
            'amount' => $amount,
            'buy_id'=> $sale_id,
            'crypto_type_id' => $crypto_type_id,
            'created_at' => now()
            )
        );
        return $data;
    }


    public function M_get_buy_list(){
        $data_list = DB::select('
        SELECT 
        m_buy_lists.id as buy_id,
		price,
        amount,
        name,
        created_at,
        m_crypto_types.id as crypto_types_id,
        m_crypto_types.type_name,
        m_user_systems.id as buyer_id
        FROM m_buy_lists
        LEFT JOIN m_user_systems
        ON m_user_systems.id = m_buy_lists.buy_id
        LEFT JOIN m_crypto_types
        ON  m_crypto_types.id = m_buy_lists.crypto_type_id');
        return $data_list;
    }

    public function M_delete_buy_list($buy_id){
        $data = DB::delete('delete from m_buy_lists where m_buy_lists.id = ?', [$buy_id]);
        return $data; 
    }


}
