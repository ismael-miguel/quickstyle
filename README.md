# Quickstyle
Provides a way to generate quick styles to style your elements.

**Usage:**

Simply use a regular `<link>` tag:

    <link href="/path/to/quickstyle.css.php" rel="stylesheet" type="text/css">

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
 - `text-<text-transform-name>`<br>
  Applies a `text-transform:<name>` to the element
 - `border-<style>`<br>
  Applies a `border-style:<style>` to the element

## Examples:

Examples of usage:

    <p class="color black-text text-uppercase text-1_5em blue-border border-2px border-dotted red-back">awesome!</p>
    
This is equivalent to:

    <p style="color:black!important; text-transform:uppercase!important; font-size:1.5em!important; border:2px dotted black!important; background-color:red!important;">not awesome, but produces the same code</p>
    
With `'force'=>false`:

    <p style="color:black; text-transform:uppercase; font-size:1.5em; border:2px dotted black; background-color:red;">not awesome, but produces the same code</p>
    
But the output is always the same.

For basic styles, it may be too much code:

    <p class="blue-border border-2px border-dotted">too much for a simple border!</p>

As a regular `style`:

    <p style="border:2px dotted blue;">way smaller, less semantic!</p>

A regular `style`, with `!important` (Don't try this at home!):

    <p style="border:2px dotted blue!important;">way smaller, still less semantic!</p>

## Costumization

What good for is a plataform where you can't costumize?

On top, you have a variable called `$config`.

You use it to change every aspect of the code.

 - `'class'`<br>
   Must be a string or `null`. This is the class that must be used for colors. (Default: `'color'`)
 - `'force'`<br>
   Forces the styles, by applying `!important`. Disable this if you don't need and to save space. (Default: `true`)
 - `'text'`<br>
   Defines if it is to send the styles and colors to apply to texts. (Default: `true`)
 - `'border'`<br>
   Defines if it is to send the styles and colors to apply to borders. (Default: `true`)
 - `'back'`<br>
   Defines if it is to send the background colors. (Default: `true`)
 - `'shadow'`<br>
   Defines if it is to send the shadow colors. (Default: `true`)
 - `'sizes'`<br>
   Defines if it is to send the sizes for text and borders. (Default: `true`)
 - `'styles'`<br>
   Defines if it is to send the styles for text and borders. (Default: `true`)

## Todo:

 - <del>Allow for external loading of definitions (by making a file with the same name and replacing the `$config` variable)</del><br>
   Now it is possible, by following the example of the file `quickstyle-config.php`.
 - Add more colors
 - Allow for custom colors
 - Add more styles
 - Add sizes for shadows
 - Add sizes and styles for outlines
 - Add a definition to send as a `.css` or without the `Content-type: text/css` 
