<?php

namespace App\Http\Controllers;

use App\Eventkpop;
use Illuminate\Http\Request;

class eventkpopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventkpops = Eventkpop::orderBy('id', 'DESC')->paginate(5);
        return view('eventkpop.index', compact('eventkpops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventkpop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'tempat' => 'required'
        ]);

        $eventkpop = Eventkpop::create($request->all());

        return redirect()->route('eventkpop.index')->with('message', 'Artikel berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventkpop = Eventkpop::findOrFail($id);
        return view('eventkpop.show', compact('eventkpop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventkpop = Eventkpop::findOrFail($id);
        return view('eventkpop.edit', compact('eventkpop'));
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
        $this->validate($request, [
            'nama' => 'required',
            'tempat' => 'required'
        ]);

        $eventkpop = Eventkpop::findOrFail($id)->update($request->all());

        return redirect()->route('eventkpop.index')->with('message', 'Artikel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventkpop = Eventkpop::findOrFail($id)->delete();
        return redirect()->route('eventkpop.index')->with('message', 'Artikel berhasil dihapus!');
    }
}