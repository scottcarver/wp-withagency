---
layout: blog.njk
title: "Command: Endpoint"
emoji: ''
date: 2020-04-02
excerpt: "generate a new endpoint definition"
permalink: '/commands/endpoint/'
tags: command
eleventyNavigation:
  key: Endpoint
  order: 5
---

You can quickly **generate a JSON Endpoint** using this command. These urls will consist of standard REST API endpoints and will exist at URLS with the pattern <code class="language-bash">/wp-json/acme-api/example</code> This is similar to the [route](/commands/route/) command but is exclusively focused on JSON at standardized paths. 
***

### 🎉 Basic Usage

Type this into your terminal to prompt for inputs:
<pre><code class="language-bash">wp withagency endpoint --prompt</code></pre>

If you run this code, the plugin will prompt for inputs

***

### 📌 Required Values
- **slug** - also used in *endpoint slug* and *the filename* that is created. Uses [is_slugworthy](/reference/class/#slug)

***


### 🆘 Help Command

Type this into your terminal for detailed help:

<pre><code class="language-bash">wp help withagency endpoint</code></pre>


***

### ⚙️ Advanced Usage
If you know the values you want to use beforehand, you can pass the parameters into the command all at once and *Create a New Endpoint definition with a Single Line*:

<pre><code class="language-bash">wp withagency endpoint --slug=mysteries</code></pre>

**Typing this into the terminal would:**
1.  a new file was created at <code class="language-bash">/library/endpoint/endpoint_{slug}.php</code>
2. the existing file <code class="language-bash">/library/endpoint/customs_endpoints.php</code> was updated to reference this

***
<!-- 
### 📈 Improvements -->
