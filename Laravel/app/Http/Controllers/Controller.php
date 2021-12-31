<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function json_res(array $data, $status = 200)
    {
        return response()->json($data, $status);
    }

    public function check($request, $rules)
    {
        $validator = Validator::make($request, $rules);

        if($validator->fails()) {
            return $this->json_response([
                'message' => 'Data not Valid', 
                'errors' => $validator->errors()
            ], 422);
        }

        return $validator->validated();
    }
}
