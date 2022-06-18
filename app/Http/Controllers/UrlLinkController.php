<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlLink;
use Illuminate\Support\Facades\Validator;


class UrlLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = UrlLink::get();
        return response()->json($urls, 200);
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
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'url_link' => 'required',
            'is_open_in_new_tab' => 'required',
            
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors(),
            ], 422);
        }

        $links = new UrlLink;
        $links->title = $request->title;
        $links->url_link = $request->url_link;
        $links->is_open_in_new_tab = $request->is_open_in_new_tab;
        $links -> save();

        return response()->json($links,200);

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $links = UrlLink::find($id);
        $links->title = $request->title;
        $links->url_link = $request->url_link;
        $links->is_open_in_new_tab = $request->is_open_in_new_tab;
        $updateModel = $links->update();

        return response()->json($links, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $links =  UrlLink::findOrfail($id);
        $links->delete();

        return response()->json($links, 200);
    }
}
