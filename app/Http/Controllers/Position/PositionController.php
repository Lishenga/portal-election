<?php

namespace App\Http\Controllers\Position;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Election\Request\Request as ElectionRequest;

class PositionController extends Controller
{
    public function view(Request $request){
        
        # code...
        if($request->page == 0){
           $customers = ElectionRequest::post([
               'page'=>1,
               'items'=>10,
           ],env('API_URL').'/position/getallpositions/');

           $cu = ElectionRequest::post([
            'page'=>1,
            'items'=>10000,
            ],env('API_URL').'/election/getallelections/');

           $datas = [];

           if($customers != null){
               foreach ($customers->data as $customer => $value){
                   $datas[$customer] = $value;
               }

               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }else{
               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }
       }else{
           $customers = ElectionRequest::post([
               'page'=>$request->page,
               'items'=>10,
           ],env('API_URL').'/position/getallpositions/');
           $datas = [];

           $cu = ElectionRequest::post([
            'page'=>$request->page,
            'items'=>10000,
            ],env('API_URL').'/election/getallelections/');

           if($customers != null){
               foreach ($customers->data as $customer => $value){
                   $datas[$customer] = $value;
               }

               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }else{
               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }
       }
     
   }

   public function create(Request $request)
    {
        # code...
        try{
            
            $save = ElectionRequest::post([
                'name'=>$request->name,
                'description'=>$request->description,
                'election_id'=>$request->election_id,
                //'password'=>$request->email,
            ],env('API_URL').'/position/createposition/');
    
            if(json_decode(json_encode($save))->status_code==500){
                $customers = ElectionRequest::post([
               'page'=>1,
               'items'=>10,
           ],env('API_URL').'/position/getallpositions/');

           $cu = ElectionRequest::post([
            'page'=>1,
            'items'=>10000,
            ],env('API_URL').'/election/getallelections/');

           $datas = [];

           if($customers != null){
               foreach ($customers->data as $customer => $value){
                   $datas[$customer] = $value;
               }

               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }else{
               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }
            }

            $customers = ElectionRequest::post([
               'page'=>1,
               'items'=>10,
           ],env('API_URL').'/position/getallpositions/');

           $cu = ElectionRequest::post([
            'page'=>1,
            'items'=>10000,
            ],env('API_URL').'/election/getallelections/');

           $datas = [];

           if($customers != null){
               foreach ($customers->data as $customer => $value){
                   $datas[$customer] = $value;
               }

               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }else{
               return view('position.index')->with([
                   'customers'=>$datas,
                   'election'=>$cu->data
               ]);
           }
           

        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
        
    }

    public function pose(Request $request)
    {
        # code...
        $data = ElectionRequest::post([
            'id'=>$request->id,
        ],env('API_URL').'/position/getparticularposition/');

        $cu = ElectionRequest::post([
            'page'=>1,
            'items'=>10000,
            ],env('API_URL').'/election/getallelections/');
        
        return view('position.position.update',[
            'customer'=>$data->data,
            'election'=>$cu->data
        ]);

    }

    public function update(Request $request)
    {
        # code...
        try{
            
            $save = ElectionRequest::post([
                'id'=>$request->id,
                'name'=>$request->name,
                'description'=>$request->description,
                'election_id'=>$request->election_id,
            ],env('API_URL').'/position/updateposition/');
    
            if(json_decode(json_encode($save))->status_code==500){
                $customers = ElectionRequest::post([
                    'page'=>1,
                    'items'=>10,
                ],env('API_URL').'/position/getallpositions/');
     
                $cu = ElectionRequest::post([
                 'page'=>1,
                 'items'=>10000,
                 ],env('API_URL').'/election/getallelections/');
     
                $datas = [];
     
                if($customers != null){
                    foreach ($customers->data as $customer => $value){
                        $datas[$customer] = $value;
                    }
     
                    return view('position.index')->with([
                        'customers'=>$datas,
                        'election'=>$cu->data
                    ]);
                }else{
                    return view('position.index')->with([
                        'customers'=>$datas,
                        'election'=>$cu->data
                    ]);
                }
            }

            $customers = ElectionRequest::post([
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/position/getallpositions/');
 
            $cu = ElectionRequest::post([
             'page'=>1,
             'items'=>10000,
             ],env('API_URL').'/election/getallelections/');
 
            $datas = [];
 
            if($customers != null){
                foreach ($customers->data as $customer => $value){
                    $datas[$customer] = $value;
                }
 
                return view('position.index')->with([
                    'customers'=>$datas,
                    'election'=>$cu->data
                ]);
            }else{
                return view('position.index')->with([
                    'customers'=>$datas,
                    'election'=>$cu->data
                ]);
            }
           

        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
        
    }

}
