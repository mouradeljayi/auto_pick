<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Command;
use App\Models\Car;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('commands.index', ['commands' => Command::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'rental_date' => 'required',
          'recovery_date' => 'required',
        ]);

        $timestamp1 = strtotime($request->recovery_date);
        $day1 = date('j', $timestamp1);

        $timestamp2 = strtotime($request->rental_date);
        $day2 = date('j', $timestamp2);

        Command::create([
          'user_id' => auth()->user()->id,
          'car_id' => $request->car_id,
          'rental_date' => $request->rental_date,
          'recovery_date' => $request->recovery_date,
          'total_price' => $request->car_price * ($day1 - ($day2 + 1))
        ]);

        $car = Car::findOrfail($request->car_id);
        $car->update([
          'available' => 0,
        ]);

        return back()->with('success', 'Your Command has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Command $command)
    {
        return view('cars.show', ['command' => $command]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Command $command)
    {
        $car = Car::findOrfail($command->car->id);
        $car->update([
          'available' => 1
        ]);
        $command->delete();
        return back()->with('success', 'Command Deleted !');
    }
}
