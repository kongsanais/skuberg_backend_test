<?php

namespace App\Http\Controllers;

use App\m_data_list;
use Illuminate\Http\Request;


class c_dataList extends Controller
{
    //

    public function insertData(Request $request)
    {
        $data_list  = new m_data_list();
        $name = $request->input('name');
        $code = $request->input('code');
        $type = $request->input('type');
        $data = $data_list->M_insertData($name,$code,$type);
        return response()->json($data);
    }


    


}
