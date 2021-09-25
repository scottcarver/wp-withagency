---
layout: blog.njk
title: "Getting Setup"
emoji: ''
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/setup/'
tags: post
eleventyNavigation:
  key: Getting Setup
  order: 2
---

1. First Install [WP CLI](https://wp-cli.org/#installing), which is which is required for this project.
2. Download the latest version of the [WP With Agency](https://github.com/scottcarver/wp-withagency) plugin. 
3. Activate the "WP Withagency" plugin in your WP installation.
4. Confirm it's working by typing `wp withagency` while inside of your WP site on the command line.

---

### ✨ Quick Setup

**Cool Tip:** Once you have WP CLI installed you can do steps 2-4 on the command line with this one-liner to install, activate and test the plugin:
<pre><code class="language-bash">wp plugin install https://github.com/scottcarver/wp-withagency/archive/refs/heads/master.zip --activate;</code></pre>

<br />



### Demonstration

With the plugin activated you can run both the `wp withagency` command, but more imporantly the subcommands.
<figure class="player">
<video autoplay loop muted playsinline controls>
  <source src="/images/video-intro.mov" type="video/mp4">
</video>
</figure>
