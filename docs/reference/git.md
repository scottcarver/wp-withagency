---
layout: blog.njk
title: "Git Standards"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/git/'
tags: reference
eleventyNavigation:
  key: Git
  order: 9
---


## Software

You are welcome to manage your git activity in a terminal environment or a graphical user interface. It doesn't matter as long as you follow the general guidelines. Examples of graphical git clients currently in use by the team include [Git Tower](https://www.git-tower.com/) and [Git Kraken](https://www.gitkraken.com/). This is an example of software that is directly related to work that makes you more productive so purchasing it is easliy justified. Reach out to your manager and they'll get you a license.

## Git Flow
In the past git itself has been a source of problems so we're moving towards a standardized approach based on the [Git Flow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) methodology. This diagram shows that:

![otter dancing with a fish](./../git-activity.svg)

### Production
Formerly (Master) is the main branch and is used for deploying code to the live/production site. No work is ever done directly to this branch.

### Develop
This is a clone of Production, and where changes get integrated. This allows us to test new integrations without messing with Production. Once everything is looking good, it can be written to Production.

### Features
Feature branches are added whenever a developer needs to do work in isolation without the risk of it getting pushed. This is done by branching Develop, making changes, then merging them back into Develop

### Hotfixes 
Sometimes things come up that need changed fast. In this case it's acceptable to create a branch off of Production, create a Feature branch and make fixes. The trick here is that once you're done it needs to be merged into *both Production and Develop*. Otherwise the next time Develop is merged into Production, there is a likelyhood/risk the hotfix will be blown away.


## Deployments

We follow a 3-site model of localhost/staging/live for our WordPress sites. Typical changes would be 


- production
- development

2 branches on git -- initialized on the theme level

master -> production
staging -> Staging
dev -> Development

dev was for the new changes and the client never sees the dev site. After the project manager approves we merge changes to staging. Database can be filled with test posts and plugins. Good for debugging anything strange that can happen beyond the local environment.

Staging is to test the git merger from dev to staging. This is an exact database copy of Prod and the clients can see at all times. Important to keep the database updated to match what will be seen on production. All plugins match prod exactly.

Then when the client approves you can merge to master and deploy to production.
I would use ssh to pull each branch into each environment. If there is a good gitignore file then you can just ssh and git pull from each environment to deploy. I would keep a list of commands for the file directory of each environment. I would use terminal to ssh into the host then copy and paste the file directory and git pull.  It sounds like a lot but it is actually really fast.
Not saying this should be our process but just wanted to share mine.

## How to manage features launches
Sometimes a feature might be in develpment for awhile, and a hotfix is needed. 

## Common commands 

For more information this documentation from Atlassian on [Basic Git commands](https://confluence.atlassian.com/bitbucketserver/basic-git-commands-776639767.html)

Get the latest updates before beginning
```bash
git pull
```

Check for changes
```bash
git status
```

Add files
```bash
git add *
```

Commit changes with a message (Jira ticket is referenced)
```bash
git commit -m "Fixed logo/svg color PX-111"
```

Push Changes to Master
```bash
git push origin master
```



```bash
git man
```


But, if you prefer, you can install and configure manually.

```bash
# Using Yarn:
yarn add @rocketseat/gatsby-theme-docs

# Using NPM:
npm i @rocketseat/gatsby-theme-docs
```