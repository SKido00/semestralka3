<?php

namespace App\Http\Controllers;

use App\Models\FlightMsg;
use Illuminate\Http\Request;

class FlightMsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $flightmsg = FlightMsg::all();
            return datatables()->of($flightmsg)
                ->addColumn('action', function ($row) {
                    $html = '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
                    return $html;
                })->toJson();
        }
        return view('flightmsg.index');

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
     * @return array
     */
    public function store(Request $request)
    {
        $request->validate([
            'flightId' => ['required', 'unique:flight_msgs', 'max:10'],
            'msgText' => ['required', 'max:150'],
        ]);
        FlightMsg::create($request->all());
        return ['success' => true, 'message' => 'Inserted Successfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        return;
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
     * @return void
     */
    public function update($id)
    {
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        FlightMsg::find($id)->delete();
        return ['success' => true, 'message' => 'Deleted Successfully'];
    }
}

