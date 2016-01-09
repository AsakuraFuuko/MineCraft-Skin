<?php

namespace App\Http\Controllers;

use App\MCID;
use App\Repositories\MCIDRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MCIDController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mcids = MCID::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        return view("myid.index")->withMcids($mcids);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mcid' => 'required|unique|max:255',
        ]);

        $request->user()->mcids()->create([
            'mcid' => $request->mcid,
            'genuine' => $request->genuine
        ]);

        return redirect('/myid');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mcid = MCID::findOrFail($id);
        return view("myid.edit")->withMcid($mcid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $this->validate($request, [
//            'mcid' => 'required|max:255',
//        ]);

        $mcid = MCID::findOrFail($id);

//        $mcid->mcid = $request->mcid;
        $mcid->genuine = $request->genuine;
        $mcid->save();

        return redirect("/myid/$id/edit")
            ->withSuccess("修改已保存.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mcid = MCID::findOrFail($id);
        $mcid->delete();

        return redirect('/myid')
            ->withSuccess("'$mcid->mcid' 已删除.");
    }
}
