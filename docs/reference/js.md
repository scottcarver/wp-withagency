---
layout: blog.njk
title: "JS Standards"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/js/'
tags: reference
# eleventyNavigation:
#   key: JS
#   order: 11
---


The best way yo start is by using our starter:

```bash
gatsby new rocket-docs https://github.com/rocketseat/gatsby-starter-rocket-docs
```

But, if you prefer, you can install and configure manually.

```bash
# Using Yarn:
yarn add @rocketseat/gatsby-theme-docs

# Using NPM:
npm i @rocketseat/gatsby-theme-docs
```

## Theme Options

| Key        | Default | Required | Description                                                                                                                    |
| ---------- | ------- | -------- | ------------------------------------------------------------------------------------------------------------------------------ |
| basePath   | /       | No       | Root url for all docs                                                                                                          |
| configPath | config  | No       | Location of config files                                                                                                       |
| docsPath   | docs    | No       | The site description for SEO and social (FB, Twitter) tags                                                                     |
| githubUrl  | -       | No       | The complete URL of your repository. For example: `https://github/rocketseat/gatsby-themes`                                    |
| baseDir    | -       | No       | If your Gatsby site does not live in the root of your project directory/git repo, pass the subdirectory name here (ex: `docs`) |

## Example usage

```js title=gatsby-config.js
module.exports = {
  siteMetadata: {
    siteTitle: `@rocketseat/gatsby-theme-docs`,
    defaultTitle: `@rocketseat/gatsby-theme-docs`,
    siteTitleShort: `gatsby-theme-docs`,
    siteDescription: `Out of the box Gatsby Theme for creating documentation websites easily and quickly`,
    siteUrl: `https://rocketdocs.netlify.com`,
    siteAuthor: `@rocketseat`,
    siteImage: `/banner.png`,
    siteLanguage: `en`,
    themeColor: `#7159c1`,
  },
  plugins: [
    {
      resolve: `@rocketseat/gatsby-theme-docs`,
      options: {
        docsPath: `src/docs`,
        basePath: `/`,
      },
    },
  ],
};
```

Once you have installed the dependencies you will need to create the [navigation](/usage/navigation) and [documentation](/usage/creating-docs) file.

After that, you are ready ????
