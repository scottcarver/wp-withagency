
#### Running Subcommands
Typing `wp withagency SUBCOMMAND --prompt` into the terminal (with a subcommand listed above)


## Understanding WP CLI Constants
When creating themes it is necessary to reuse certain text-strings, such as the "text domain" for internationalization. For theming purposes, we use client-namespaced BEM  - and this "client namespace" is another repetitive text string. 



## 🦄 Goals
- be able to write and edit generators to match our needs
- identify functions, templates, patterns, etc that will be the basis of our generators
- maintain the generator over time as an alternative to a "starter theme." Though we will be able to generate themes, it will be done through through composition, not subtraction, as has been the case with cleaning up megathemes to suit our needs.

## 📝 Editing the Docs
Follow the README.md instructions inside of the /docs/ folder, which is a standalone Eleventy Project

## 📝 Generator Notes
Currently You can Generate a Theme
wp withagency theme

Here is an example that will gernate a theme
```wp withagency theme --name=banjo --slug=beej  --domain=banjo-domain --prefix=bj```

OR
```wp withagency theme --prompt```


## CLI TOOL
Many of the techniques used are demonstrated in this blog post https://firxworx.com/blog/wordpress/how-to-write-custom-wp-cli-commands-for-wordpress-automation/ */



## Background
Inspired by https://firxworx.com/blog/wordpress/how-to-write-custom-wp-cli-commands-for-wordpress-automation/ 



## Example Usage

wp core install

git commit * -m 'installed wordpress core'

wp core config --prompt

wp install plugins -- prompt

git commit * -m 'installed wordpress plugins'

wp withagency theme --prompt

wp withagency recipe --prompt

git commit * -m 'installed wordpress theme xx'

wp theme activate mytheme

code .

npm install

gulp




# Next Steps

- update the base theme to include the ideal themesupport options (hide feeds etc)
- Once theme generation is wrapped, move on to 



## Steps for creating a New Component
Componenets are reusable UI elements composde of php/html/css/js. The term is very open ended

1) install a new component using `wp withagency component --prompt` and enter the various inputs
2) You will be asked to select a pre-existing component such as button, link, primarynav, etc.
3) The CSS/JS/PHP assets will be automatically referenced in the theme if you allow it

## Steps for creating a New Block
Blocks are UI elements specifically built to be used in the Gutenberg Interface. They are often composed of Components like buttons, links, etc.

1) install a new component using `wp withagency block --prompt` and enter the various inputs
2) You will be asked to select a pre-existing component such as button, link, primarynav, etc.
3) The CSS/JS/PHP assets will be automatically referenced in the theme if you allow it



