<?php

namespace App;

class ApiResponse{

    public function success($data, string $message, int $status=200){
        $result["message"]=$message;
        if(is_array($data)){
            $result["count"]=count($data);
        }
        else{
            $result["count"]=1;
        }
        $result["data"]=$data;
        return response()->json($result,$status);
    }

    public function error(string $error, string $message, int $status){
        $data["error"]=$error;
        $data["message"]=$message;

        return response()->json($data,$status);
    }
}



?>