<?php

namespace App\Http\Controllers;
use App\Models\m_user_system;
use App\Models\m_wallet;
use App\Models\m_crypto;


use Illuminate\Http\Request;

class c_user_system extends Controller
{
    public function register(Request $request)
    {   
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
    
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            /*load user model*/
            $m_user_system  = new m_user_system();
            $data = $m_user_system->M_Register_user($name,$email,$hashed_password);

            /*set start 30000 Bath to wallet*/
            $m_wallet  = new m_wallet();
            $m_wallet->M_setup_wallet($data);
            
            /*add crypto*/
            $m_crypto = new m_crypto();
            $m_crypto->M_set_crypto($data);

            return response()->json($data);

    }

    public function login(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        /*load user model*/
        $m_user_system  = new m_user_system();
        $user_data = $m_user_system->M_login_user($email);

        /*password verrify*/
        if(password_verify($password, $user_data[0]->password)) {
            return response()->json($user_data);
        }
        else{
            return response("login fail",500);
        }

    }


    
    public function get_wallet_andCrytro(Request $request)
    {
        $id = $request->input('id');
        //load model
        $m_user_system  = new m_user_system();
        $data = $m_user_system->M_getUserWalletandcrypto($id);
        return response()->json($data);   
    }

    
    
    public function get_user_list()
    {
        $m_user_system  = new m_user_system();
        $user_data = $m_user_system->M_getUserlist();
        return response()->json($user_data);
    }

    

}