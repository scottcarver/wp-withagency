---
layout: blog.njk
title: "Command: Template"
emoji: ''
date: 2020-04-02
excerpt: "generate a new template"
permalink: '/commands/template/'
tags: command
eleventyNavigation:
  key: Template
  order: 2
---

You can quickly generate a "post, page" template using this command. You can refine to include other *Post Types* **once the file is generated**.

***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
```
wp withagency template --prompt
```

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - used in *the filename* that is created. Uses [is_slugworthy](/reference/class/#slug)
- **name** - the *name of the template* in the WP admin selection screen. Uses [is_nameworthy](/reference/class/#name)

***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Template with a Single Line*:

```
wp withagency template --slug=home --name=Homepage
```

**Typing this into the terminal would:**
1. create a new file in an existing folder "templates/page-home.php" 
2. That file would include reference to "Template Name: Homepage"

***


### 🪣 Help Command

Type this into your terminal for detailed help:
```
wp help withagency template
```