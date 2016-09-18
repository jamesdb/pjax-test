<?php

namespace App\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;

class ZendDiactorosServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        Response::class,
        SapiEmitter::class,
        ServerRequest::class
    ];

    public function register()
    {
        $this->getContainer()->add(Response::class);
        $this->getContainer()->share(SapiEmitter::class);
        $this->getContainer()->share(ServerRequest::class, function () {
            return ServerRequestFactory::fromGlobals();
        });
    }
}
