<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;

class MenusController extends Controller
{
    
    public function navigators(Request $request){
        $data = [];
        $nav = new Menus();
        $data['nav'] = $nav->navs();
        return view('navigator.nav',$data);
    }

}
