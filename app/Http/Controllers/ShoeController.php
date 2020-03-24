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

       $request->validate([
        'ean' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'typology' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'year' => 'required|string',
        'price' => 'required|numeric|min:1|max:999999.99',
      ]);


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
          //Ritorno alla index dell'item compilato
          $shoe = Shoe::orderBy('id','desc')->first();
           return redirect()->route('shoes.show', compact('shoe'));
       }

       dd('Non salvato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Primo modo
    // public function show($id)
    // {
    //     $shoe = Shoe::find($id);
    //     if (empty($shoe)) {
    //       abort('404');
    //     }
    //
    //     return view('shoes.show', compact('shoe'));
    // }

    //Secondo modo
    public function show(Shoe $shoe)
    {
        // $shoe = Shoe::find($id);
        if (empty($shoe)) {
          abort('404');
        }

        return view('shoes.show', compact('shoe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoe $shoe)
    {
        // dd($shoe);
        if (empty($shoe)) {
          abort('404');
        }

        return view('shoes.edit', compact('shoe'));
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
        $shoe = Shoe::find($id);
        if (empty($shoe)) {
          abort('404');
        }
        $data = $request->all();
        $request->validate([
         'ean' => 'required|string|max:255',
         'brand' => 'required|string|max:255',
         'typology' => 'required|string|max:255',
         'genre' => 'required|string|max:255',
         'year' => 'required|string',
         'price' => 'required|numeric|min:1|max:999999.99',
       ]);

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
