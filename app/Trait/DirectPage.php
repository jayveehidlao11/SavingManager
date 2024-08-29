<?php
namespace App\Trait;

use App\Models\Menus;
trait DirectPage{

    public function toView($request){
     
        $url =explode("/", $_SERVER['REQUEST_URI']);
        if(isset($url[1])){
            $menu = Menus::where('link','like',"%".$url[1]."%")->first();
            
            if(!empty($menu)){
                $redirect = $menu->file;
            }
            $redirect = isset($redirect) ? $redirect : "";
            $request['description'] = $menu->Description;
            return view($redirect,$request);
        }
        return view("/");
        
        // 

    }
}
?>