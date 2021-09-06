---
layout: blog.njk
title: "Docs"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/docs/'
tags: reference
eleventyNavigation:
  key: Docs
  order: 22
---

The [docs](https://wp-withagency.netlify.app/) are created in Eleventy. This is part of the main repo, nestled in the /docs/ directory of the repo. Notice how the content is rendered to the /public/ folder. Entries are divided into these three subfolders: 1) pages 2) commands 3) reference


### Installation

Run the command `npm install` to install all the needed dependencies.


### Serve Site Locally

Run a local server with `npm run serve` with livereloading.


### Autodeploy

The docs repo builds automatically using Netlify.