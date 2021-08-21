---
layout: blog.njk
title: "Command: Theme"
emoji: '🧨 '
date: 2020-04-02
excerpt: "generate a new theme"
permalink: '/commands/theme/'
tags: command
eleventyNavigation:
  key: Theme
  order: 1
---

Perhaps the *most important command*, this generates a minimal new theme that has builtin support to solve solve various known challenges upfront. It is likely to be run first and does the most work. This is one potential answer to the question of "*what should I use for a starter theme?*"

***

### ➡️ Basic Usage

Type this into your terminal for detailed help:
```
wp help withagency theme
```
Type this into your terminal to prompt for inputs:
```
wp withagency theme --prompt
```

If you run this code, the plugin will prompt for inputs

***

### ➡️ Required Values
- **slug** - this will become the folder name of The Theme. *This should be lowercase and no special characters except dashes (-)*
- **name** - this will be the name of The Theme when it appears in WordPress and will be defined in style.css. *This can include upper/lowercase letters and spaces*
- **prefix** - this will be used for namespacing purposes *this should be lowercase text, preferably 2-5 characters*
- **domain** - the theme domain is used for translation purposes *this should follow convention of slug-domain*
- **activate** - whether to activate the theme immediately after creation

***

### ➡️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Theme with a Single Line*:

```
wp withagency theme --slug=acme-theme --name="Acme Corp" --prefix=acme --domain=acme-domain --activate
```

**Typing this into the terminal would:**
1. create a new folder "acme-theme" 
2. with a style.css referencing the name "Acme Corp"
3. all the components would have names like "acme-header" 
4. the translation would be "acme-domain" 
5. and the theme would be instantly activated.