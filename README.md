# WireCachePoetRedis
Redis caching for the [ProcessWire CMS](https://processwire.com)

## Compatibility
Requires ProcessWire 3.0.219 or later.

## Status
This is a first release and may still experience major changes. It used prefixes to
separate ProcessWire and non-ProcessWire contents. That part is still being
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
This module ships with ProcessPoetRedis. When you install 'WireCache Redis Admin',
you will find a new entry *Redis WireCache* under *Setup* in the ProcessWire backend.
It gives you an overview about the settings, statistics and possible errors of your
connected Redis instance and lets you flush the cache database.

# ToDo

ProcessWire $cache lets you specify a selector as the expiration criteria for
a cache value instead of a fixed time. When a page or template is saved that
matches such a selector, all related cache entries expire. See the [documentation for
$cache::save for details](https://processwire.com/api/ref/wire-cache/save/))

WireCacheDatabase (ProcessWire's default caching engine) stores such selectors
together with the cache entry's data. Doing the same in Redis would be comparably
costly since it would result in expensive scans over all keys.

I've therefore decided to store an extra 'selector expiration entry' for every selector
and save all affected cache keys inside that entry. I'm also considering storing all
selector-to-key relationships in a single entry, which would certainly save round trips, but
it might impact memory usage in large scenarios. So this needs some serious testing
before I can make an educated decision.

## License
Lincensed under Mozilla Public License 2.0. See file "LICENSE" in this package
for details.
