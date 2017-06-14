<?php

namespace App\Http\Controllers;

use App\Members;
use Illuminate\Http\Request;
class MembersController extends ControllerBase
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request){
        $Members = new Members();
        $Members->first_name=$request->input('first_name');
        $Members->last_name=$request->input('last_name');
        $Members->address=$request->input('address');
        $Members->email=$request->input('email');
        $Members->contact=$request->input('contact');
        try{
        $save= $Members->save();
        if($save){
            return $this->_sendResponse(parent::STATUS_SUCCESS,'Inserted',$Members);
            }
        }
        
            catch(Exception $e){
                return $this->_sendResponse(parent::STATUS_FAILED,$e->getMessage());
         }
        
    
    }
    public function lists(Request $request){
        $start=(int)$request->input('start');
        $length=(int)$request->input('length');
        $lists=Members::skip($start*$length)
                ->take($length)
                ->get();

        $total=$filtered=Members::count();
        $result=[
            'total'=>$total,
            'filtered'=>$filtered,
            'items'=>$lists
        ];
        return $this->_sendResponse(parent::STATUS_SUCCESS,'OK',$result);
    }
    public function update(Request $request,$id){
        $findMember=Members::find($id);
        if($findMember){
            $input=$request->input();
            foreach($input as $key=>$value){
                $findMember->$key=$value;
            }
            $update=$findMember->update();
            if($update){
                return $this->_sendResponse(parent::STATUS_SUCCESS,'Member Updated',$findMember);
            }
            else{
                return $this->_sendResponse(parent::STATUS_FAILED,'Member Deleted');
            }            
        }
        return $this->_sendResponse(parent::STATUS_FAILED,'Member Not Found');
    }
    public function delete(Request $request, $id){
        $findMember=Members::find($id);
        if($findMember){
            $delete=$findMember->forceDelete();

            if($delete){
                return $this->_sendResponse(parent::STATUS_SUCCESS,'Member Deleted');
            }
            else{
                return $this->_sendResponse(parent::STATUS_FAILED,'Member Deleted');
            }
        }
        return $this->_sendResponse(parent::STATUS_FAILED,'Member Not Found');
        
    }
    //
}
