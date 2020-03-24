@extends('layouts.layout')

@section('header')
  <h1>All Shoes</h1>
@endsection

@section('main')
 <div class="shoes">
   @foreach ($shoes as $shoe)
      <div class="shoe">
        <ul>
          <li>Id:{{$shoe->id}}</li>
          <li>Ean:{{$shoe->ean}}</li>
          <li>Brand:{{$shoe->brand}}</li>
          <li>Price:{{$shoe->price}}</li>
          <li>Typology{{$shoe->typology}}</li>
          <li>Genre:{{$shoe->genre}}</li>
          <li>Year:{{$shoe->year}}</li>
          <li>Created at:{{$shoe->created_at}}</li>
          <li>Updated at:{{$shoe->updated_at}}</li>
        </ul>
      </div>
   @endforeach
  </div>
@endsection

@section('footer')
@endsection
