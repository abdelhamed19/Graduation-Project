<?php
namespace App\Helpers;

Class BaseResponse
{
    public static function MakeResponse($data=null,$status, $message)
    {
        return response()->json([
        'data'=>$data,
        'success'=>$status,
        'message'=>$message]
        );
    }
}
