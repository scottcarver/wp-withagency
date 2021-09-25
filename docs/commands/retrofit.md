---
layout: blog.njk
title: "Command: Retrofit"
emoji: ''
date: 2020-04-02
excerpt: "retrofit an old theme"
permalink: '/commands/retrofit/'
tags: command
eleventyNavigation:
  key: Retrofit
  order: 10
---

In many cases you want to **retrofit an existing theme** to integrate the "wp withagency" command line tool. You can run the  <code class="language-bash">retrofit</code> command. This will create a file called <code class="language-bash">custom_constants.php</code> inside the currently active theme, and automatically update <code class="language-bash">functions.php</code> to require it. This will define constants that are used by the other <code class="language-bash">wp withagency</code> generator commands. After <code class="language-bash">custom_constants.php</code> is created you may want to check the paths to meet the needs of your theme. **This is still experimental!**
***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
<pre><code class="language-bash">wp withagency retrofit --prompt</code></pre>


If you run this code, the plugin will prompt for inputs (note that these are exactly the same as those used for generating themes).

***

### 📌 Required Values
- **slug** - this will become the *folder name* of the theme Uses [is_slugworthy](/reference/class/#slug)
- **name** - this will be *the name* of the theme when it appears in WordPress. Uses [is_nameworthy()](/reference/class/#name)
- **prefix** - this is *used for namespacing* purposes and added to component names. Uses [is_prefixworthy()](/reference/class/#prefix)
- **domain** - the domain is used for *translation purposes* in the theme. Uses [is_domainworthy()](/reference/class/#domain)


***

### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency retrofit</code></pre>

***
### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Constants File with a Single Line*:

<pre><code class="language-bash">wp withagency retrofit --slug=acme-theme --name="Acme Corp" --prefix=acme --domain=acme-domain</code></pre>

**Typing this into the terminal would:**
1. create a new file <code class="language-bash">theme_constants.php</code> that will define the constants
2. modify <code class="language-bash">functions.php</code> this require this file

