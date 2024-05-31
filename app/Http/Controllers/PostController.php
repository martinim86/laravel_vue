<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __invoke()
    {
        return 1111;
    }
    public function post(){
        $persons =[
            [
                'id'=>1,
                'name'=>"zasia",
                'age'=>15,
                'hi'=>2
            ],
            [
                'id' => 2,
                'name'=>"zVasia2",
                'age'=>50,
                'hi'=>3
            ]
        ];
        return $persons;
    }

   
}
