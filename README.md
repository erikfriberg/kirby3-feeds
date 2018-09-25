# Kirby3 feeds

 ![License](https://img.shields.io/github/license/mashape/apistatus.svg) ![Kirby Version](https://img.shields.io/badge/Kirby-3%2B-black.svg) [![Issues](https://img.shields.io/github/issues/omz13/kirby3-feeds.svg)](https://github.com/omz13/kirby3-feeds/issues)

**Requirement:** Kirby 3

## Documentation

### Purpose

For a kirby3 site, this plugin (_omz13/feeds_) automatically generates syndication feeds in RSS, ATOM, and Json format.

- Generates a RSS 2.0 syndication feed (at `/feeds/rss.xml`).
- Generates an ATOM syndication feed (at `/feeds/atom,xml`).
- Generates a JSON syndication feed (at `/feeds/feed.json`).
- The generated syndication feeds can be cached for a determined amount of time, c.f. `cacheTTL` in _Configuration_.
- Only pages that have a status of "published" are included, i.e. those with "draft" or "unpublished" are excluded.
- Withdrawn pages (i.e. with a method `issunset` that returns `true`) are excluded.
- Pages under an embargo (i.e. with a method `isunderembargo` that returns `true`) are excluded.
- For debugging purposes, the generated sitemap can include additional information as comments; c.f. `debugqueryvalue` in _Configuration_.

RSS feeds are generally well supported by clients; the ATOM feed offers some extra technical niceties, and client support varies; the JSON format is very new, and client support varies.

In terms of clients:
- [ReederApp](http://reederapp.com) supoorts all three formats.
- [NewsBlur](https://www.newsblur.com) supports all three formats.
- [Vienna](http://www.vienna-rss.com) does RSS and ATOM but not JSON.
- [Readkit](https://readkitapp.com), for some unknown reason, does not like anything generated by this plugin.

#### Related plugins

For a plugin that provides the methods `issunset` and `isunderembargo`, kindly see [omz13/kirby3-suncyclepages](https://github.com/omz13/kirby3-suncyclepages).

#### Caveat

Kirby3 is under beta, therefore this plugin, and indeed kirby3 itself, may or may not play nicely with each other, or indeed work at all: use it for testing purposes only; if you use it in production then you should be aware of the risks and know what you are doing.

#### Roadmap

For 1.0, the non-binding list of planned features and implementation notes are:

- [x] MVP
- [ ] Linkblogs
- [ ] Category Splitting
- [ ] Configurable feed path
- [ ] Source by collection
- [ ] Sponsor inserts

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

The following mechanisms can be used to modify the plugin's behaviour.

#### via `config.php`

In your site's `site/config/config.php` the following entries prefixed with `omz13.feeds.` can be used:

- `disable` - optional - boolean - default `false` - a boolean which, if true, to disable serving syndication feeds. Requests to such pages will receive a `503 Service Unavailable`.
- `cacheTTL` - optional - integer - default `10` - the number of minutes that a feed should be cached before being regenerated; if explicitly set to zero, the cache is disabled. If not specified a default of 10 minutes is assumed.
  - `root` - optional - string - default `'blog'` - the name of the top level parent to be syndicated.
- `debugqueryvalue` - optional - string - the value for the query parameter `debug` to return a feed with debugging information (as comments within response). The global kirby `debug` configuration must also be true for this to work. Be aware that the debugging information will show, if applicable, details of any pages that have been excluded (so if you are using this in production and you don't want things to leak, set `debugqueryvalue` to something random). Furthermore, the site debug flag needs to be set too (i.e. the `debug` flag in `site/config.php`).
- `root` : an array of slugnames whose pages are to be included if their status is unlisted.

#### Feed discovery

In `site/snippets/header.php` - or equivalent - you will need to add the following if you want automatic feed discovery to work:

```php
<link rel="alternate" type="application/atom+xml" title="Subscribe to ATOM feed" href="/feeds/atom.xml" />
<link rel="alternate" type="application/json"     title="Subscribe to JSON feed" href="/feeds/feed.json" />
<link rel="alternate" type="application/rss+xml"  title="Subscribe to RSS feed"  href="/feeds/rss.xml" />
```


### Use

For example, for the [Kirby Starter Kit](https://github.com/k-next/starterkit), the following would be applicable:

```php
<?php

return [
  'omz13.feeds.cacheTTL' => 60,
  'omz13.feeds.root' => [ 'blog '],
  ],
];
```

_For experimental purposes this plugin implements a single-level pseudo-namespace. You can mix discrete vs array options, but try not to, and be aware that priority is given to the array variant. The above discrete configuration would therefore become:_

```php
<?php

return [
  'omz13.feeds' => [
    'cacheTTL' => 60,
    'root' => [ 'blog' ],
  ],
];
```

See Kirby3's [issue #761](https://github.com/k-next/kirby/issues/761) for more about namespaced options.

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/omz13/kirby3-feeds/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

You are prohibited from using this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

### Buy Me A Coffee

To show your support for this project you are welcome to [buy me a coffee](https://buymeacoff.ee/omz13).

<!-- If you are using this plugin on a kirby3 site that has a Personal licence, to show your support for this project you are welcome to [buy me a coffee](https://buymeacoff.ee/omz13).

If you are using this plugin with a kirby3 site that has a Pro licence, to show your support for this project you are greatly encouraged to [buy me a coffee](https://buymeacoff.ee/omz13).
-->
