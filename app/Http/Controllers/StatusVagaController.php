<?php

namespace App\Http\Controllers;

use App\StatusVaga;
use Illuminate\Http\Request;

class StatusVagaController extends Controller {

    private $status;

    public function __construct(StatusVaga $status) {
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $status = $this->status->all();
        echo $status;
        return view('statusVagas.index2', compact('statusVagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusVaga  $statusVaga
     * @return \Illuminate\Http\Response
     */
    public function show(StatusVaga $statusVaga) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusVaga  $statusVaga
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusVaga $statusVaga) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusVaga  $statusVaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusVaga $statusVaga) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusVaga  $statusVaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusVaga $statusVaga) {
        //
    }

}
