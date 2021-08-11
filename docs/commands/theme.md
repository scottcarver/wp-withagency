---
layout: blog.njk
title: "Command: Theme"
emoji: '👋 '
date: 2020-04-02
excerpt: "generate a new theme"
permalink: '/commands/theme/'
tags: command
eleventyNavigation:
  key: Theme
  order: 1
---

If you run this code, the plugin will give you information about the inputs needed

```
$wp withagency theme
```

If you run this code, the plugin will prompt for inputs

```
$wp withagency theme --prompt
```

If you run already know the parameters you want to use you can prepare them beforehand

```
$wp withagency theme --slug=
```



## Steps for creating a New Theme
Most of the commands surround *the act of creating a theme*, or various aspects of a theme. The above list is alphabetical but a new site will start by calling the "theme" subcommand: