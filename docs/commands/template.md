---
layout: blog.njk
title: "Command: Template"
emoji: '🧨 '
date: 2020-04-02
excerpt: "generate a new template"
permalink: '/commands/template/'
tags: command
eleventyNavigation:
  key: Template
  order: 2
---

You can quickly generate a "page template" using this command - however you should note that templates can affect all posttypes. You can refine this property after the "Tempate Post Type"" property once the file is generated.

***

### ➡️ Basic Usage

Type this into your terminal for detailed help:
```
wp help withagency template
```
Type this into your terminal to prompt for inputs:
```
wp withagency template --prompt
```

If you run this code, the plugin will prompt for inputs

***

### ➡️ Required Values
- **slug** - this will be used in the filename that is created - *This should be lowercase and no special characters except dashes (-)*
- **name** - this will be the Name of The Template which will appear in the WP admin selection screen.  *This can include upper/lowercase letters and spaces*


***

### ➡️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Theme with a Single Line*:

```
wp withagency theme --slug=homepage --name=Homepage
```

**Typing this into the terminal would:**
1. create a new file in an existing folder "templates/page-home.php" 
2. That file would include reference to the "name"
