<?php

namespace App\Http\Controllers;
use App\Trait\DirectPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ExpensesController extends Controller
{
    use DirectPage;


    public function index(Request $request){
        
       $data = $request->all();
     
        return $this->toView($data);
         
    }
}
