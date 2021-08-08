<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    private function successResponse($data, $code = Response::HTTP_BAD_REQUEST)
    {
        return response($data,$code)->header('Content-Type', 'application/json');
    }

    
    public function errorResponse($messeger, $code)
    {
        return response()->json(['error' => $messeger, 'code' => $code], $code);
    }



    public function errorMessage($messeger, $code)
    {
        return response($messeger,$code)->header('Content-Type', 'application/json');
    }

 
}