<?php

namespace App\Http\Controllers;

use App\Movie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$movie = Movie::all();
        return view('movies.index', ['movie' => $movie]);
    }

    public function search(Request $request)
    {
        $title = $request['title'];
        $movie = Movie::where('title', 'LIKE', '%' . $title . '%')->get();

        if (count($movie) > 0) {

            return view('movies.index', ['movie' => $movie]);
        } else {
            $title = $this->storeFromApi($title)['title'];
            $movie = Movie::where('title', 'LIKE', '%' . $title . '%')->get();
            if (count($movie) > 0) {
                return view('movies.index', ['movie' => $movie]);
            }
        }
    }

    public function indexApi()
    {
        return Movie::all();
    }

    public function searchApi(Request $request, $title)
    {
        $movie = Movie::where('title', 'LIKE', '%' . $title . '%')->get();

        if (count($movie) > 0) {
            return $movie;
        } else {
            $title = $this->storeFromApi($title)['title'];
            $movie = Movie::where('title', 'LIKE', '%' . $title . '%')->get();
            if (count($movie) > 0) {
                return $movie;
            }
        }
    }

    public function showDetails($id)
    {
        $movieDetails = Movie::find($id);
        return view('movies.details', ['movieDetails' => $movieDetails]);
    }

    private function storeFromApi($title)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://www.omdbapi.com/?apikey=8fbd0aaa&t=' . $title);
        $body = $response->getBody()->getContents();
        $movie = json_decode($body, true);

        if ($movie["Response"] == "True") {
            Movie::create([
                'title' => $movie["Title"],
                'year' => $movie["Year"],
                'rating' => $movie["Rated"],
                'release_date' => $movie["Released"],
                'runtime' => $movie["Runtime"],
                'genre' => $movie["Genre"],
                'director' => $movie["Director"],
                'writer' => $movie["Writer"],
                'actors' => $movie["Actors"],
                'plot' => $movie["Plot"],
                'language' => $movie["Language"],
                'country' => $movie["Country"],
                'awards' => $movie["Awards"],
                'poster' => $movie["Poster"],
                'imdb_rating' => $movie["imdbRating"],
                'meta_rating' => $movie["Metascore"],
                'imdb_id' => $movie["imdbID"],
                'type' => $movie["Type"],
                'response' => $movie["Response"],
            ]);
        }

    }
}
