---
layout: blog.njk
title: "PHP Standards"
date: 2020-04-02
excerpt: "This post talks about how one day I'll write a 1st post."
permalink: '/reference/php/'
tags: reference
eleventyNavigation:
  key: PHP
  order: 10
---


We aim to balance industry *standards* with agency *conventions* and the *philosopy* of following the "WordPress Way." Some of this evolves over time. This document is primarly focused on "writing code going forward" and intends to make life easier, not harder. In the event you are working on a legacy project, use these guidelines in making updates but don't feel like you need to refactor entirely. If there is a issue that also requires refactoring to complete, discuss with your Project Manager to make sure you track your time correctly.




## Commenting Style


We use three commenting styles. You'll notice they are nearly identical our Javascript commenting. CSS, too, is similar. 

1. Single Line
2. Multiline
3. DocBlock

<hr />

### Single Line Comments

- this is the mosty commonly used style 
- when code is uneventful, add comments like this as section headers
- when code-logic is complicated, use line-by-line explanations
- line-by-line explanations should be readable for your project manager
- inside of complex code, feel free to use blank lines for clarity. There is no hard requirement as to line/unlined, just a preference towards readability.

#### Simple example:
```php
<?php

// Get Variables before templating
$title = get_title();
$author = get_author();
$description = get_field('description');
$image = get_field('image');

?>
```

#### Complex example:
```php
<?php

// Get the post title
$title = get_title();

// Check if the title contains "bad"
$titleIsBad = strpos($title, 'bad') !== false;

// If title is bad, do subtasks and then return a message
if($titleIsBad){ 
  // Run Subtask 1
  dothis();
  // Run Subtask 2
  dothat();
  // Return message
  echo('you have a bad title'); 
}

?>
```
Note the inconsistent use of line breaks for the sake of readablility. In the first example there are no blank lines and the entire section reads as "a block" - in the more complex example you see a mix ofstyles. Outside of the if statement, line breaks are added. Inside of the if statement, line breaks are ommitted so the entire block feels cohesive. Do what seems most clear.

<hr />

### Multiline Comments

- should be used sparingly
- explain a complex situation
- often are multiline because they contain a link
- likely to get refactored to a single-line comment

```php

/* Sometimes you need to leave a note for yourself because the problem is 
hard to understand and it's longer to explain. Maybe you want to remember a 
link to http://stackoverflow.com/. No prob. Use a multiline comment. 
generally this won't be very common. This comment in fact is a bad candidate
as it is wordy and verbose, and could be edited, but alas, it's an example. */

```



### Docblock Comments
a PHPDoc/Docblock style header is contained by a unique code construct. Note the double asterisk ont he opening comment, text with reference to the @ symbol. Here is an example.

```php
<?php
/**
* Function name
* 
* A longer function Description
*
* @param string arg1 the first arguement passed
* @return string
*/
 ``` 

There are a lot of possible headers you can define in PHPDoc. We use 4 of them:

1. title - Easy to understand, few words
2. description - optinally, more info
3. @params - each parameter, it's type
4. @return - say what the function returns

Writing these is very tedious at first, but once you realize what's going on it's very liberating. In the end it's more likely to be created automagically. In the *tooling section* you'll find information about how to generate these automatically in VScode, and use Intellisense to *understand the actual benefit* - which is making this all work in your Code Editor much more fluidly.

, and they are very similar throughout CSS, JS and PHP. Single line, multiline, and Docblock style comments. All functions and classes should use the latter style, with their parameters and effects clearly explained. While this initially may feel cumbersome, the value of doing so becomes more apparent when you are using tooling to automate these comments, and provide IDE-like Intellisense features (explained further here).


 Sometimes that means using multiple variables/types or using an open-ended type like a {Function}, {Object} or {Class} for encapsulating complex data.

### function

```php
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



Once you have installed the dependencies you will need to create the [navigation](/usage/navigation) and [documentation](/usage/creating-docs) file.

After that, you are ready 🚀




# Link to instructions on installing Composer
https://gist.github.com/tomysmile/3b37ab4a1ddd604093fe724d0a882166


You will need to be comfortable using these:

- Node/NPM/Gulp
- Homebrew/Composer
- WP CLI


#NPM

This is the package manager solution for Node. 

- This reads from package.json, and writes assets to /node_modules/
- modules are hosted in the NPM directory (github now)

#Composer

This is the package manager solution for PHP. It's very similar to NPM, but for PHP libraries. 

- This reads from composer.json, and writes assets to /vendor/
- all modules are hosted at https://packagist.org/


#Goals

- generate an opinioned base-theme
- generate relevant docs and readmes
- generate depenency files like package.json, composer.json
- generated an opinionated component-set (buttons, links, etc)
- interface for generating one-offs
    - acf-block
    - posttype
    - component
- install required plugins
- a combined "boot site" that generates an opinionated site with all preconfigurations
- install Gatbsy at the root, and use it to generate docs from .MDX files (might need deployment on Github pages instead of Bitbucket)
    

How should React-based components be handled?

Should they always be Plugins, or sometimes inside of themes?

How does plugin and theme namespacing differ? How to keep it all in mind?


#Conundrums



PHP Style - Use DocBlocker
https://marketplace.visualstudio.com/items?itemName=neilbrayfield.php-docblocker


JS Style - JSDoc is built into VSCode but you may need another solution
https://code.visualstudio.com/docs/nodejs/working-with-javascript


WP Code styles
https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/javascript/


```PHP
<?php

// Object through line-by-line Assignment
$vars['namespace'] = WP_THEMINGNAMESPACE;
$vars['posttypeSlug'] = $userSlug;
$vars['posttypeLabelSingle'] =  $userLabelSingle;
$vars['posttypeLabelPlural'] = $userLabelPlural;

// Object through structure
$myVars = (object) [
    'namespace' => WP_THEMINGNAMESPACE,
    'posttypeSlug' => $userSlug,
    'posttypeLabelSingle' => $userLabelSingle,
    'posttypeLabelPlural' => $userLabelPlural
];

?>
```


## Review of PHP Data Types

The entire universe of PHP is made of the following data types. Here they are arranged from least complex to most complex. You should know the benefits of each, and seek to use the data type that leads to the *clearest solution* for a given situation.

```php title=example-datatypes.php
<?php 

// Boolean
$sampleWinner = true;

// Integer
$sampleCounter = 4;

// Floating Point Number
$sampleRatio = 3.14159265;

// String
$sampleGreeting = "Nice to meet you";

// Array
$sampleNames = array("Janet", "Susan", "Beverly");

// Associative array
$sampleBirthdays = array(
  "janet" => 19551012, 
  "susan" => 19821221, 
  "beverly" => 20010219
);

// Function
function sampleReminder($time){
  return 'Event upcoming at ' . $name ;
}

// Object (define, assign, get)
$sampleItem = stdObj();
$sampleItem.width = 2;
$sampleWidth = $sampleItem.width;

// Class (define, assign, method call)
class MyProduct{
    function get_name(){
        echo "Product name"; 
    }
}
$sampleProduct = new MyProduct();
$sampleProduct->get_name();

?>
```