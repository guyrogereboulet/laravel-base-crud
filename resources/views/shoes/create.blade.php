@extends('layouts.layout')

@section('header')
  <h1>Insert a shoe</h1>
  {{-- Stampa un errore se non inseriamo dei dati che non rispettino i criteri --}}
 @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
      </ul>
  </div>
 @endif
@endsection

@section('main')
  <form action=" {{route('shoes.store')}}" method='post'>
      {{-- è importante che questi token siano dentro il form --}}
      @csrf
      @method('POST')
      <div class="">
        <input type="text" name="ean" value="" placeholder="ean">
      </div>
      <div class="">
        <input type="text" name="brand" value="" placeholder="brand">
      </div>
      <div class="">
        <input type="text" name="price" value="" placeholder="price">
      </div>
      <div class="">
        <input type="text" name="typology" value="" placeholder="typology">
      </div>
      <div class="">
        <input type="text" name="genre" value="" placeholder="genre">
      </div>
      <div class="">
        <input type="date" name="year" value="" placeholder="year">
      </div>

      <button type="submit" name="button">
          Save
      </button>
  </form>


@endsection

@section('footer')
@endsection
