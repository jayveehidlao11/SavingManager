<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;

    protected  $table = "tblmenus";
    protected $primaryKey = "id";
    protected $fillable = [
        "moduleID","Description","link","file","route","isShow"
    ];
    protected $connection = 'mysql';
    public $incrementing = false;




    public function navs(){
        
        $navList = Menus::get();
        return $navList;
    }
}
