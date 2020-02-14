<?php

namespace Amedina\ChuckNorrisJokes\Http\Controllers;

use Amedina\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        $joke = ChuckNorris::getRandomJoke();
        return view('chuck-norris::joke', compact('joke'));
    }
}
