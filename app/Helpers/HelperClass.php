<?php
namespace App\Helpers;

use App\Models\PaymentModesModel as PaymentModes;

class HelperClass{

    public static function optionPaymentsModes($returnString = true){
        $returnData = [];
        $data = PaymentModes::PaymentList();
        $optArr = array(''=>'-- Select Payment Type -- ');
        $options = "<option value=''> -- Select Payment Type -- </option>";
        foreach ($data as $key => $value) {
            $options .="<option value='".$value->id."' data-code='".$value->code."'>".$value->description."</option>";
            $optArr[$value->id] =$value->description;
        }
        $returnData['options'] = $options;
      
        return $returnString ? $options : $optArr;
    }
}
?>