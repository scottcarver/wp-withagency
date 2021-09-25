---
layout: blog.njk
title: "Command: Route"
emoji: ''
date: 2020-04-02
excerpt: "generate a new Rout"
permalink: '/commands/route/'
tags: command
eleventyNavigation:
  key: Route
  order: 3
---

You can **quickly generate a arbitary route** using this command. A "route" is slightly different than a page template in that it captures input though the url *dynamically* and allows you to program around that. *This is unlike the built-in WP-JSON API in that you have full control over the file type, and url.* This is very powerful and works in a similar way to route handing in traditional MVCs. Doing this requires the <code class="language-bash">CustomRoutes</code> class to be defined. It's not included in the theme by default although that's possible, and easy. Currently it's seperated into a plugin, [WP Enrouter](https://github.com/scottcarver/wp-enrouter) and when it's installed/active routes will work. The [WP Inquirist](https://github.com/scottcarver/wp-inquirist) will prompt you to install WP Enrouter when used as directed.

#### Examples:

- **/{lat}/{long}/** - capture lat/long dynamically
- **/changelog.json** - an arbitrary url which outputs json
- **/screenshots/screenshot-{post_ID}.png** - a service which screenshots the post



***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
<pre><code class="language-bash">wp withagency route --prompt</code></pre>

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - used in *the filename* that is created. Uses [is_slugworthy](/reference/class/#slug)

***


### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency route</code></pre>


***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Template with a Single Line*:

<pre><code class="language-bash">wp withagency route --slug=special.json</code></pre>

**Typing this into the terminal would:**
1. create a new file in <code class="language-bash">DEST_ROUTE_FOLDER/route_{special.json}.php</code>
2. create a new file in <code class="language-bash">DEST_ROUTE_FOLDER/route_{special.json}_template.php</code>
3. update the file <code class="language-bash">function/custom/custom_routes.php</code> to require the files

***

### 📈 Improvements

1. Add --format flag to select a json/xml/html/image starter template
2. Include --activate flag, whether the file is included immediately
3. Update help for the route command to reference DEST_ROUTE_FOLDER (currently it's hardcoded in the help as <code class="language-bash">/routes/routename.php</code>)