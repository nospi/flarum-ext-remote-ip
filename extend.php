<?php

namespace nospi\RemoteIp;

use Flarum\Extend;
use Flarum\Http\Middleware\ProcessIp;
use nospi\RemoteIp\Middleware\ProcessRemoteIp;

return [
    (new Extend\Middleware('forum'))
        ->replace(ProcessIp::class, ProcessRemoteIp::class),

    (new Extend\Middleware('admin'))
        ->replace(ProcessIp::class, ProcessRemoteIp::class),

    (new Extend\Middleware('api'))
        ->replace(ProcessIp::class, ProcessRemoteIp::class),

    (new Extend\Settings())
        ->default('nospi-remoteip.header', 'HTTP_X_FORWARDED_FOR')
];
