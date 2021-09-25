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

In many cases you might have an existing theme. To integrate the "wp withagency" command line tool you can run the  ```retrofit``` command.

This will create a file called "theme_constants.php" inside the currently active theme, and automatically update "functions.php" to require it. This will define CONSTANTS that are used by the other "wp withagency" generator commands. 

**WARNING: Your theme structure may vary, it is essential to review the paths** in "theme_constants.php" to make sure they align with your theme. This is still experimental.
***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
```
wp withagency retrofit --prompt
```

If you run this code, the plugin will prompt for inputs (note that these are exactly the same as those used for generating themes).

***

### 📌 Required Values
- **[slug](/reference/validation/#slug)** - this will become the folder name of *The Theme*
- **[name](/reference/validation/#name)** - this will be the name of *The Theme* when it appears in WordPress.
- **[prefix](/reference/validation/#prefix)** - this will be used for namespacing purposes and added to component names.
- **[domain](/reference/validation/#domain)** - the domain is used for translation purposes.

***
### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Constants File with a Single Line*:
<br /><div class="longcode">`wp withagency theme --slug=acme-theme --name="Acme Corp" --prefix=acme --domain=acme-domain`</div>

**Typing this into the terminal would:**
1. create a new file "theme_constants.php" that will define the constants
2. modify "functions.php" this require this file

***

### 🆘 Help Command

Type this into your terminal for detailed help:
```
wp help withagency retrofit
```