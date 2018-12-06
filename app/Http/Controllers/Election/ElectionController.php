<?php

namespace App\Http\Controllers\Election;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Election\Request\Request as ElectionRequest;

class ElectionController extends Controller
{
    public function view(Request $request){
        
         # code...
         if($request->page == 0){
            $customers = ElectionRequest::post([
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/election/getallelections/');
            $datas = [];

            if($customers != null){
                foreach ($customers->data as $customer => $value){
                    $datas[$customer] = $value;
                }

                return view('election.index')->with([
                    'customers'=>$datas,
                ]);
            }else{
                return view('election.index')->with([
                    'customers'=>$datas,
                ]);
            }
        }else{
            $customers = ElectionRequest::post([
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/election/getallelections/');
            $datas = [];

            if($customers != null){
                foreach ($customers->data as $customer => $value){
                    $datas[$customer] = $value;
                }

                return view('election.index')->with([
                    'customers'=>$datas,
                ]);
            }else{
                return view('election.index')->with([
                    'customers'=>$datas,
                ]);
            }
        }
      
    }

    public function Viewelectionpose(Request $request)
    {
        # code...
        if($request->page == 0){
            $data = ElectionRequest::post([
                'election_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/position/getallpositionsforelection/');

            $customers = ElectionRequest::post([
                'id'=>$request->id,
            ],env('API_URL').'/election/getparticularelection/');
            
            return view('election.election.index',[
                'customers'=>$data->data,
                'election'=>$customers->data
            ]);
        }else{
            $data = ElectionRequest::post([
                'election_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/position/getallpositionsforelection/');
            
            $customers = ElectionRequest::post([
                'id'=>$request->id,
            ],env('API_URL').'/election/getparticularelection/');
            
            return view('election.election.index',[
                'customers'=>$data->data,
                'election'=>$customers->data
            ]);
        }

    }

    public function updateelection(Request $request)
    {
        # code...
        try{
            
            $save = ElectionRequest::post([
                'id'=>$request->id,
                'name'=>$request->name,
                'description'=>$request->description,
                'startdate'=>$request->startdate,
                'startmonth'=>$request->startmonth,
                'startyear'=>$request->startyear,
                'enddate'=>$request->enddate,
                'endmonth'=>$request->endmonth,
                'endyear'=>$request->endyear,
                'tokentime'=>$request->tokentime,
                //'password'=>$request->email,
            ],env('API_URL').'/election/updateelection/');
    
            if(json_decode(json_encode($save))->status_code==500){
                $customers = ElectionRequest::post([
                    'page'=>1,
                    'items'=>10,
                ],env('API_URL').'/election/getallelections/');
                $datas = [];
    
                if($customers != null){
                    foreach ($customers->data as $customer => $value){
                        $datas[$customer] = $value;
                    }
    
                    return view('election.index')->with([
                        'customers'=>$datas,
                    ]);
                }else{
                    return view('election.index')->with([
                        'customers'=>$datas,
                    ]);
                }
            }

            $customers = ElectionRequest::post([
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/election/getallelections/');
            $datas = [];

            if($customers != null){
                foreach ($customers->data as $customer => $value){
                    $datas[$customer] = $value;
                }

                return view('election.index')->with([
                    'customers'=>$datas,
                ]);
            }else{
                return view('election.index')->with([
                    'customers'=>$datas,
                ]);
            }
           

        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
        
    }

    public function createelection(Request $request)
    {
        # code...
        try{
            
            $save = ElectionRequest::post([
                'name'=>$request->name,
                'description'=>$request->description,
                'startdate'=>$request->startdate,
                'startmonth'=>$request->startmonth,
                'startyear'=>$request->startyear,
                'enddate'=>$request->enddate,
                'endmonth'=>$request->endmonth,
                'endyear'=>$request->endyear,
                'tokentime'=>$request->tokentime,
                //'password'=>$request->email,
            ],env('API_URL').'/election/createelection/');
    
            if(json_decode(json_encode($save))->status_code==500){
                return redirect()->back()->withErrors([
                    'error'=> 'Unexpected Error 1',
                ]);
            }

            return redirect()->back()->withErrors([
                'success'=> 'Election Created',
            ]);
           

        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
        
    }

    public function results(Request $request){
        
        # code...
        $data = ElectionRequest::post([
            'election_id'=>$request->id,
            'page'=>1,
            'items'=>50,
        ],env('API_URL').'/position/getallpositionsforelection/');

        $customerss = ElectionRequest::post([
            'id'=>$request->id,
        ],env('API_URL').'/election/getparticularelection/');

        $datas = ElectionRequest::post([
            'page'=>1,
            'items'=>100000,
        ],env('API_URL').'/users/getallusers/');
        
        return view('election.election.results',[
            'customers'=>$data->data,
            'position'=>$datas->data,
            'elec_name'=>$customerss->data->name
        ]);
     
    }

    public function winner(Request $request){
        
        # code...
        $data = ElectionRequest::post([
            'position_id'=>$request->id,
        ],env('API_URL').'/voter/winner/');
        
        return view('election.election.winner',[
            'customers'=>$data->data,
            'total'=>$data,
        ]);
     
    }

    public function candidatevotes(Request $request){
        
        # code...
        $data = ElectionRequest::post([
            'candidate_id'=>$request->id,
            'page'=>1,
            'items'=>100000,
        ],env('API_URL').'/voter/get_all_votes_for_candidate/');
        
        return view('election.election.candidatevotes',[
            'customers'=>$data->data,
            'total'=>$data,
        ]);
     
    }
}
