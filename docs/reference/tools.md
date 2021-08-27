---
layout: blog.njk
title: "Tools Checklist"
emoji: '⚒️ '
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/tools/'
tags: reference
eleventyNavigation:
  key: Tools
  order: 3
---

In some cases you'll need to use specific tools that are hard to swap out, notably because these are command-line tools with no visual equivilent. In others these are aspects of your personal "development environment" and you should use any tool or technique you want. For example you might choose your preferred Terminal, Version Control GUI, Code Editor, SFTP client. Alternatively you might prefer using the command line to manage all these things without graphical tools. Note that [vendors](/usage/vendors) and [plugins](/usage/plugins) are listed seperately.

<br /><hr /> 

## Required Tools

### Node/NPM
You will need to use [Node.js](https://nodejs.org) for a variety of tasks. Most commonly this will be an ```npm install``` to get setup, then something like ```gulp``` to initilize a project. You'll need to be comfortable with basic NPM usage and debugging techniques. Feel free to manage Node it on your system in accordance with your preferences. Keep in mind some situations require using a newer/older version of Node. Some team members are using Brew/[NVM](https://nodejs.org) or [n](https://www.npmjs.com/package/n) to quickly switch between versions, as this is not a default feature. As we migrate our projects to newer workflows this is likely to become less common.

### Gulp
Though there are many options, we still rely primarily on Gulp for compiling css and javascript. We're deploying code automatically through Pipelines/Buddy/Netlify.

### WordPress CLI
It's recommended that you install and manage WordPress using the CLI commands when possible. Anything you can do in the admin, you can do with the CLI, and the "wp withagency" command line tools build ontop of WP-CLI. This will allow you to ```install core``` and quickly configure the site with ```wp core config``` - When creating the initial admin username, use your first name. Do not use usernames like "Admin","Sitemaster", etc.


<br /><hr /> 

## Choose Your Own Tools



### Terminal
Increasinly you'll need to run command line tools. You might be doing something around the file system. Running some software, or debugging something with no interface. On a Mac that is likely to be Terminal, iTerm, or VSCode. 

### Code Editor
Feel free to use a code editor of your choosing, but [VSCode](https://code.visualstudio.com/) is used by many team members and is highly recommended. We have a recommended set of plugins for VSCode for PHP development. Projects should contain an ```.editorconfig``` file - this is a common convention that you will work in both VSCode and other editors.

### Version Control Client
You'll be expected to use git, and Bitbucket for managing your work. There is a guide in the code standards section for how to create commit messages, and follow the recommended flow.

### SFTP Client 
We're working to automate our deployments, because working with FTP, and other forms of cowboy coding are sources of problems in themselves. That said, you might still need to use an FTP application and we recommend Transmit. Use the "Sync" feature prior to moving any changes. See  appendix F for a list of "exclude rules"

### LAMP Stack
WordPress can run in a variety of ways, the most common is using Apache/MySQL/PHP - commonly done on a Mac computer with MAMP, or Local. This can also be done with Docker, command line, etc but in WP-land, MAMP/Local are common.
