<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class m_wallet extends Model
{

    protected $fillable = [
        'balance', 'user_id',
    ];

    public function M_setup_wallet($user_id)
    {
        $balance = 30000;
        $register_result = DB::insert('insert into m_wallets (balance,user_id) values (?,?)', [$balance,$user_id]);
        return $register_result;
    }

    public function M_update_wellet($cal,$user_id) {
        $result = DB::update('update m_wallets set balance = ? where user_id = ?', [$cal,$user_id]);
        return $result;
    }

    
}
