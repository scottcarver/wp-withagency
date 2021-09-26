---
layout: blog.njk
title: "Command: Component"
emoji: ''
date: 2020-04-02
excerpt: "generate a new component"
permalink: '/commands/component/'
tags: command
eleventyNavigation:
  key: Component
  order: 6
---

You can quickly **generate a new component** using this command. A CSS, JS, PHP file will each be generated and "wired up" - you will be prompted to select a Starter Component, the current options are:

1.
2.
3.
4.
5.

***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
<pre><code class="language-bash">wp withagency endpoint --prompt</code></pre>

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - also used in *endpoint slug* and *the filename* that is created. Uses [is_slugworthy](/reference/class/#slug)

***


### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency endpoint</code></pre>


***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Endpoint definition with a Single Line*:

<pre><code class="language-bash">wp withagency endpoint --slug=header-seasonal --name="Seasonal Header"</code></pre>

**Typing this into the terminal would:**
1.  a new file was created at <code class="language-bash">/library/endpoint/endpoint_{slug}.php</code>
2. the existing file <code class="language-bash">/library/endpoint/customs_endpoints.php</code> was updated to reference this

***

### 📈 Improvements

1. Currently the write-paths to the JS and SCSS file are specific to the theme structure from the "theme" command. Particularly this consists of <code class="language-bash">/gulpfile.js/javascript_copied.json</code>, <code class="language-bash">/gulpfile.js/javascript_inactive.json</code>, <code class="language-bash">/library/style/custom/_custom_components.scss</code> - until this is seperated as it's own constant it's recommended to not run the "activate" flag. The files will be added to your theme and you can "wire them up" based on your needs.