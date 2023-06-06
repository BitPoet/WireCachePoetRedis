# WireCachePoetRedis
Redis caching for the ProcessWire CMS

## Compatibility
Requires ProcessWire 3.0.219 or later.

## Status
This is a first release and still needs a lot of testing in the field.

## Prerequisites
To use this module, you need
- [phpredis](https://github.com/phpredis/phpredis) installed in your PHP environment.
  There are pre-built binary packages for most OSes and PHP releases.
- A running Redis instance. Make sure to secure your installation!

## Description
This is a Redis-based implementation of the WireCache Interface introduced with
ProcessWire development version 3.0.218. When installed, configured and activated,
calls to [$cache](https://processwire.com/api/ref/wire-cache/) are handed off to WireCachePoetRedis.
This can bring large performance improvements in environments with a large number of cached values.

Before using this module in production, you may want to compare performance
between this module, the defauilt WireCacheDatabase and the new WireCacheFilesystem
module. Not every caching strategy fits every application.

## Usage
Install the module and configure the connection to your Redis instance.

WireCachePoetRedis supports
- TCP connections
- Unix Domain Sockets
- Legacy (password only) authentication
- ACL based authentication (username + password)
- Transport Layer Security

Enter the correct settings in the module's configuration and activate it.

Then use $cache as laid out in the PW docs. You do not need to care about
implementation specifics of this module.

## Advanced
This module comes with ProcessPoetRedis. When installed, you will find a new
entry *Redis WireCache* under *Setup* in the ProcessWire backend. It gives
you an overview about the settings, statistics and possible errors of your
connected Redis instance and lets you flush the cache database.

## License
Lincensed under Mozilla Public License 2.0. See file "LICENSE" in this package
for details.
