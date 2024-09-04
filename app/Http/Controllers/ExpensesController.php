<?php

namespace App\Http\Controllers;
use App\Trait\DirectPage;
use App\Trait\DateFormats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\RedirectResponse ;
#Models
use App\Models\PaymentModesModel as PaymentModes;
use App\Models\ExpensesModel as Expenses;

#
use App\Helpers\HelperClass;
use Carbon\Carbon;
class ExpensesController extends Controller
{
    use DateFormats;
    use DirectPage;
    

    public function index(Request $request){
        
       $data = $request->all();
        $data['options'] = [
            'paymentTypes'=>HelperClass::optionPaymentsModes(false)
        ];
        return $this->toView($data);
         
    } 
    public function insertNewExpenses(Request $request){
        $data = (object) $request->all();
        $returnData =array('icon'=>'warning','message'=>"Failed to save data.");
        try{
            $expenses = Expenses::where('description','like','%'.$data->expDesc.'%')->first();
            $monthlyDeadlines = $this->calculateMonthlyDeadline($data->expDeadline);
       
            if(!$expenses){
               $expensesModel = new Expenses();
               $insert = $expensesModel->insertData($data,$monthlyDeadlines);
                $returnData['icon'] = "success";
                $returnData['message'] = "Successfully saved.";
            }
            return $returnData;
        }catch(\Exception $error){
            dd($error);
        }
       
      
    }
    public function showExpenses(Request $request){
        $returnData = [];
        $returnData['expensesData'] = Expenses::with('paymentMode')->get();
      
        return view('modules.expenses_module.expensesTable',$returnData);
    }
    public function processExpenses(Request $request){
        $var = (object) $request->all();
        $return = [];
    
        switch($var->process){
            case 1:
                $return = $this->updateExpenses($var);
                break;
            case 2:
                $return = $this->deleteExpenses($var);
                break;
        }
      
        return $return;
    }

    private function updateExpenses($data){
        $return = array('message'=>'Failed to update data');
        $expenses = Expenses::find($data->id);
        $request = array();
        parse_str($data->form,$request);
       
        if($expenses){
            $expenses = $expenses->update([
                'description'=>$request['expensesDesc'],
                'amount'=>$request['expensesAmt'],
                'mode_id'=>$request['expPaymentType'],
                'FinalDeadline'=>$request['expensesFinalDate']
                ]);

            $return['message'] = "Successfully Updated.";
        }
        return $return;
    }
    private function deleteExpenses($data){
       
        $return = array('message'=>'Failed to delete data');
        $expenses = Expenses::find($data->id);
       if($expenses){
            $expenses->delete();
            $return['message'] = "Successfully Deleted!";
           
       }
       return $return;
    }
    public function editExpenses(Request $request){
        $var = (object) $request->all();
        $url = "/expenses/showExpenses/".Crypt::encrypt($var);
        return $url;
    }

    
    public function displayExpenses($encrypted){
        try {
            $data = [];
            $expensesInfo = Crypt::decrypt($encrypted);
           
            $expensesModel =Expenses::with('getDateRanges','paymentMode')->where('id',$expensesInfo->id)->first();
            
           
            $data['expensesInfo'] = $expensesModel;
            $data['options'] = [
                'paymentTypes'=>HelperClass::optionPaymentsModes(false)
            ];
            $data['decryptedData'] = $expensesInfo;
            return view('modules.expenses_module.showExpenses',$data);
        } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
            dd($e);
        }
    }
  
  
}
