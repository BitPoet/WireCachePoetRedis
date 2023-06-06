# WireCachePoetRedis
Redis caching for the [ProcessWire CMS](https://processwire.com)

## Compatibility
Requires ProcessWire 3.0.219 or later.

## Status
This is a first release and may still experience major changes. It used prefixes to
separated ProcessWire and non-ProcessWire contents. That part is still being
finalized. Unless you are daring and willing to take a stab at the code in case
things go wonky, you'll probably want to wait a week or two for a beta version.

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
Install *WireCache Module for Redis* and configure the connection to your Redis instance.

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
This module comes with ProcessPoetRedis. When you install 'WireCache Redis Admin',
you will find a new entry *Redis WireCache* under *Setup* in the ProcessWire backend.
It gives you an overview about the settings, statistics and possible errors of your
connected Redis instance and lets you flush the cache database.

## License
Lincensed under Mozilla Public License 2.0. See file "LICENSE" in this package
for details.
