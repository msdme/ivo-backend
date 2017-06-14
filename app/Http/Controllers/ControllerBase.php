<?php

namespace App\Http\Controllers;
use App\Members;
class ControllerBase extends Controller{
	const STATUS_SUCCESS='success';
	const STATUS_FAILED='failed';
	protected function _sendResponse($status,$message,$data=[]){

		return [
			'status'=>$status,
			'message'=>$message,
			'data'=>$data
		];
	}
}