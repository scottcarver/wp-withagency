---
layout: blog.njk
title: "Advanced Usage"
emoji: '🧰 '
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/usage/'
tags: post
eleventyNavigation:
  key: Advanced Usage
  order: 4
---



## Working on a WordPress Project
Here is the basic steps for how to get setup and make changes on an existing WP site for Pollinate:

1. Have a chat with your Project Manager and review your Jira Tickets
2. Request that an Admin login be created for you on the Prod/Staging WP
3. Pull the git repository from Bitbucket to your work laptop
4. Setup a database and connect it to the install by creating wp-config.php
5. Pull data and media from staging/prod with Migrate pro
6. Install Node dependencies and run build tools
7. Create a new git branch for this ticket. 

You should now be in a position to begin working.

### On the command line:

```bash
# Navigate to Sites Root
cd ~/Sites

# Clone project so far
git clone http://pathto.git

# Setup database/config
wp core install

# Pull site database
wp migrate pull

# Install Dependencies
nmp install

# Run Build Tools
gulp

# Add changes to git
git add *
git commit -m 'added all the new things'
git push origin master

# Build Process takes over from here

```

<hr />

## Starting a New WordPress Project
Less frequently, you will need to create a new project.

1. Create a new git repository
2. Add a WordPress installation at the root
2. install the "WP Pollinate" plugin
3. use it's generators to scaffold a theme, components
4. Activate the theme
5. Install the plugin dependencies
6. Commit the WP core installation, theme and plugins

### On the command line:

```bash
# Navigate to Sites Root
cd ~/Sites

# Make a new directory and go into it
mddir wordpress.clientname; cd wordpress.clientname

# Install WP core
wp core download

# Install WP Pollinate
wp plugin pathtobitbucketrepo.zip

# Generate theme
wp pollinate theme --slug=clientname --namespace=client-name

# Activate theme
wp theme clientname

# Install plugin dependencies
wp tgmpa-plugin install --all


```


## 🤝 Onboarding an existing WordPress Project
Sometimes you inherit a WordPress Site that is not under version control

1. Create a new git repository
2. Add a WordPress installation at the root, create db and wp-config
2. using sftp pull the theme and plugins from the live site to your environment
4. Now you have the complete code. Commit everything to git.
5. Add standard pollinate-approved plugins
6. Use Migrate-db-pro to sync the database and media library from live to local.
7. Now you have the complete contents on your local environment.




## 🏄‍♀️ Editing WordPress Project in Place
Sometimes you get asked to make hot fixes to a site

1. This
2. That
3. The other



## 🏄‍♀️ Retrofitting Old Themes with Gulp
If you need to remove the current build tools (say Grunt, or Gulp 3) with our modern config setup, you can run the command ```wp pollinate gulp``` - this will generate an opinionated gulpfile.js to your theme.

Now install these NPM dependencies for gulp.

In a standard theme you can run ```gulp``` immediately... but because we're retrofitting an old theme, the paths to the CSS, JS and Images may not match. Please doublecheck these paths in gulpfile.js prior to running builds.