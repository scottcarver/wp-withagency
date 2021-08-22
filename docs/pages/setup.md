---
layout: blog.njk
title: "Getting Setup"
emoji: '🧰 '
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/setup/'
tags: post
eleventyNavigation:
  key: Getting Setup
  order: 2
---

Before you can use this plugin first install [WP CLI](https://wp-cli.org/) which is which is required for this project. The generater uses a PHP Class which extends WP CLI and adds new functionality.

---

1. Download the latest version of the [wp withagency](https://github.com/scottcarver/wp-withagency) plugin. Install and and activate in your WP installation.
\
\
**You can do this on the command line with:** <br /><div class="longcode">`wp plugin install https://github.com/scottcarver/wp-withagency/archive/refs/heads/master.zip --activate`</div>

2. Confirm it's working by typing `wp with agency` while inside of your WP site on the command line.

---

### Demo of Basic Function and Help Command
This shows all the publicly available functions within the tool. These docs, and the slug parameters, are generated automatically from PHP documentation in the *wpwithagency PHP Class*.

<figure class="player">
<video autoplay loop muted playsinline controls>
  <source src="/images/video-intro.mov" type="video/mp4">
</video>
</figure>