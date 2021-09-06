---
layout: blog.njk
title: "PHP Class"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/class/'
tags: reference
eleventyNavigation:
  key: Class
  order: 12
---

The plugin consists mainly of a *PHP Class* which extends WP-CLI. Open the `wp-withagency-cli.php` and review the public functions (the subcommands). Many of the techniques are lifted from [this post]( https://firxworx.com/blog/wordpress/how-to-write-custom-wp-cli-commands-for-wordpress-automation/). In an attempt to avoid conflict I've attempted to go "the WordPress way" when possible. An example is reusing *Mustache* already available with the "scaffold" command for all of these additions.

### Private Functions:
The I Class has helper functions which are private and used internally, mostly to ensure valid input.

- <a name="prefix" class="anchor"></a>**[is_prefixworthy](#prefix)** - evaluates the inputted "prefix" and determines it's validity based on these criteria: 5 chars max, lowercase only, no special chars. *Example: xxx*
- <a name="domain" class="anchor"></a>**[is_domainworthy](#domain)** - evaluates the inputted "text domain" and determines it's validity based on these criteria: 20 chars max, lowercase only, no special chars except dashes (-). *Example: xxxx-xxxxx*
- <a name="name" class="anchor"></a>**[is_nameworthy](/reference/class/#name)** - evaluates the inputted "Name" and determines it's validity based on these criteria: 15 chars max, lowercase/lowercase only, no special chars *Example: xxxx-xxxxx*
- <a name="slug" class="anchor"></a>**[is_slugworthy](/reference/class/#slug)** - slug is a string with only lowercase text and dashes.
- <a name="generator" class="anchor"></a>**[is_generatorworthy](/reference/class/#generator)** - when all of the above are true, then is_generatorworthy is true and a theme will be generated.
- <a name="render" class="anchor"></a>**[nice_render](/reference/class/#render)** - anytime a file is rendered using a mustache template, nice_render is called.
- <a name="docurl" class="anchor"></a>**[nice_documentationurl](/reference/class/#docurl)** - when the validators fail they often provide links to documentation using this function.
- <a name="duplicate" class="anchor"></a>**[nice_duplicatefolder](/reference/class/#duplicate)** - helper utility for duplicating folders
- <a name="tailfile" class="anchor"></a>**[nice_tailfile](/reference/class/#tailfile)** - virtually open, update, save a file - usually to include/require a newly rendered file.

### Public Functions:
The public functions are "the commands"! [Check them out](/commands/).