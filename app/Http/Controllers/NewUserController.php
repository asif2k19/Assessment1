<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use Illuminate\Support\Facades\View;

class NewUserController extends Controller
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
    $start = $request->start;
    $finish = $request->finish;
    $occupationsearch = "";
    if(isset($request->occupationsearch) && !empty($request->occupationsearch))
    {
        $occupationsearch = implode(",",$request->occupationsearch);
    }

    $familytypesearch="";
    if(isset($request->familytypesearch))
    {
        $familytypesearch = implode(',',$request->familytypesearch);
    }

    $mangliksrch =$request->mangliksearch;


    DB::table('users')->insert([
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
        'start'=>$start,
        'finish'=>$finish,
        'occupationsearch'=>$occupationsearch,
        'familytypesearch'=>$familytypesearch,
        'mangliksrch'=>$mangliksrch,
        'isadmin'=>'0',

    ]);

    return redirect()->back()->with('message', 'Data Saved!');

}

public function getuserdata(Request $request)
{




    $user_id = Auth::user()->id;
    $getuserdetail = Db::table('users')->where('id',$user_id)->first();

     $occupationsearch = $getuserdetail->occupationsearch;
     $familytypesearch = $getuserdetail->familytypesearch;
     $mangliksearch = $getuserdetail->mangliksrch;
     $start = $getuserdetail->start;
     $finish = $getuserdetail->finish;

    $pagesize = 100;

    if($getuserdetail->isadmin == 1)
    {
        $query = DB::table('users as u')->where('isadmin','0');
    }
    elseif($getuserdetail->isadmin == 0)
    {
        if($getuserdetail->gender=='male')
        {
            $query = DB::table('users as u')->where('gender','female');
        }
        elseif($getuserdetail->gender=='female')
        {
            $query = DB::table('users as u')->where('gender','male');
        }

    }










    $users = $query->select('u.*')

        ->paginate($pagesize);

    $view = View::make('partial.users', compact('users','occupationsearch','familytypesearch','mangliksearch','start','finish'))->render();
    return $view;
}

public function logout()
{

    Auth::logout();
    return redirect('/login');
}

public function checkemail(Request $request)
{
    $getsku = 'true';
    $email = $request->email;





        $q = "SELECT (select count(*) from users where email='$email') as cnt";
        $scount = DB::select($q)[0]->cnt;


    if (isset($scount) && ! empty($scount) && ($scount > 0)) {
        $getsku = 'false';
    }

    return $getsku;
}
}
