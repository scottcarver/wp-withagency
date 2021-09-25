---
layout: blog.njk
title: "Command: Taxonomy"
emoji: ''
date: 2020-04-02
excerpt: "generate a new taxonomy"
permalink: '/commands/taxonomy/'
tags: command
eleventyNavigation:
  key: Taxonomy
  order: 3
---

You can **quickly generate a taxonomy definition** using this command. You can refine to include other *Post Types* once the file is generated. This is similar to the <code class="language-bash">wp scaffold taxonomy</code> command but will evolve over time.

***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:

<pre><code class="language-bash">wp withagency taxonomy --prompt</code></pre>

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - used in *the filename* that is created. Uses [is_slugworthy](/reference/class/#slug)
- **single** - the *single name of the taxonomy* in the WP admin selection screen. Uses [is_nameworthy](/reference/class/#name)
- **plural** - the *plural name of the taxonomy* in the WP admin selection screen. Uses [is_nameworthy](/reference/class/#name)

***

### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency taxonomy</code></pre>

***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Template with a Single Line*:

<pre><code class="language-bash">wp withagency taxonomy --slug=eventtype --single="Event Type" --plural="Event Types"</code></pre>


**Typing this into the terminal would:**
1. create a new file in an existing folder "/librarytaxonomy/taxonomy-eventtype.php" 
2. That file loads automatically and by default applies to "page, post" posttypes

***

### 📈 Improvements:

1. add posstypes as a CLI argument


