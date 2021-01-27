<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_crypto_type extends Model
{
    public function M_get_crytoByID($id){
        $data_list = DB::select('select * from users where active = ?', [$id]);
        return $data_list;
    }
}
