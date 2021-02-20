<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class FrontController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->search;

      if($search !== null)
      {
        $cars = Car::whereAvailable(1)->where('brand', 'LIKE', "%{$search}%")
                                      ->orWhere('type', 'LIKE', "%{$search}%")
                                      ->orWhere('model', 'LIKE', "%{$search}%")
                                      ->orWhere('price', 'LIKE', "%{$search}%")
                                      ->paginate(6, ['*'], 'cars');
      }
      else
      {
        $cars = Car::whereAvailable(1)->paginate(6, ['*'], 'cars');
      }
      $collection = Car::paginate(6, ['*'], 'collection');
      return view('welcome', ['cars' => $cars , 'collection' => $collection ]);
    }
}
