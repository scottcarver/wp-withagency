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
```
wp withagency theme --prompt
```

After you fill in valid inputs, a theme will be generated.

***

### 📌 Required Values

- **[slug](/reference/validation/#slug)** - this will become the folder name of *The Theme*
- **[name](/reference/validation/#name)** - this will be the name of *The Theme* when it appears in WordPress.
- **[prefix](/reference/validation/#prefix)** - this will be used for namespacing purposes and added to component names.
- **[domain](/reference/validation/#domain)** - the domain is used for translation purposes.
- **[activate](/commands/theme/#activate)** - whether to activate the theme immediately after creation

***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Theme with a Single Line*:
<br /><div class="longcode">`wp plugin install https://github.com/scottcarver/wp-withagency/archive/refs/heads/master.zip --activate`</div>

**Typing this into the terminal would:**
1. create a new folder "acme-theme" 
2. with a style.css referencing the name "Acme Corp"
3. all the components would have names like "acme-header" 
4. the translation would be "acme-domain" 
5. and the theme would be instantly activated.

***

### 🪣 Help Command

Type this into your terminal for detailed help:
```
wp help withagency theme
```