<?php

namespace App\Http\Controllers\API;

use App\Domain;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DomainRequest;
use DB;

class domainController extends APIController
{
    public function listdomain($ext,$limit){

      //  dd($ext);
        $unit = \DB::table('domains')
           ->where('ext',$ext)
            ->limit($limit)
            ->orderBy('created_at','asc')
            ->get();
        return response()->json($unit, 200);
    }
    public function getlistDomain($ltd,$limit){

      //  dd($ltd);
        $extlistarr= ['com','net','org','biz'];
      //

        if(in_array($ltd,$extlistarr)){

            $list =  Domain::where('ext','=',$ltd)->limit($limit)->get();

            return response()->json($list, 200);

        }else{


        }



    }
    public function createdomain(Request $request){


        $extlistarr= ['com','net','org','biz','lt'];
        $statusarr = [1,2,3,4];
        $newstatus=1;
        if(in_array($request->ext,$extlistarr) )
        {

            $domain = Domain::firstOrNew(['domainame' => $request->domainame ]);
            $domain->ext = $request->ext;
            $domain->pr=$request->pr;
            $domain->mr=$request->mr;
            $domain->alexa=$request->alexa;
            $domain->backlinks=$request->backlinks;
            $domain->da=$request->da;
            $domain->pa=$request->pa;
            $domain->registered=Carbon::createFromFormat('d-m-Y', $request->registered);
           // $domain->valid= Carbon::parse($request->registered)->addYear(1)->format('Y-m-d');
           // $domain->oldstatus= $domain->status;
       //       $domain->save();
            try {

                $domain->save();
                $domain['status'] = true;
                $domain['data']=$domain->toArray();

            } catch (QueryException $ex) {
                $domain['status'] = false;
                $domain['message'] = 'Operation failed due to '. $ex->getMessage();
                    }
            if ($domain->wasRecentlyCreated) {

                $domain::where('id',$domain->id)->update(array('status'=>0,'oldstatus'=>0,'newstatus'=>0));
                // new user
            } else {
               $newstatus= $domain->newstatus+1;
                $domain::where('id',$domain->id)->update(array('oldstatus'=>$domain->newstatus,
                                                                'newstatus'=>$newstatus,
                                                                 'status'=>$domain->status));
            }

            if($domain['status']){
                return $this->success($domain['status']);
            }else{
                return $this->fail($domain['message']);
            }

        }else{
            $domain =["Bad Request"];

            return response()->json($domain,400);
        }

    }

}
