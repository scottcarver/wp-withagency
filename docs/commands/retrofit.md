---
layout: blog.njk
title: "Command: Retrofit"
emoji: '🧨 '
date: 2020-04-02
excerpt: "retrofit an old theme"
permalink: '/commands/retrofit/'
tags: command
eleventyNavigation:
  key: Retrofit
  order: 10
---

In many cases you might have an existing theme. To integrate the "wp withagency" command line tool you can run the command ```wp withgency retrofit```

This will create a file called theme_constants.php inside the currently active theme, and automatically update functions.php to include it. This will define CONSTANTS that are used by the other "wp withagency" generator commands. **Your theme structure may vary, it is essential to review the paths** in theme_constants.php to make sure they align with your theme. This is still experimental. FRANKLY, DO NOT USE IT.

***

### ➡️ Basic Usage

Type this into your terminal for detailed help:
```
wp help withagency retrofit
```
Type this into your terminal to prompt for inputs:
```
wp withagency retrofit --prompt
```

If you run this code, the plugin will prompt for inputs (note that these are exactly the same as those used for generating themes).

***

### ➡️ Required Values
- **slug** - this will become the folder name of The Theme. *This should be lowercase and no special characters except dashes (-)*
- **name** - this will be the name of The Theme when it appears in WordPress and will be defined in style.css. *This can include upper/lowercase letters and spaces*
- **prefix** - this will be used for namespacing purposes *this should be lowercase text, preferably 2-5 characters*
- **domain** - the theme domain is used for translation purposes *this should follow convention of slug-domain*


***

### ➡️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Theme with a Single Line*:

```
wp withagency theme --slug=acme-theme --name="Acme Corp" --prefix=acme --domain=acme-domain
```

**Typing this into the terminal would:**
1. create a new file "theme_constants.php" that will define the constants
2. modify functions.php this reference this file