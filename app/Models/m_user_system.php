<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class m_user_system extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function M_Register_user($name,$email,$password)
    {

        $id = DB::table('m_user_systems')->insertGetId(
            array('name' =>$name, 'email' => $email,'password' => $password)
        );

        return $id;
    }


    public function M_login_user($email)
    {
        $user_data  = DB::select('select * from m_user_systems where email = ?', [$email]);
        return $user_data;
    }



    public function M_getUserlist(){
        $data_list = DB::select('select * from m_user_systems');
        return $data_list;
    }
    

    public function M_getUserWalletandcrypto($id){
        $data_list  = DB::select('
        SELECT m_user_systems.id,name,amount,type_name,balance FROM m_user_systems
        INNER JOIN m_cryptos
        ON  m_user_systems.id = m_cryptos.ref_user_id_crypto
        INNER JOIN m_crypto_types
        ON m_crypto_types.id  = m_cryptos.type_id
        INNER JOIN m_wallets
        ON m_user_systems.id = m_wallets.user_id
        where  m_user_systems.id =  ?', [$id]);
        return $data_list;
    }



    
}
