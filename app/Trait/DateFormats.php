<?php
namespace App\Trait;

use Carbon\Carbon;
trait DateFormats{

    public function calculateMonthlyDeadline($date){
        $nowInManila = Carbon::now('Asia/Manila');
        
        $monthlyDeadline = date('Y-m',strtotime("now")).'-'.date('d',strtotime($date));
        
        $startDate = $nowInManila->parse($monthlyDeadline);
        $endDate = $nowInManila->parse(date('Y-m-d',strtotime($date)));
    
       // Initialize an array to hold the monthly deadlines
       $monthlyDeadlines = [];

       // Loop through each month between the start and end dates
       while ($startDate->lte($endDate)) {
           // Store the start of the month as the deadline
           $monthlyDeadlines[$startDate->format('Y')][$startDate->format('m')] = $startDate->format('Y-m-d');

           // Move to the next month
           $startDate->addMonthNoOverflow();
       }

    
       
        return $monthlyDeadlines;
    }

}
?>