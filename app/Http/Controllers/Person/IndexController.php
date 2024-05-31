<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;
class IndexController extends Controller
{

    public function index()
    {
        $people = Person::all();
        return $people;
    }


}
