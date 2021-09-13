---
layout: blog.njk
title: "Command: Taxonomy"
emoji: ''
date: 2020-04-02
excerpt: "generate a new taxonomy"
permalink: '/commands/taxonomy/'
tags: command
eleventyNavigation:
  key: Taxonomy
  order: 3
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




### Create Posttype
This is slightly duplicitive, as there is a ```wp scaffold posttype``` function already. We chose to recreate this so we'd have more control, for example to add additional properties like "Plural"

<br /><hr /><br />

### Create Template
This generates a new file and saves it into the /templates/ directory. Just run ```wp scaffold template``` and specify content type, and Template name. The template will initially be fairly boring, but later we can add flags like --simple --complex. One upside of Templates versus Routes/Endpoints is being able to trigger changes based on WordPress' publishing hooks.

<br /><hr /><br />

### Create Component
 the ```wp withagency component``` command adds a starter component to the project, with the name you've given. To avoid the kitchen sink effect, UI elements are not included by default but you can add them as needed with. Here is the breakdown of what is in a component:

- scss file that follows a client-component pattern
- js file that follows a client-component pattern
- php file that follows a client-component pattern

<br /><hr /><br />

### Create ACF Block
```wp withagency block``` will quickly create a block that is authored using ACF Blocks. This is not ideal in every case, but it can be useful if you need to access PHP. This will spin up a new directory in /blocks/ - it will contain each of the elements of a component, but additionally: 

- php file containing the ACF block definition

<br /><hr /><br />

### Create Route
A route is slightly different than a page template. To assign a page template, you must first create a content entry in the WP admin, then assign it's template and click "save" - generally this is what is wanted. Sometimes the goal is to create a url that is Not a standard WP page, and using a Route might be useful if it needs to exist at a very specific url.

- specify in code, what the url should be. For example /manifest.json
- specify in code, what the output should be (in this case, some JSON)

<br /><hr /><br />

### Create Endpoint
WordPress has a robust JSON api that exists at wp-json/v2/ and in most cases that should be use for the programattic output of JSON. This is commonly done because the default API endpoints contain too much, and unfocused data. It's possible to read and write using the API, but remember, writing is only possible on server-backed sites.

```wp create endpoint topposts``` would setup the basics for accessing data at wp-json/v2/topposts/
- a php file which defines the route for where this can be accessed
- a php file with a function that does some stuff and returns a JSON feed

Note in the Route example, JSON is output at /manifest.json instead of wp-json/v2/manifest/ - this is because there is a standard convention that a PWA app have this file (with that specific name, at that specific location), but it's true you could swap that out and it might be better!



