<?php

namespace App\Controller;

use App\Contract\TemplateAwareInterface;
use App\Contract\TemplateAwareTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MainController implements TemplateAwareInterface
{
    use TemplateAwareTrait;

    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $response->getBody()->write(
            $this->getTemplateDriver()->render('hello.html')
        );

        return $response;
    }

    public function test(ServerRequestInterface $request, ResponseInterface $response)
    {
        $response->getBody()->write(
            $this->getTemplateDriver()->render('test.html')
        );

        return $response;
    }

    public function another(ServerRequestInterface $request, ResponseInterface $response)
    {
        $response->getBody()->write(
            $this->getTemplateDriver()->render('another.html')
        );

        return $response;
    }
}
