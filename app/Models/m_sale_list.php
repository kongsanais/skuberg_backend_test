<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class m_sale_list extends Model
{
    use Notifiable;
    protected $fillable = [
        'price', 'amount', 'seller_id','crypto_type_id',
    ];

    public function M_add_sale_list($price,$amount,$sale_id,$crypto_type_id)
    {

        $data = DB::table('m_sale_lists')->insert(
            array(
            'price' =>$price, 
            'amount' => $amount,
            'seller_id'=> $sale_id,
            'crypto_type_id' => $crypto_type_id,
            'created_at' => now()
            )
        );
                        
        return $data;
    }

    public function M_delete_sale_list($sale_id){
        $data = DB::delete('delete from m_sale_lists where m_sale_lists.id = ?', [$sale_id]);
        return $data; 
    }


    public function M_get_sale_list(){
        $data_list = DB::select('
        SELECT  m_sale_lists.id as sale_id,
        price,amount,
        name,
        created_at,
        m_crypto_types.id as crypto_types_id,
        m_crypto_types.type_name,
        m_user_systems.id as seller_id
        FROM `m_sale_lists`
        LEFT JOIN m_user_systems
        ON  m_user_systems.id = m_sale_lists.seller_id
        LEFT JOIN m_crypto_types
        ON  m_crypto_types.id = m_sale_lists.crypto_type_id');
        return $data_list;
    }


    public function M_wellet_charge($user_id,$price){

        DB::table('m_wallets')
            ->where('user_id',$user_id)
            ->update(['balance' => $price]);

        return $data_list;
    }


    public function M_get_welletwithUserID($user_id){
        $data_list = DB::select('select * from m_wallets where user_id = ?', [$user_id]);
        return $data_list;
    }







}
