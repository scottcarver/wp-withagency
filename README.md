
# 🤖 WP With Agency
This WordPress plugin enables new functionality in WP CLI through the `wp withagency` subcommands. These commands will generate theme code to in an *agency style*. The repo includes a directory `/docs/` which details both the plugin's usage, and a standardized approach to WordPress development. 

## Background
The structure of this plugin aims to mimic functionality seen in the core WP-CLI code, while staying minimal. We use "Mustache" for generating a very similar way to the "scaffold" command.

## 🧰 Getting Started
1. Install WP CLI, which is required
2. Install and activate this plugin "WP With Agency"
3. In your terminal, run the command `wp withagency` - this will show an informational list of subcommands as follows:

#### Subcommands (alphabetical):
- **block** - generates a gutenberg block
- **component** - generates a UI component
- **endpoint** - generates an wp-json endpoint
- **posttype** - generates a posttype definition
- **retrofit** - generates constants in an existing theme
- **route** - generates content at an arbitrary url
- **taxonomy** - generates a taxonomy definition
- **template** - generates a post|page|posttype template
- **theme** - generates a WordPress theme

#### Running Subcommands
Typing `wp withagency SUBCOMMAND --prompt` into the terminal (with a subcommand listed above)

## Documentation
For notes on the full usage of this tool please [View the documentation.](https://wp-withagency.netlify.app/)

## Why does this Exist?
One of the most common questions in WordPress land is "what theme should I use"? - and of course the answer is "the one you built from scratch." This tool allows you go generate a custom theme based on your needs while maintaining control over the codebase.


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




#### Private Functions (used internally):
- **is_prefixworthy** - evaluates the inputted "prefix" and determines it's validity based on these criteria: 5 chars max, lowercase only, no special chars. *Example: xxx*
- **is_domainworthy** - evaluates the inputted "text domain" and determines it's validity based on these criteria: 20 chars max, lowercase only, no special chars except dashes (-). *Example: xxxx-xxxxx*
- **is_nameworthy** - evaluates the inputted "Name" and determines it's validity based on these criteria: 15 chars max, lowercase/lowercase only, no special chars *Example: xxxx-xxxxx*
- **is_slugworthy**
- **is_generatorworthy**
- **nice_render**
- **nice_documentationurl**
- **nice_duplicatefolder**
- **nice_tailfile**