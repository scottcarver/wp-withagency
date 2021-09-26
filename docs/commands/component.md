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

1. generic
<!-- 2. primarynav -->


***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
<pre><code class="language-bash">wp withagency component --prompt</code></pre>

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - this will become the *file and folder name* of the component. Uses [is_slugworthy](/reference/class/#slug)
- **name** - this will be *the name* of the component in the comments. Uses [is_nameworthy()](/reference/class/#name)

### 🔔 Optional values
- **startwith** - *select a template* select from an available starter
- **activate** - *whether to activate* the component immediately after creation by updating the gulpfile and scss
***


### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency component</code></pre>
wp withagency component --slug=header-seasonal --name="Seasonal Header" --activate


***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Component with a Single Line*:

<pre><code class="language-bash">wp withagency component --slug=header-seasonal --name="Seasonal Header" --startwith=generic --activate</code></pre>

**Typing this into the terminal would:**
1.  A new PHP file <code class="language-bash">DEST_COMPONENT_FOLDER./{prefix}_{slug}/{prefix}_{slug}.php</code> will be created
2.  A new CSS file <code class="language-bash">DEST_COMPONENT_FOLDER./{prefix}_{slug}/_{prefix}_{slug}.css</code> will be created 
3.  A new js file <code class="language-bash">DEST_COMPONENT_FOLDER.{prefix}_{slug}/{prefix}_{slug}.js</code> will be created
4. If "activate" is true, The CSS file will be referenced in <code class="language-bash">_custom_components.scss</code>
5. If "activate" is true, The JS file will be referenced in the gulpfile and compiled when you run <code class="language-bash">gulp</code>

***

### 📈 Improvements

1. Currently the write-paths to the JS and SCSS file are specific to the theme structure from the "theme" command. Particularly this consists of <code class="language-bash">/gulpfile.js/javascript_copied.json</code>, <code class="language-bash">/gulpfile.js/javascript_inactive.json</code>, <code class="language-bash">/library/style/custom/_custom_components.scss</code> - until this is seperated as it's own constant it's recommended to not run the "activate" flag. The files will be added to your theme and you can "wire them up" based on your needs.
2. When making updates to the scss, it would be nice to include <code class="language-css">// Component Name</code> on the line prior to the include