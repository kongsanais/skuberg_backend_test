<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
class m_data_list extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'code', 'type',
    ];


    public function M_insertData($name,$code,$type)
    {
        $data_list = DB::insert('insert into m_data_lists (name, code ,type) values (?, ?,?)', [$name,$code,$type]);
        return $data_list;
    }
}
