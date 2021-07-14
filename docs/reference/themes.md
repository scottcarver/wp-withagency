---
layout: blog.njk
title: "Themes"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/themes/'
tags: post
eleventyNavigation:
  key: Themes
  order: 5
---

Pollinate builds custom themes to meet our agency clients' business goals. This is in contrast to the greater WordPress theme economy, which is based on volume sales of prebuilt themes (whether free or commercial.)

<br /><hr /><br />

## Working with Legacy Themes
There are sometimes cases where you are maintaining a theme built by a predecessor, or someone externally. 
- There is always a certain amount of tension with "how much to change," and your Project manager can guide that.
- most Pollinate themes similar in structure (functions.php, styles.scss, gulp.js manage PHP/CSS/JS, respectively)
- you may need to run Grunt, or an older version of Node. This is fine, but if ever it fails, instead of debugging, it's a good time to update that project to Gulp. See our Gulp configuration.

<br /><hr /><br />

## Our Starter Theme Shell
The ```wp pollinate theme``` command line tool will let you quickly spin up an opinionated, yet barebones theme. Here is what' you'll see:
- files required by WordPress to boot including style.css, functions.php, index.php, etc
- config/build files including package.json, gulp.js
- A Template directory at /template/ with page/post/custom templates
- A Library directory at /library/ which contains additional assets. In fact most of the theme is stored here. These are the subfolders: /posttype/, /taxonomy/, /function/, etc

<br /><hr /><br />

## Posttypes
In most cases, we store posttype definitions in the theme. It's also fine to isolate these in a pPlugin. In either situation it's better to define these using register_post_type(), as opposed to some visual GUI tool in the WP admin.

- 

<br /><hr /><br />


## How to evaluate a plugin
- view the official repo, how many installs does it have. Biggest isn't always best, but it's good to know who the top players are.
- Evaluate the creator. Their username, website, plugins, etc. Does the artwork look tasteful, or dated, etc.
- Is the plugin working with the latest WP release, are there issues, etc. (Counterintuitively, no recent updates might means it's very reliable over time).
- does the plugin attempt to follow WP design standards (and not have it's own styles, like Yoast)
- does the plugin have a pro/PAID version (not necessarily bad, might mean the project is healthy, and preferable to an ad-model. We actively seek to pay money for solutions that have an outsized effect on effeciency).
- does it do one thing well, or is it attempting to be a lot of things (multi-use is often bad)

<br /><hr /><br />

## Building a custom plugin
Sometimes you'll legitimately need to create a project specific plugin. In that case we use the WP Cli tools for scaffolding plugins read more about this here, but this is the gist of it ```wp scaffold plugin --name```


<br /><hr /><br />


## Clients and Plugins
Sometimes clients want to be able to access their website and add plugins. This eschews our evaluation process and is not ideal, but sometimes you just have to go with it. In this situation it's good to remind the client that there are risks involved, especially when experimenting on the live site. Encourage them to make changes on the staging site. Then, once things look good, let us know so we can can 1) Evaluate it 2) add that new plugin to version control and 3) ensure it's used on localhost and live sites consistently


