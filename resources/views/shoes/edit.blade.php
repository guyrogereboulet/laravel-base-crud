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
  <form action=" {{(!empty($shoe)) ? route('shoes.update', $shoe->id) : route('shoes.store')}}" method='post'>
      {{-- è importante che questi token siano dentro il form --}}
      @csrf
      @if(!empty($shoe))
       @method('PATCH')
       @else
       @method('POST')
      @endif
      <div class="">
        <input type="text" name="ean" value="{{(!empty($shoe)) ? $shoe->ean : ''}}" placeholder="ean">
      </div>
      <div class="">
        <input type="text" name="brand" value="{{(!empty($shoe)) ? $shoe->brand : ''}}" placeholder="brand">
      </div>
      <div class="">
        <input type="text" name="price" value="{{(!empty($shoe)) ? $shoe->price : ''}}" placeholder="price">
      </div>
      <div class="">
        <input type="text" name="typology" value="{{(!empty($shoe)) ? $shoe->typology : ''}}" placeholder="typology">
      </div>
      <div class="">
        <input type="text" name="genre" value="{{(!empty($shoe)) ? $shoe->genre : ''}}" placeholder="genre">
      </div>
      <div class="">
        <input type="date" name="year" value="{{(!empty($shoe)) ? $shoe->year : ''}}" placeholder="year">
      </div>
      @if(!empty($shoe))
      <input type="hidden" name="id" value="{{$shoe->id}}">
      @endif
      <button type="submit" name="button">
          Save
      </button>
  </form>


@endsection

@section('footer')
@endsection
