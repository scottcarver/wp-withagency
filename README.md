
# 🤖 WP With Agency
This WordPress plugin enables new functionality in *WP CLI* by adding a series of new subcommands under the namespace: `wp withagency`. These commands generate theme code to in an opinionated format which allows a high level of control.

## Why does this Exist?
One of the most common questions in WordPressLand is "What Theme Should I Use"? The popular wisdom is often "Start with Underscores" and this is true even when using the wp scaffold theme command. My [personal](https://scottcarver.info) answer has always been *"the one you built from scratch"* and this tool helps aid that process by breaking the process into a bunch of steps instead of one big one.

## 🧰 Getting Started
1. Install [WP CLI](https://wp-cli.org/), which is required
2. Install and activate this plugin, [WP With Agency](https://github.com/scottcarver/wp-withagency)
3. In your terminal, run the command `wp withagency` - this will show an informational list of subcommands as follows:

#### Subcommands:
- **block** - generates a gutenberg block
- **component** - generates a UI component
- **endpoint** - generates an wp-json endpoint
- **posttype** - generates a posttype definition
- **retrofit** - generates constants in an existing theme
- **route** - generates content at an arbitrary url
- **taxonomy** - generates a taxonomy definition
- **template** - generates a post|page|posttype template
- **theme** - generates a WordPress theme

## 📝 Documentation
This repo includes a directory `/docs/` which runs an *Eleventy* instance and powers the documention. [View the documentation](https://wp-withagency.netlify.app/). *Here's the Quick version*:

**Change Directory**
`cd docs`

**Install**
`npm install`

**Serve**
`npm run serve`