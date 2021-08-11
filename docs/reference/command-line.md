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


We use [WP-CLI](#) tool for common tasks like installation, updates, transfers etc. Many of these things can be done through other more manual processes. Doing individual tasks with the CLI is interesting but once you have familarity and can do any task, and then can chain these text commands together, the system becomes very powerful. See the [getting started](../getting-started) guide for how to setup a project from the CLI.

<br /><hr /><br />

## Standard Commands

### Core
- ```wp core download``` download the latest release of wordpress in the current directory
- ```wp core install``` installs the latest release of wordpress in the current directory

### Theme
- ```wp theme activate twentysixteen``` activate a theme "twentysixteen" which exists in wp-content/themes/
- ```wp theme activate twentysixteen``` activate a theme
- ```wp plugin install yoast-seo``` install a plugin to the Plugins directory

### Plugin
- ```wp plugin install yoast-seo``` install a plugin to the Plugins directory
- ```wp theme activate twentysixteen``` activate a theme
- ```wp plugin install yoast-seo``` install a plugin to the Plugins directory

## Custom Commands
With this in mind, we further extended the WP CLI class with own set of commands called ```wp pollinate``` that live inside the "wp pollinate" repo (in addition to these docs). They are most similar to the scaffold commands in that they act as generators for features that are too opinionated.

### Create Theme
While the standard CLI tool includes some 'theme' commands including "wp scaffold underscores" to create a new theme based on Automattic's "Underscores" theme. While _s is a great theme, we have our own preferences on code style.

```wp pollinate theme``` installs an opinionated theme into the /wp-content/themes/ directory. Here are some of the things you'll notice about it:

- the theme includes only a few templating files which are required to boot
- functions.php is a branching off point for more logic, and no code should go here
- /library/ contains all the frontend assets 
- CSS/PHP/JS follow a custom/vendor pattern for subdirectories
- /compontents/ contains most of the Site UI in the form of BEM-named components
- /templates/ contains page, post, custom posttype templates. Ideally this would also be in library, but WP only recognizes templates 1 folder deep.
- build tools are ready to preconfigured

This is not a "kitchen sink" theme but a "blank slate" - the additional cli commands are where things get interesting.

<br /><hr /><br />

### Create Posttype
This is slightly duplicitive, as there is a ```wp scaffold posttype``` function already. We chose to recreate this so we'd have more control, for example to add additional properties like "Plural"

<br /><hr /><br />

### Create Template
This generates a new file and saves it into the /templates/ directory. Just run ```wp scaffold template``` and specify content type, and Template name. The template will initially be fairly boring, but later we can add flags like --simple --complex. One upside of Templates versus Routes/Endpoints is being able to trigger changes based on WordPress' publishing hooks.

<br /><hr /><br />

### Create Component
 the ```wp pollinate component``` command adds a starter component to the project, with the name you've given. To avoid the kitchen sink effect, UI elements are not included by default but you can add them as needed with. Here is the breakdown of what is in a component:

- scss file that follows a client-component pattern
- js file that follows a client-component pattern
- php file that follows a client-component pattern

<br /><hr /><br />

### Create ACF Block
```wp pollinate block``` will quickly create a block that is authored using ACF Blocks. This is not ideal in every case, but it can be useful if you need to access PHP. This will spin up a new directory in /blocks/ - it will contain each of the elements of a component, but additionally: 

- php file containing the ACF block definition

<br /><hr /><br />

### Create Route
A route is slightly different than a page template. To assign a page template, you must first create a content entry in the WP admin, then assign it's template and click "save" - generally this is what is wanted. Sometimes the goal is to create a url that is Not a standard WP page, and using a Route might be useful if it needs to exist at a very specific url.

- specify in code, what the url should be. For example /manifest.json
- specify in code, what the output should be (in this case, some JSON)

<br /><hr /><br />

### Create Endpoint
WordPress has a robust JSON api that exists at wp-json/v2/ and in most cases that should be use for the programattic output of JSON. This is commonly done because the default API endpoints contain too much, and unfocused data. It's possible to read and write using the API, but remember, writing is only possible on server-backed sites.

```wp create endpoint topposts``` would setup the basics for accessing data at wp-json/v2/topposts/
- a php file which defines the route for where this can be accessed
- a php file with a function that does some stuff and returns a JSON feed

Note in the Route example, JSON is output at /manifest.json instead of wp-json/v2/manifest/ - this is because there is a standard convention that a PWA app have this file (with that specific name, at that specific location), but it's true you could swap that out and it might be better!



