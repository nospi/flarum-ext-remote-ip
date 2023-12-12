# RemoteIP by nospi

![License](https://img.shields.io/badge/license-MIT-blue.svg)

A [Flarum](http://flarum.org) extension. Extracts the real remote IP address when running behind a reverse proxy.

### Installation

```sh
composer require nospi/remoteip
```

### Updating

```sh
composer update nospi/remoteip
php flarum cache:clear
```

### Configuration

You'll need to configure the NGINX proxy server to inject the real remote IP as a header. You can then configure this extension by providing the same header.

#### NGINX Configuration

You will need to set the following directives in your NGINX configuration:

1. real_ip_header X-Forwarded-For;
1. set_real_ip_from 0.0.0.0/0;

The NGINX server used is outside the scope of this tutorial. I use [mesudip/nginx-proxy](https://github.com/mesudip/nginx-proxy) and inject these values into the VIRTUAL_HOST environment variable as outlined in the readme for the project.

`VIRTUAL_HOST=flarum.example.com; real_ip_header X-Forwarded-For; set_real_ip_from 0.0.0.0/0;`

#### Extension Configuration

The header you provide to NGINX will be prefixed with `HTTP_` and converted to uppercase. You'll need to make the same changes when setting the value in the extension settings:

1. header = `HTTP_X_FORWARDED_FOR`

This is the default value.

### Links

- [Discuss](https://discuss.flarum.org/d/<TODO>)
- [Packagist](https://packagist.org/packages/nospi/remoteip)
- [GitHub](https://github.com/nospi/flarum-ext-remote-ip)

An extension by [nospi](https://github.com/nospi).
