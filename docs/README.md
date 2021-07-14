# The docs for `wp withagency`
This project is a a command-line tool for WordPress. It is complex and requires it's own documentation. Thank you for reading them. The docs use eleventy, and is managed with NPM. If you don't have NPM, please install it now.

## To Install
The project is preconfigured in package.json. All you need to do is install the files with the standard command
```
$ npm install
```

## To Run Commands
The package.json contains a list of scripts which you can easily run. The most common are "build" and "serve"

```
$npm run serve
```

## To Generate Files
You can either run the npm script, or the underlying commands, both will do the same thing.

Option 1
```$ npm run build```

Option 2
```$ eleventy```

## View the preview site locally
When running the serve command, a server will be setup locally, often at http://localhost:8080, but this will vary and you should rely on your console for the most up to date information.

## View the Site online
The docs are synced to netlify and visible at wp-withagency.netlify.com and wp-withagency.com

## Modifying Netlify Configuration
This is handled by the netlify.toml file within the project directory