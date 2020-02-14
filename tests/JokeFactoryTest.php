<?php

namespace Amedina\ChuckNorrisJokes\Tests;

use Amedina\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 116, "joke": "Chuck Norris once ate an entire bottle of sleeping pills. They made him blink.", "categories": [] } }'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        $jokes = new JokeFactory($client);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('Chuck Norris once ate an entire bottle of sleeping pills. They made him blink.', $joke);
    }
}
