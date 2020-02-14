<?php

namespace Amedina\ChuckNorrisJokes\Console;

use Amedina\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Console\Command;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris';

    protected $description = 'output Chuck Norris Jokes';

    public function handle()
    {
        $this->info(ChuckNorris::getRandomJoke());
    }
}
