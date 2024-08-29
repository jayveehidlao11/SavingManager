<?php

namespace App\Http\Controllers;
use App\Trait\DirectPage;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    

    use DirectPage;


    public function index(Request $request){
        
       $data = $request->all();
     
        return $this->toView($data);
       
    }
}
