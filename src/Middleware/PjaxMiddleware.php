<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\DomCrawler\Crawler;

class PjaxMiddleware
{
    /**
     * Constructor.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     * @param  \Psr\Http\Message\ResponseInterface      $response
     * @param  callable                                 $next
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $response = $next($request, $response);

        if (! $request->hasHeader('x-pjax') || $this->isRedirection($response)) {
            return $response;
        }

        $crawler = new Crawler((string) $response->getBody());
        $content = $crawler->filter($request->getHeaderLine('x-pjax-container'));

        $response->getBody()->write($content->html());

        return $response->withHeader('x-pjax-url', $request->getUri()->getPath());
    }

    /**
     * Check if the response is a redirection.
     *
     * @param  \Psr\Http\Message\ResponseInterface $response
     *
     * @return boolean
     */
    protected function isRedirection(ResponseInterface $response)
    {
        return in_array($response->getStatusCode(), range(300, 307));
    }
}
