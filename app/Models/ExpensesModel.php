<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DateRangeModel as DateRange;

class ExpensesModel extends Model
{
    use HasFactory;
    
    protected  $table = "tblexpenseslist";
    protected $primaryKey = "id";
    protected $fillable = [
        "description","amount","mode_id","FinalDeadline","DateCreated","UpdatedBy","isShow"
    ];
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;

    public function insertData($data,$monthlyDeadlines){
        $insertExpenses = [
            "description"=>$data->expDesc,
            "amount"=>$data->expAmount,
            "mode_id"=>$data->expPaymentType,
            "FinalDeadline"=>date('Y-m-d',strtotime($data->expDeadline)),
            "DateCreated"=>date('Y-m-d',strtotime('now')),
            'UpdatedBy'=>0,
            'isShow'=>0
        ];
        $insert = ExpensesModel::insertGetId($insertExpenses);
       

   
        if($insert){
            
            $dateRange = new DateRange();
            $insertNewDateRange = $dateRange->insertNewRange(array('data'=>$data,'id'=>$insert,'dateList'=>$monthlyDeadlines));

            return $insertNewDateRange;
        }
        return array('message'=>'Failed to save record');

    }
    public function getDateRanges(){
       
        return $this->hasOne(DateRangeModel::class,'expensesID','id');
        
    }
    public function paymentMode(){
        return $this->hasOne(PaymentModesModel::class,'id','mode_id');
    }
    
}
