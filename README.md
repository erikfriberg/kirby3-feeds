# Kirby3 feeds

 ![License](https://img.shields.io/github/license/mashape/apistatus.svg) ![Kirby Version](https://img.shields.io/badge/Kirby-3%2B-black.svg) [![Issues](https://img.shields.io/github/issues/omz13/kirby3-feeds.svg)](https://github.com/omz13/kirby3-feeds/issues)

**Requirement:** Kirby 3

## Documentation

### Purpose

For a kirby3 site, this plugin (_omz13/feeds_)  generates syndication feeds in RSS, ATOM, and JSON formats.

- Generates syndication feeds based on a Kirby3 `collection`.
- Generates a [RSS 2.0](https://validator.w3.org/feed/docs/rss2.html) syndication feed (at `/feeds/rss`).
- Generates an [ATOM](https://validator.w3.org/feed/docs/atom.html) syndication feed (at `/feeds/atom`).
- Generates a [JSON 1](https://jsonfeed.org/version/1) syndication feed (at `/feeds/json`).
- Generates a sub-setted syndication feed at `feeds/<category>/atom|json|rss`) where `<category>`` is mapped to a kirby `collection`.
- A feed will have a maximum of 60 items.
- The generated syndication feeds are cached in the server for a determined amount of time, c.f. `cacheTTL` in _Configuration_, to mitigate server load.
- Only pages that have a status of "published" are included, i.e. those with "draft" or "unpublished" are excluded.
- Respects `If-Modified-Since` and  `If-None-Match` headers and will return a `304 Not Modified` response if appropriate.
- For debugging purposes, the generated sitemap can include additional information as comments; c.f. `debugqueryvalue` in _Configuration_.

Caveat:
- Withdrawn pages (i.e. with a method `issunset` that returns `true`) can be excluded by appropriate configuration within a collection.
- Pages under an embargo (i.e. with a method `isunderembargo` that returns `true`) can similarly be managed.

Note:: This is not be a free plugin. In order to use it on a production server, you need to buy a license. For details, scroll down to the License section of this document.

### Client Support

RSS feeds are generally well supported by clients; the ATOM feed offers some extra technical niceties, but client support varies; the JSON format is very new, and client support varies.

In terms of client for OS X:
- [ReederApp](http://reederapp.com) supoorts all three formats.
- [Vienna](http://www.vienna-rss.com) does RSS and ATOM but not JSON.
- [Readkit](https://readkitapp.com), for some unknown reason, is über-fussy does not like anything generated by this plugin.
- [Leaf](https://rockysandstudio.com) supports RSS and ATOM - note: not updated since Nov 2017.
- [NetNewsWire](https://ranchero.com/netnewswire/) - supoorts all three formats - note: v5 has gone back to Brent, so very _alpha_ at the moment.

In terms of iOS:
- ReederApp - see OS X
- Readkit - see OS X
- [NewsExplorer]() - supoorts all three formats

In terms of generic services/clients:
- [FeedBin](https://feedbin.com/)
- [Feedly](https://feedly.com/) supports RSS
- [FeedWrangler](https://feedwrangler.net/)
- [NewsBlur](https://www.newsblur.com) supports all three formats.

In terms of Windows clients: sorry, I have no idea as inhabit an OS X / iOS world.

#### Related plugins

For a plugin that provides the methods `issunset` and `isunderembargo`, kindly see [omz13/kirby3-suncyclepages](https://github.com/omz13/kirby3-suncyclepages).

#### Caveat

Kirby3 is under beta, therefore this plugin, and indeed kirby3 itself, may or may not play nicely with each other, or indeed work at all: use it for testing purposes only; if you use it in production then you should be aware of the risks and know what you are doing.

#### Roadmap

For 1.0, the non-binding list of planned features and implementation notes are:

- [x] MVP
- [ ] Linkblogs
- [ ] Splitting
- [x] Source by collection
- [ ] Languages
- [x] Author into item stream
- [ ] Category into item stream
- [x] Generate feed discovery headers
- [x] dc for RSS

### Installation

#### via composer

If your kirby3-based site is managed using-composer, simply invoke `composer require --no-dev omz13/kirby3-feeds`, or add `omz13/kirby3-feeds` to the "require" component of your site's `composer.json` as necessary, e.g. to be on the bleeding-edge:

```yaml
"require": {
  ...
  "omz13/kirby3-feeds": "@dev",
  ...
}
```

#### via git

Clone github.com/omz13/kirby3-feeds into your `site/plugins` and then in `site/plugins/kirby3-feeds` invoke ``composer update --no-dev`` to generate the `vendor` folder and the magic within.

```sh
$ git clone github.com/omz13/kirby3-feeds site/plugins/kirby3-feeds
$ cd site/plugins/kirby3-feeds
$ composer update --no-dev
```

If your project itself is under git, then you need to add the plugin as a submodule and possibly automate the composer update; it is assumed if you are doing this that you know what to do.

### Configuration

There are three aspets that need configuration:

- `config.php`
- Feed discovery
- Collections

#### `config.php`

In your site's `site/config/config.php` the following entries prefixed with `omz13.feeds.` can be used:

- `disable` - optional - boolean - default `false` - a boolean which, if true, to disable serving syndication feeds. Requests to such pages will receive a `503 Service Unavailable`.
- `cacheTTL` - optional - integer - default `10` - the number of minutes that a feed should be cached before being regenerated; if explicitly set to zero, the cache is disabled. If not specified a default of 10 minutes is assumed.
  - `firehose` - optional - string - default `'articles'` - the name of the kirby collection to be used for the 'firehose' feed /feeds/atom|json|rss.
  - `categories` - optional - array - default `[ 'articles'] ` - the names of the kirby collections that can be accessed using the uri /feeds/<category>/atom|json|rss. If an empty array is specifed (`[]`) then this feature is disabled.
- `debugqueryvalue` - optional - string - the value for the query parameter `debug` to return a feed with debugging information (as comments within response). The global kirby `debug` configuration must also be true for this to work. Be aware that the debugging information will show, if applicable, details of any pages that have been excluded (so if you are using this in production and you don't want things to leak, set `debugqueryvalue` to something random). Furthermore, the site debug flag needs to be set too (i.e. the `debug` flag in `site/config.php`).
- `root` : an array of slugnames whose pages are to be included if their status is unlisted.
- `author` - optional - string - default `'Staff Writer'` - the name to be used for each item in a feed when either the author is unknown or the syndication format does not allow an author name (looking at you RSS2).

#### Feed discovery

At a minimum you need to add appropriate feed-discovery links to your site's homepage.

This plugin provides two snippets to do this:

- `feeds-header` - to provide the links for all feeds (firehose and category-based)
- `firehose-feeds-header` - to provide the links for the firehose feed only.

Example:

In `site/snippets/header.php` - or equivalent - simply add:


```php
<?php snippet('feeds-header') ?>
```

#### Collections

For the default (firehose) syndication feed, you need to ensure that you have a collection and have configured it. Typically this would be an 'articles' collection, and an example would be:

```php
<?php

return function ($site) {
    return $site->find('blog')->children()->listed()->flip();
};
```

If using [omz13/suncyclepages](https://github.com/omz13/kirby3-suncyclepages) for embargo and withdraw, this would then be:

```php
<?php

return function ($site) {
	    return $site->find('blog')->children()->listed()->isunderembargo(false)->issunset(false)->flip();
};
```

### Use

For example, for the [Kirby Starter Kit](https://github.com/k-next/starterkit), the following would be applicable:

```php
<?php

return [
  'omz13.feeds.cacheTTL' => 60,
  'omz13.feeds.firehose' => [ 'articles' ],
  ],
];
```

_For experimental purposes this plugin implements a single-level pseudo-namespace. You can mix discrete vs array options, but try not to, and be aware that priority is given to the array variant. The above discrete configuration would therefore become:_

```php
<?php

return [
  'omz13.feeds' => [
    'cacheTTL' => 60,
    'firehose' => [ 'articles' ],
  ],
];
```

See Kirby3's [issue #761](https://github.com/k-next/kirby/issues/761) for more about namespaced options.

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/omz13/kirby3-feeds/issues/new).

## License

### Buy Me A Coffee

Until kirby3 has been officially released, you are free to use and evaluate this plugin on test or production servers AT YOUR OWN RISK. There is no warranty. Support is at my discretion. Did I mention that I like coffee? To show your support for this project you are welcome to [buy me a coffee](https://buymeacoff.ee/omz13).
