<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Election\Request\Request as ElectionRequest;
use App\User;

class UsersController extends Controller
{
     //
    public function view(){
        
        return view('create');
      
    }

    public function create(Request $request)
    {
        $user = new User;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token'|| $key=='password')continue;
            $user->$key = $value;
        }
        $user->password= \Hash::make($request->password);
        $user->status = '1';

        if ($user->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=> 'User Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'Error'=> 'User not Created',
            ]);
        }
    }

    public function create2(Request $request)
    {
        # code...
        try{
            
            $save = ElectionRequest::post([
                'role'=>$request->role,
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'email'=>$request->email,
                'msisdn'=>$request->msisdn,
                'password'=>$request->password,
            ],env('API_URL').'/users/createuser/');
    
            if(json_decode(json_encode($save))->status_code==500){
                return redirect()->back()->withErrors([
                    'error'=> 'Unexpected Error 1',
                ]);
            }

            return redirect()->back()->withErrors([
                'success'=> 'User Created',
            ]);
           

        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
    }

    public function update(Request $request)
    {
        # code...
        $data=[];
        $user = User::where('id',$request->id);
        $users = User::where('id',$request->id)->first();
        if($request->new === $request->confirm){

            foreach ($request->all() as $key => $value) {
                //creating array excluding the _token the array will be used for update
                if ($key=='_token'|| $key=='id'|| $key=='new'|| $key=='confirm')continue;
                $data[$key]=$value;
            }

            if($request->new === null || $request->new == undefined){

                $user->update(array(
                    'password' => $users->password,
                ));

            }else{

                $user->update(array(
                    'password' => \Hash::make($request->new),
                ));

            }
                
            if ($user->update($data)){
                # code...
                return redirect()->back()->withErrors([
                    'success'=> 'User Updated',
                ]);
            } else {
                # code...;
                return redirect()->back()->withErrors([
                    'Error'=> 'User not Updated',
                ]);
            }

        }else{

            return redirect()->back()->withErrors([
                'Error'=> 'Password Do not Match',
            ]);

        }
        
    }

    public function particular (Request $request){
        # code...
        $user = User::where('id','=',$request->id)->first();

        return view('settings.users.layouts.particular')->with([
            'user'=> $user,
        ]);
    }

    public function enabling(Request $request)
    {
        # code...
        $id = $request->input('id');
        $status = $request->input('status');

        if(User::where('id',$id)){
            $default = User::where('id', '=', $id)->first();

            if ($status != '') {
                $default->update(array(
                    'status' => $status,
                ));
            }
            return redirect()->back()->withErrors([
                'success'=> 'Status Updated',
            ]);
        } else {

            return redirect()->back()->withErrors([
                'Error'=> 'Status not Updated',
            ]);
        }

    }

    public function index(Request $request){
        if($request->page == 0){
            $customers = ElectionRequest::post([
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/users/getallusers/');
            $datas = [];

            if($customers != null){
                foreach ($customers->data as $customer => $value){
                    $datas[$customer] = $value;
                }

                return view('users.users')->with([
                    'customers'=>$datas,
                ]);
            }else{
                return view('users.users')->with([
                    'customers'=>$datas,
                ]);
            }
        }else{
            $customers = ElectionRequest::post([
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/users/getallusers/');
            $datas = [];

            if($customers != null){
                foreach ($customers->data as $customer => $value){
                    $datas[$customer] = $value;
                }

                return view('users.users')->with([
                    'customers'=>$datas,
                ]);
            }else{
                return view('users.users')->with([
                    'customers'=>$datas,
                ]);
            }
        }

    }

    public function Viewuser(Request $request)
    {
        # code...
        $data = ElectionRequest::post([
            'user_id'=>$request->id,
        ],env('API_URL').'/users/getparticularuser/');

        $token = ElectionRequest::post([
            'user_id'=>$request->id,
        ],env('API_URL').'/token/getparticularvotertoken/');
        
        return view('users.users.index',[
            'customer'=>$data->data,
            'token'=>$token->data
        ]);

    }

    public function alltokens(Request $request)
    {
        # code...
        $data = ElectionRequest::get([],env('API_URL').'/token/allusers/');
        if ($data->message == 'Tokens already created'){
            $customers = ElectionRequest::post([
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/users/getallusers/');

            return view('users.users')->with([
                'customers'=>$customers->data,
                'success'=> 'Tokens already created',
            ]);
        }else{
            $customers = ElectionRequest::post([
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/users/getallusers/');

            return view('users.users')->with([
                'customers'=>$customers->data,
                'success'=> 'Tokens already created',
            ]);
        }

    }

    public function updateuser(Request $request)
    {
        # code...
        try{
            
            $save = ElectionRequest::post([
                'id'=>$request->id,
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'email'=>$request->email,
                'msisdn'=>$request->msisdn,
                //'password'=>$request->email,
            ],env('API_URL').'/users/updateuser/');
    
            if(json_decode(json_encode($save))->status_code==500){
                return redirect()->back()->withErrors([
                    'error'=> 'Unexpected Error 1',
                ]);
            }

            return redirect()->back()->withErrors([
                'success'=> 'User Updated',
            ]);
           

        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
        
    }
}
