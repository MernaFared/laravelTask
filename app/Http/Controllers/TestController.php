<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{

    public function store(Request $request)
    {
        $car = new Car;
        $car->carTitle = $request->input('carTitle');
        //$car->price = $request->input('price');
        $car->description = $request->input('description');
        $car->published = $request->has('published');  

        $car->save();

        return "Car data added successfully";
    }
    public function storeCarData(){
        return view ('add-car-form');
    }
    public function showCarData(Request $request){
        

        $msg = "car title is : ".$request->carTitle ."<br> price is : ".$request->price."<br> description is : ".$request->description ;
        return $msg;
    }

    // public function store(Request $request)
    // {
    //     $cars = new Car;
    //     $cars->carTitle = "BMW";
    //     $cars->description = "My Description is here";
    //     $cars->published = true;
    //     $cars->save();
    //     return "Car data added successfully";

    // }

    // public function showForm()
    // {
    //     return view('add-car-form');
    // }

    // public function addCar(Request $request)
    // {
    //     $data = $request->all();
    //     return redirect()->route('show-car')->with('data', $data);
    // }
    

    // public function showCar()
    // {
    //     $data = session('data');
    //     return view('show-car', compact('data'));
    // }
}
