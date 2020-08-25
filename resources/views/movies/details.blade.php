@extends('layouts.app')

@section('content')
<div class="container" style="color:white">
    <div class="row justify-content-center">
        <h1>{{$movieDetails->title}}</h1>
    </div>
        <br>
    <div class="row justify-content-center">
        <img src="{{$movieDetails->poster}}" alt="poster">
        <br>
    </div>
    <br>
    <div class="row justify-content-center">
        <p>Year: {{$movieDetails->year}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Rating: {{$movieDetails->rating}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Release date: {{$movieDetails->release_date}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Runtime: {{$movieDetails->runtime}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Genre: {{$movieDetails->genre}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Director: {{$movieDetails->director}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Writer: {{$movieDetails->writer}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Actors: {{$movieDetails->actors}}</p>
    </div>
    <div class="row justify-content-center">
        <p>Plot: {{$movieDetails->plot}}</p>
    </div>
    <div class="row justify-content-center">
    <a href="https://www.imdb.com/title/{{$movieDetails->imdb_id}}/"><p>Imdb Link</p></a>
    </div>
</div>
@endsection
