module.exports = eleventyConfig => {
  // Copy our static assets to the output folder
  const eleventyNavigationPlugin = require("@11ty/eleventy-navigation");
  eleventyConfig.addPlugin(eleventyNavigationPlugin);
  eleventyConfig.addPassthroughCopy('css');
  eleventyConfig.addPassthroughCopy('js');
  eleventyConfig.addPassthroughCopy('images');
  eleventyConfig.setTemplateFormats([
    "md",
    "njk",
    "css" // css is not yet a recognized template extension in Eleventy
  ]);
  // Returning something from the configuration function is optional
  return {
    dir: {
      output: 'public'
    }
  };
  
};