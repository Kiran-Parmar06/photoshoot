<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 	//for database connection
use App\Models\contactModel;
use App\Models\appointmentModel;
use App\Models\memberModel;
use App\Models\blogModel;
use App\Models\adminModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailSend;

class userController extends Controller
{
    //
    function getData(Request $req)
    {
    	$name= $req->input('name');
    	$pass= $req->input('pass');
    	$add= $req->input('add');
    	$mobile= $req->input('mobile');
        $file= $req->file('file')->store('docs');
    	echo "Name is : ".$name."<br>Password is : ".$pass."<br>My address is :".$add."<br>My Mobile No. :".$mobile."<br><br>".$file;
    }

    function fetchData()
    {
        $data= contactModel::all();
    	 // $data= DB::select('select * from contact');
         return view('users',['users'=>$data]);
    }

    function insert(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'email'=>'required | email',
            'website'=> 'required',
            'msg' => 'required',
        ]);
        $req->session()->flash('status','Contact Data successfully insert.');
        $contactModel = new contactModel();     //creat an object from contactModel file class
        $contactModel->name = $req->input('name');
        $contactModel->email = $req->input('email');
        $contactModel->website = $req->input('website');
        $contactModel->msg = $req->input('msg');
        $contactModel->save();
        return view('contact');
        // $name=$req->input('name');
        // $email=$req->input('email');
        // $website=$req->input('website');
        // $msg=$req->input('msg');

        // $date = Carbon::now();                  //for current date and time
        // $datatime= $date->toDateTimeString();

        // $ins= DB::insert("insert into contact (name, email, website, msg, date) values(?,?,?,?,?)",[$name,$email,$website,$msg,$datatime]);
        // if ($ins) {
        //     return redirect('contact');
        // }
        // else{
        //     echo "Data is not insert";
        // }
    }

    function insert_appointment(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'email'=>'required | email',
            'pref_date'=> 'required | date',
            'pref_time' => 'required',
            'appointment_for'=> 'required'
        ]);
        $appointmentModel = new appointmentModel(); //creat an object from appointmentModel file class
        $appointmentModel->name = $req->input('name');
        $appointmentModel->email = $req->input('email');
        $appointmentModel->pref_date = $req->input('pref_date');
        $appointmentModel->pref_time = $req->input('pref_time');
        $appointmentModel->appointment_for = $req->input('appointment_for');
        $appointmentModel->save();
        return view('appointment');
    }

   /* function fetchAppointment(){
        $data= appointmentModel::all();
        return view('admin_dashboard',['appointment'=>$data]);
    }*/

    function insertMember(Request $req){
        $req->validate([
            'name'=>'required',
            'job_title'=>'required',
            'facebook_link'=> 'required',
            'instagram_link' => 'required',
            'photo'=>'required'
        ]);
        $memberModel = new memberModel();
        $memberModel->name = $req->input('name');
        $memberModel->job_title = $req->input('job_title');
        $memberModel->facebook_link = $req->input('facebook_link');
        $memberModel->instagram_link = $req->input('instagram_link');
        $memberModel->photo = $req->file('photo');
        
            if ($req->hasFile('photo')) {
                $file = $req->file('photo');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/Upload';
                $file->move($destinationPath,$fileName);
                $memberModel->photo = $fileName;
            }
         
        $memberModel->save();
        return view('team-members');
    }

    function fetchMember(){
        $data= memberModel::all();
        return view('about',['member'=>$data]);
    }

    function fetchMemberInAdmin(){
        $data= memberModel::all();
        return view('admin_tables',['member'=>$data]);
    }

    function insertBlog(Request $req){
        $req->validate([
            'caption'=>'required',
            'head_line'=>'required',
            'story'=> 'required',
            'photo'=>'required'
        ]);
        $blogModel = new blogModel();
        $blogModel->caption = $req->input('caption');
        $blogModel->head_line = $req->input('head_line');
        $blogModel->story = $req->input('story');
        $blogModel->photo = $req->file('photo');

        if ($req->hasFile('photo')) {
                $file = $req->file('photo');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/Upload/blog';
                $file->move($destinationPath,$fileName);
                $blogModel->photo = $fileName;
            }
        $blogModel->save();
        return view('add-blog');
    }

    function fetchBlog(){
        $data = blogModel::paginate(5);
        return view('blog',['blogs'=>$data]);
    }

    function inserAdmin(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required | email',
            'mobile'=> 'required',
            'pass'=> 'required',
            'photo'=> 'required'
        ]);
        $adminModel = new adminModel();
        $adminModel->name = $req->input('name');
        $adminModel->email = $req->input('email');
        $adminModel->mobile = $req->input('mobile');
        $adminModel->pass = $req->input('pass');
        $adminModel->photo = $req->file('photo');

        if ($req->hasFile('photo')) {
                $file = $req->file('photo');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/Upload/admin';
                $file->move($destinationPath,$fileName);
                $adminModel->photo = $fileName;
            }
        $adminModel->save();
        return view('admin_login');
    }

    function loginAdmin(Request $req){
        $req->validate([
            'email'=>'required | email',
            'pass'=>'required'
        ]);
        $admin = DB::table('admin')
        ->where('email',$req->input('email'))
        ->where('pass',$req->input('pass'))
        ->first();

        $req->session()->put('data',$req->input());
        if($req->session()->has('data')){
            return view('admin_dashboard');
        }
        else{
            echo "Login not successfully.";
        }
    }

    function sendMail(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required | email',
            'msg'=>'required'
        ]);

        $data = array(
            'name'=>$req->name,
            'email'=>$req->email,
            'msg'=>$req->msg
        );

        Mail::to($req->email)->send(new mailSend($data));

        return "Sent";
    }

    function editMember($member_id)
    {
        return memberModel::find($member_id);
    }

}
