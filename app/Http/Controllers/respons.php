<?php
namespace app\Http\Controllers;


trait respons
{

    public function traitresponses($data = null, $status = 200, $message = null)
    {

        $array = [
            'data' => $data,
            'status' => $status,
            'message' => $message,
        ];

        return response($array);
    }

    // public function responsfailorfine($post)
    // {
    //     if ($post) {
    //         return response(201);
    //     }

    //     return response(404);
    // }
    public function res($masseg, $status)
    {
        $array = [
            'masseg' => $masseg,
            'status' => $status,
        ];

        return response($array);
    }


}