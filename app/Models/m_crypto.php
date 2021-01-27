<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class m_crypto extends Model
{
    use Notifiable;
    protected $fillable = [
        'amount', 'type_id','ref_user_id_crypto',
    ];
    
    public function M_set_crypto($user_id)
    {
        $amount = 10;
        $type_id = 1;
        $data = DB::insert('insert into m_cryptos  (amount,type_id ,ref_user_id_crypto) values (?,?,?)', [$amount,$type_id,$user_id]);
        return $data;
    }

    public function M_get_cryto_ByIDType($user_id,$crytro_type)
    {
        $data  = DB::select('select * from m_cryptos where ref_user_id_crypto = ? && m_cryptos.type_id = ?', [$user_id,$crytro_type]);
        return $data;
    }


    
    public function M_update_crytoByIDType($user_id,$crytro_type_id,$amount){
        
        $date_list = DB::table('m_cryptos')
            ->where('ref_user_id_crypto',$user_id)
            ->where('type_id', $crytro_type_id)
            ->update(['amount' => $amount]);

        return $date_list;
    }

}
