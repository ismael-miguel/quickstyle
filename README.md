# Quickstyle
Provides a way to generate quick styles to style your elements.

**Usage:**

Simply use a regular `<link>` tag:

    <link href="/path/to/quickstyle.css.php" rel="stylesheel" type="text/css">

**Classes:**

All the available classes are very basic:

 - `color`<br>
  Main class to style colors (required)
	- `<colorname>-text`<br>
	 Styles the text color based on the `<colorname>`
	- `<colorname>-border`<br>
	 Styles the border color based on the `<colorname>`
	- `<colorname>-back`/`<colorname>-background`<br>
	 Styles the background color based on the `<colorname>`
	- `<colorname>-shadow`<br>
	 Styles text shadows' and box shadows' colors based on the `<colorname>`
	- `<colorname>-outline`<br>
	 Styles the outline color based on the `<colorname>`
 - `text-<size><unit>`<br>
  Applies a `font-size:<size><unit>` to the element
 - `border-<size><unit>`<br>
  Applies a `border-width:<size><unit>` to the element
