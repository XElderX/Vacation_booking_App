<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ApiBookinOrderController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $rules = [
            'name' => 'required',
            'surname' => 'required',
            'nationality' => 'required',
            'DOB' => ['required'],
            'hotel_id' => 'required',
            
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            $booking = new Order();
            $booking->name = $data['name'];
            $booking->surname = $data['surname'];
            $booking->nationality = $data['nationality'];
            $booking->DOB = $data['DOB'];
            $booking->hotel_id = $data['hotel_id'];
            return ($booking->save() !== 1) ? 
                response()->json(['success' => 'success'], 201) : 
                response()->json(['error' => 'saving to database was not successful'], 500)  ;
        } else {
            return $validator->errors()->all();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::findOrFail($id);
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
    public function destroy($id)
    {
        return (Order::destroy($id) == 1) ? 
        response()->json(['success' => 'success'], 200) : 
        response()->json(['error' => 'deleting from database was not successful'], 500);
    }
}
