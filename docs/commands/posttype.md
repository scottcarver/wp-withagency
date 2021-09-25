---
layout: blog.njk
title: "Command: Posttype"
emoji: ''
date: 2020-04-02
excerpt: "generate a new posttype definition"
permalink: '/commands/posttype/'
tags: command
eleventyNavigation:
  key: Posttype
  order: 5
---

You can **quickly generate a posttype** using this command although this still requires configuration to be fully useful. This is simlar to the <code class="language-bash">wp scaffold posttype</code> command but is likely to include new features over time.

***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
<pre><code class="language-bash">wp withagency posttype --prompt</code></pre>

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - internal slug, also used in *the filename* that is created. Uses [is_slugworthy](/reference/class/#slug)
- **single** - the *single name of the posttype* in the WP admin selection screen. Uses [is_nameworthy](/reference/class/#name)
- **plural** - the *plural name of the posttype* in the WP admin selection screen. Uses [is_nameworthy](/reference/class/#name)
***


### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency posttype</code></pre>


***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Posttype definition with a Single Line*:

<pre><code class="language-bash">wp withagency posttype --slug=event --single=Event --plural=Events</code></pre>

**Typing this into the terminal would:**
1. create a new file in an existing folder "library/posttype/posttype_{event}.php" 
2. the file library/function/custom/custom_posttypes.php was updated to reference that file

***

### 📈 Improvements

1. add --activate flag to control whether files is automatically referenced