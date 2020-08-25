@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left" style="margin-bottom: 10px;">
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="d-flex justify-content-center" style="color: white">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="title">
                    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit"
                        style="color: white">Search</button>
                    </span>
                </div>
            </form>
        </div>

        <div class="row justify-content-center">
            <table class="table" style="color: white">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Year</th>
                        <th>More info</th>
                    </tr>
                </thead>

                @if (isset($movie))
                    @foreach ($movie as $item)

                        <tr>
                            <td> {{ $item->title }} </td>
                            <td> {{ $item->year }} </td>
                            <td>
                                <form method="POST" action="/movie/{{ $item->id }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">More info</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>

    </div>
@endsection
