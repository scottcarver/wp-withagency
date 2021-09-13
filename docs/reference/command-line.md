---
layout: blog.njk
title: "Command Line"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/command-line/'
tags: reference
eleventyNavigation:
  key: CLI
  order: 8
---


It is very helpful to use [WP-CLI](#) tool for common tasks like installation, updates, transfers etc. Many of these things can be done through other more manual processes. Doing individual tasks with the CLI is interesting but once you have familarity and can do any task, and then can chain these text commands together, the system becomes very powerful. See the [getting started](../getting-started) guide for how to setup a project from the CLI.

<br /><hr /><br />

## Standard Commands

### Core
- ```wp core download``` - **Download the latest release**  of wordpress in the current directory
<!-- - ```wp core install --prompt``` - **Install the latest release** of wordpress in the current directory -->

### Theme
- ```wp theme install twentysixteen``` - **Install a theme** "twentysixteen" from WP repo
- ```wp theme activate twentysixteen``` - **Activate a theme** "twentysixteen" which exists in wp-content/themes/

### Plugin
- ```wp plugin install yoast-seo``` - **Install a plugin** to the Plugins directory from WP repo
- ```wp plugin activate yoast-seo``` - **Activate a plugin**

## Custom Commands
With this in mind, we further extended the WP CLI class with own set of commands called ```wp withagency``` that live inside the "wp withagency" repo (in addition to these docs). They are most similar to the scaffold commands in that they act as generators for features that are too opinionated.
