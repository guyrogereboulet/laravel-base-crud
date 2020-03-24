<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoe;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   ///Mi connetto al database che mostra tutti i risultati con all()
        $shoes = Shoe::all();

        //Passo la variablile $shoes alla index della nostra view
        return view('shoes.index', compact('shoes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // l'oggetto request va a prendere tutti i dati che passiamo tramite la POST (dependencies Injection)
    public function store(Request $request)
    {
       ///Primo modo per salvare sul database
       // dd($request->all());
       $data = $request->all();
       $shoe = new Shoe;
       // $shoe->ean = $data['ean'];
       // $shoe->brand = $data['brand'];
       // $shoe->price = $data['price'];
       // $shoe->typology = $data['typology'];
       // $shoe->genre = $data['genre'];
       // $shoe->year = $data['year'];

       ///Secondo modo per salvare sul database
       $shoe->fill($data);
       $save = $shoe->save();

       //Se i dati vengono veramente salvati
       if($save) {
          //Ritorno alkla index
           return redirect()->route('shoes.index');
       }

       dd('Non salvato');
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
        //
    }
}
