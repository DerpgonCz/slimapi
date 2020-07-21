<?php

declare(strict_types=1);

namespace SlimAPI;

use Psr\Http\Message\ServerRequestInterface;
use Slim\App as BaseApp;
use Slim\ResponseEmitter;
use SlimAPI\DI\ContainerAdapter;
use SlimAPI\Http\Response;

class App extends BaseApp
{
    public function getContainer(): ContainerAdapter
    {
        /** @var ContainerAdapter $container */
        $container = parent::getContainer(); // just for code completion
        return $container;
    }

    public function run(?ServerRequestInterface $request = null): void
    {
        if ($request === null) {
            $request = $this->getContainer()->getByType(ServerRequestInterface::class);
        }

        $response = $this->handle($request);
        $responseEmitter = new ResponseEmitter();
        $responseEmitter->emit($response);
    }

    public function handle(ServerRequestInterface $request): Response
    {
        /** @var Response $response */
        $response = parent::handle($request); // just for code completion
        return $response;
    }
}
