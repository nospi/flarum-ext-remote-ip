<?php

namespace nospi\RemoteIp\Middleware;

use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface;
use Flarum\Settings\SettingsRepositoryInterface;

123

class ProcessRemoteIp implements Middleware
{
    private $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $header = $this->settings->get('header', 'HTTP_X_FORWARDED_FOR');
        $proxyIp = Arr::get($request->getServerParams(), 'REMOTE_ADDR', '127.0.0.1');
        $remoteIp = Arr::get($request->getServerParams(), $header, $proxyIp);

        return $handler->handle($request->withAttribute('ipAddress', $remoteIp));
    }
}
