---
layout: blog.njk
title: "Command: Theme"
emoji: ''
date: 2020-04-02
excerpt: "generate a new theme"
permalink: '/commands/theme/'
tags: command
eleventyNavigation:
  key: Theme
  order: 1
---

Perhaps the *most important command*, **"theme" generates a new theme** that has builtin support to solve various known challenges. It is likely to be run first and does the most work. This is one potential answer to the question of "*what should I use for a starter theme?*"

***

### 🎉 Basic Usage


Type this into your terminal to prompt for inputs:

<pre><code class="language-bash">wp withagency theme --prompt</code></pre>

After you fill in valid inputs, a theme will be generated.

***

### 📌 Required Values

- **slug** - this will become the *folder name* of the theme Uses [is_slugworthy](/reference/class/#slug)
- **name** - this will be *the name* of the theme when it appears in WordPress. Uses [is_nameworthy()](/reference/class/#name)
- **prefix** - this is*used for namespacing* purposes and added to component names. Uses [is_prefixworthy()](/reference/class/#prefix)
- **domain** - the domain is used for *translation purposes* in the theme. Uses [is_domainworthy()](/reference/class/#domain)
- **activate** - *whether to activate* the theme immediately after creation
***

### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency theme</code></pre>

***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Theme with a Single Line*:

<pre><code class="language-bash">wp withagency theme --slux=acme --name="Acme Corp" --prefix=ax --domain=acme-theme --activate</code></pre>

<!-- <br /><div class="longcode">`wp withagency theme --slux=acme --name="Acme Corp" --prefix=ax --domain=acme-theme --activate`</div> -->
\
**Typing this into the terminal would:**
1. create a new folder "acme" 
2. with a style.css referencing the name "Acme Corp"
3. all the components would have names like "ax-header" 
4. the translation domain would be "acme-theme" 
5. and the theme would be instantly activated.
