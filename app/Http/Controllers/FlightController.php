<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $flight = Flight::all();
            return datatables()->of($flight)
                ->addColumn('action', function ($row) {
                    $html = '<a href="#" class="btn btn-xs btn-secondary btn-edit">Edit</a>';
                    $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
                    return $html;
                })->toJson();
        }
        return view('flight.index');

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
            'arcid' => ['required', 'max:10'],
            'rule' => ['required', 'max:1'],
            'acType' => ['required', 'max:10'],
            'adep' => ['required', 'max:4'],
            'ades' => ['required', 'max:4'],
            'eet' => ['required'],
            'dof' => ['required'],
            'flevel' => ['required', 'max:5'],
            'speed' => ['required', 'max:5'],
            'route' => ['max:100'],
            'remark' => ['required', 'max:250'],
        ]);
        Flight::create($request->all());
        return ['success' => true, 'message' => 'Inserted Successfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return array
     */
    public function update(Request $request, $id)
    {
        Flight::find($id)->update(request()->all());
        return ['success' => true, 'message' => 'Updated Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        Flight::find($id)->delete();
        return ['success' => true, 'message' => 'Deleted Successfully'];
    }
}
