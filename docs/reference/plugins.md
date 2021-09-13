---
layout: blog.njk
title: "Plugins"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/plugins/'
tags: reference
eleventyNavigation:
  key: Plugins
  order: 6
---

We use the same few "pro developer plugins" on every site, and rarely introduce new plugins.
They are well-vetted and we have "agency licenses" for the PAID plugins listed. Use them on every site and enjoy your beautiful life. 

<br /><hr /><br />

## Approved Plugins
- [Advanced Custom Fields Pro](http://advancedcustomfields.com/)
This (PAID) tool allows for the creation of Meta fields in the WP admin area. It's very useful for working with custom post types.
- [Migrate DB Pro](https://deliciousbrains.com/wp-migrate-db-pro/)
Syncing databases in WordPress used to be near insufferable, until this (PAID) tool made it effortless. The media addon (a pro feature) is also quite nice! Use this to sync the live site to your dev machine, etc.
- [Redirection](https://redirection.me/)
Adds a settings panel to the WordPress admin for adding custom redirects, and tracking 404 occurrences.
- [Activity Log](https://activitylog.io/)
Adds a new posttype which keeps track of activity on the site. Crank it up from the default 30 days to 360, for most small sites. This is useful for blaming people when things go wrong, or debugging issues.
- [Admin Columns Pro](https://www.admincolumns.com/)
While it's possible to edit admin columns with code, this (PAID) tool takes this customization much further. By building out various admin views, we can allow clients tools like "inline editing."
- [Formidible Forms](https://formidableforms.com/)
This (PAID) form builder plugin is fairly robust, and we use it by default as the form solution on all of our WP sites (excluding headless sites).

<br /><hr /><br />

## Secondary plugins
- [Yoast SEO Premium](https://yoast.com) We use this very popular SEO plugin on most sites, but has some downsides and is not a "must use"
- [WP Pusher](http://wppusher.com/)
This (PAID) plugin makes it easier to keep plugins and themes up to date, especially when they are *not in the public repo* but live in a private repo. We use this for managing deployment of our proprietary inhouse plugins.
- [WP Mail SMTP](https://wordpress.org/plugins/wp-mail-smtp/) Provides integration with SendGrid
- [Debug Bar](https://wordpress.org/plugins/debug-bar/) shows you JS and PHP errors in a helpful way for debugging
- [Media Library Categories Premium](https://wordpress.org/plugins/wp-media-library-categories/) a PAID plugin for adding a custom taxonomy to the media library entries
- [Transient Manager](http://pippinsplugins.com/transients-manager) Useful when debugging transients
- WP All Import
- WP Duplicate Post - useful, but Yoast recently purchased and design is suffering

<br /><hr /><br />

<!-- ## Installing and Managing Plugins
- auto-install plugin script
- WP Pusher
- WP Engine Smart Plugin manager
- WP CLI 

<br /><hr /><br /> -->


## How to evaluate a plugin
- view the official repo, how many installs does it have. Biggest isn't always best, but it's good to know who the top players are.
- Evaluate the creator. Their username, website, plugins, etc. Does the artwork look tasteful, or dated, etc.
- Is the plugin working with the latest WP release, are there issues, etc. (Counterintuitively, no recent updates might means it's very reliable over time).
- does the plugin attempt to follow WP design standards (and not have it's own styles, like Yoast)
- does the plugin have a pro/PAID version (not necessarily bad, might mean the project is healthy, and preferable to an ad-model. We actively seek to pay money for solutions that have an outsized effect on effeciency).
- does it do one thing well, or is it attempting to be a lot of things (multi-use is often bad)

***
## Building a custom plugin
Sometimes you'll legitimately need to create a project specific plugin. In that case we use the WP ClI tools for scaffolding plugins read more about this here, but this is the gist of it ```wp scaffold plugin --name```


<br /><hr /><br />


## Clients and Plugins
Sometimes clients want to be able to access their website and add plugins. This eschews the evaluation process and is not ideal, but sometimes you just have to go with it. In this situation it's good to remind the client that there are risks involved, especially when experimenting on the live site. Encourage them to make changes on the staging site. Then, once things look good, let us know so we can can 1) Evaluate it 2) add that new plugin to version control and 3) ensure it's used on localhost and live sites consistently


