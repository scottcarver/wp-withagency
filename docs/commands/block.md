---
layout: blog.njk
title: "Command: Block"
emoji: ''
date: 2020-04-02
excerpt: "generate a new block"
permalink: '/commands/block/'
tags: command
eleventyNavigation:
  key: Block
  order: 6
---

You can quickly **generate a new ACF block** using this command. A CSS, JS, PHP and Block Definition file will each be generated and "wired up" - you will be prompted to select a Starter Block. Behind the scenes this utilizes the <code class="language-bash">component</code> command, but makes use of a different set of starter templates. Note that the CSS and JS is not compiled into a unified source... each block's assets are compiled into <code class="language-bash">dist/blocks</code> and those locations match the paths defined in <code class="language-bash">enqueue_assets</code> inside the block defintion and only added when used.

The current starters are:

1. generic
<!-- 2. primarynav -->


***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
<pre><code class="language-bash">wp withagency block --prompt</code></pre>

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - this will become the *file and folder name* of the block. Uses [is_slugworthy](/reference/class/#slug)
- **name** - this will be *the name* of the block in the comments. Uses [is_nameworthy()](/reference/class/#name)
- **startwith** - *select a template* select from an available starter. If you don't add this you will be prompted. Possible values are: "generic"

### 🔔 Optional values

- **activate** - *whether to activate* the block immediately after creation by updating the gulpfile and scss.
- **blockify** - *whether to add a block definition* to expose the new block/component available to the Gutenberg editor.
***


### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency block</code></pre>

***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Block with a Single Line*:

<pre><code class="language-bash">wp withagency block --slug=hero --name="Hero" --startwith=generic --activate</code></pre>

**Typing this into the terminal would:**
1.  A new PHP file <code class="language-bash">DEST_BLOCK_FOLDER./{prefix}_{slug}/{prefix}_{slug}.php</code> will be created
2.  A new CSS file <code class="language-bash">DEST_BLOCK_FOLDER./{prefix}_{slug}/_{prefix}_{slug}.css</code> will be created 
3.  A new JS file <code class="language-bash">DEST_BLOCK_FOLDER.{prefix}_{slug}/{prefix}_{slug}.js</code> will be created
4. If "blockify" is true, a new PHP file <code class="language-bash">DEST_BLOCK_FOLDER.{prefix}_{slug}/{prefix}_{slug}_defition.php</code> will be created
5. If "activate" is true, and the related files will be updated to include this new code and the block will appear in the admin immediately.

***

<!-- ### 📈 Improvements -->
