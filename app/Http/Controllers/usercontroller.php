<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
//use App\Mail\SendMail;
class usercontroller extends Controller
{
    //
    function list()
    {
        $users = DB::table('users')->get();
        return view('users_list',['users'=>$users]);
    }

    function sendreport($id)
    {   
        $userReport =  DB::table('users')
        ->join('reports', 'users.id', '=', 'reports.user_id')
        ->select('users.name','users.email','reports.marks','reports.remarks')
        ->where('users.id','=',$id)   
        ->get();
              

        if(!$userReport->first())

            {
                Echo "Report Not found";
            }
        else
            {
                $pdf = PDF::loadView('report',['userReport'=> $userReport[0]]);
                //return $pdf->download('pdf_file.pdf');

                $details = [
                
                'title' => 'Mail from side title',
                'body' => 'This is the report'
                
                ];

                Mail::send('emails.SendMail', ['details'=>$details], function($message)use($details, $pdf, $userReport) {
                    $message->to($userReport->first()->email, $userReport->first()->email)
                    ->subject('This is subject')
                    ->attachData($pdf->output(), "report.pdf");
                });
                return "Email sent";

            }

        
    }
}
