<?php
trait ApiResponse{
	public 
		$response = [
			"response" 	=> "ERR",
			"msg" 		=> ""
		];
	
	public function ResponseApi(){
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    	
    	if(isset($this->data)):
    		$this->response['data'] = $this->data;
    	endif;
		echo json_encode($this->response, JSON_NUMERIC_CHECK);
	}
}