<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DateRangeModel extends Model
{
    use HasFactory;

    protected  $table = "tbldateranges";
    protected $primaryKey = "id";
    protected $fillable = [
      "expensesID","datesListRange","DateCreated"
    ];
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;

    public function insertNewRange($data){
        $isSuccess = 0;
        $values = (object) $data;
       
        if(!empty($data)){
            $insert = DateRangeModel::create([
                    "expensesID"=>$values->id,
                    "datesListRange"=>json_encode($values->dateList),
                    "DateCreated"=>Carbon::now()
            ]);
            return array('message'=>'Successfully saved record.');
        }
        return array('message'=>'Failed to save record');
    }
}
