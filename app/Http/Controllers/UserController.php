<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

public function postregistration(Request $request)
{
    $firstname = $request->first_name;
    $lastname = $request->last_name;
    $email = $request->email;
    $password = $request->password;
    $dateofbirth = date('Y-m-d', strtotime(str_replace('-', '/', $request->dob)));
    $gender = $request->gender;


    if(isset($request->annualincome) &&  $request->annualincome> 0)
    {
        $income = $request->annualincome;
    }
    else
    {
        $income = 0;
    }
    $occupation = $request->occupation;
    $familytype = $request->familytype;
    $manglik = $request->manglik;
    if(isset($request->amount) &&  $request->amount> 0)
    {
        $amount = $request->amount;
    }
    else
    {
        $amount = 0;
    }

    $occupationsearch = implode(",",$request->occupationsearch);
    $familytypesearch = implode(',',$request->familytypesearch);
    $mangliksrch =$request->mangliksearch;


    DB::table('assessment')->insert([
        'first_name'=>$firstname,
        'last_name'=>$lastname,
        'email'=>$email,
        'password'=>bcrypt($password),
        'dob'=>$dateofbirth,
        'gender'=>$gender,
        'annualincome'=>$income,
        'occupation'=>$occupation,
        'familytype'=>$familytype,
        'manglik'=>$manglik,
        'amount'=>$amount,
        'occupationsearch'=>$occupationsearch,
        'familytypesearch'=>$familytypesearch,
        'mangliksrch'=>$mangliksrch,
        'isadmin'=>'0',

    ]);


}
}
