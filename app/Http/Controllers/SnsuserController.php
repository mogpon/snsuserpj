<?php

namespace App\Http\Controllers;

use App\Models\Snsuser;
use Illuminate\Http\Request;

class SnsuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Snsuser::all();
        return response()->json([
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Snsuser::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Snsuser  $snsuser
     * @return \Illuminate\Http\Response
     */
    public function show(Snsuser $snsuser)
    {
        $item = Snsuser::find($snsuser);
        if ($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
    }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snsuser  $snsuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snsuser $snsuser)
    {
        $update = [
            'displayName' => $request->displayName,
            'uid' => $request->uid
        ];
        $item = Snsuser::where('id', $snsuser->id)->update($update);
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snsuser  $snsuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snsuser $snsuser)
    {
        $item = Snsuser::where('id', $snsuser->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
