=== Quark ===
Contributors: ahortin
Donate link: http://maddisondesigns.com/
Tags: black, gray, dark, light, one-column, two-columns, right-sidebar, flexible-width, custom-background, custom-header, custom-menu, editor-style, featured-image-header, featured-images, full-width-template, microformats, post-formats, sticky-post, theme-options, threaded-comments, translation-ready
Requires at least: 3.4
Tested up to: 3.5.1
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Quark is your basic building block for creating beautiful, responsive custom themes. It's a simple and elegant starter theme built on HTML5 & CSS3. 


== Description ==

Quark is your basic building block for creating beautiful, responsive custom themes. It's not a convoluted or confusing framework that's hard to learn.
It's a simple and elegant starter theme built on HTML5 & CSS3. It's based on the Underscores (_S) and TwentyTwelve themes, so that means not only
is it flexible, it's extremely easy to customise. There's no need to make a child theme (unless you really want to), just dig in to the code & use it to
give yourself a kickstart in creating your next awesome theme.

Its base is a responsive, 12 column grid. It uses Normalize to make sure that browsers render all elements more consistently and Mordernizr for
detecting HTML5 and CSS3 browser capabilities along with some default stylings from HTML5 Boilerplate.

It incorporates the [Options Framework](http://wptheming.com/options-framework-theme/) by Devin Price to make is super easy to add custom Theme Options
as well as the gorgeous IcoMoon icon font from the talented [Keyamoon](http://keyamoon.com/icomoon).

The main navigation uses the standard WordPress menu. Support for dropdown menus is inluded by default. If you'd like to envoke a button toggle for the main navigation menu on small screens, simply uncomment the two lines from the quark_scripts_styles() function within functions.php to register and enqueue the necessary javascript file.

Templates

Quark includes a set of your most common theme templates, including templates for Full-Width pages, Left Sidebar, Right Sidebar (default), Front-Page, Tag,
Categories, Authors, Search, Posts Archive and 404.

Post Formats

All the standard WordPress Post Formats are supported. These include; Aside, Gallery, Link, Image, Quote, Status, Video, Audio, Chat and of course, 
your std post.

Widgets

Widgets are a great way of adding extra content to your site and Quark has a whole assortment of them.

Main Sidebar: Appears in the sidebar on posts and pages except the optional Homepage template, which has its own widgets
Blog Sidebar: Appears in the sidebar on the blog only
Single Post Sidebar: Appears in the sidebar on single posts only
Page Sidebar: Appears in the sidebar on pages only

The Front Page Banner Widget areas are dynamic! You can use up to two of these and they'll magically space themselves out evenly. For example, if you 
only add widgets into the First Front Page Banner Widget Area, then it will expand the full width of the page. However, if you add widgets to both Front 
Page Banner Widget areas, they'll magically space themselves out over two columns.
First Front Page Banner Widget: Appears in the banner area on the Front Page
Second Front Page Banner Widget: Appears in the banner area on the Front Page

The Homepage Widget areas are dynamic! You can use up to four of these and they'll magically space themselves out evenly. For example, if you only add 
widgets into the First Homepage Widget Area, then it will expand the full width of the page. However, if you add widgets to all four Homepage Widget 
Areas, they'll magically space themselves out over four columns.
First Homepage Widget Area: Appears when using the optional homepage template with a page set as Static Front Page
Second Homepage Widget Area: Appears when using the optional homepage template with a page set as Static Front Page
Third Homepage Widget Area: Appears when using the optional homepage template with a page set as Static Front Page
Fourth Homepage Widget Area: Appears when using the optional homepage template with a page set as Static Front Page

The Footer Widget areas are dynamic! You can use up to four of these and they'll magically space themselves out evenly. For example, if you only add 
widgets into the First Footer Widget Area, then it will expand the full width of the page. However, if you add widgets to all four Footer Widget Areas, 
they'll magically space themselves out over four columns.
First Footer Widget Area: Appears in the footer sidebar
Second Footer Widget Area: Appears in the footer sidebar
Third Footer Widget Area: Appears in the footer sidebar
Fourth Footer Widget Area: Appears in the footer sidebar

Custom Header

The Default logo can be easily changed using the Custom Header feature. You change this in the Appearance > Header menu option

Custom Background

The background pattern can be changed using the Custom Background feature. You change this in the Appearance > Background menu option

Theme Options

Additional Theme Options can be found in the Appearance > Theme Options menu option. These include options for:
Specifying the URL's for various social media networks
Specifying the banner background image & color
Specifying the footer color
Changing the footer credit text.


== Installation ==

There are three ways to install your theme. It can be installed by manually uploading the files to the themes folder using an FTP application, it can be installed
by downloading from the WordPress Theme Directory within the Dashboard or it can be installed by uploading the theme zip file that you downloaded.

Use the following instructions to install & activate Quark using your preferred method.

Manual installation:

1. Unzip the files from the Quark zip file that you downloaded
2. Upload the Quark folder to your /wp-content/themes/ directory
3. Click on the Appearance > Themes menu option in the WordPress Dashboard
4. Click the Activate link below the Quark preview thumbnail

Install from the WordPress Theme Directory:

1. Click on the Appearance > Themes menu option in the WordPress Dashboard
2. Click the Install Themes tab at the top of the page
3. Type 'Quark' in the search field, without the quotes, and then click the Search button
4. Click the Install Now link below the Quark preview thumbnail
5. Once the theme has been installed, click the Activate link

Install by uploading the theme zip file:

1. Click on the Appearance > Themes menu option in the WordPress Dashboard
2. Click the Install Themes tab at the top of the page
3. Click on the Upload link just below the two tabs at the top of the page
4. Click the Browse button, browse to the folder that contains the theme zip file, select it and then click the Open button
5. Click the Install Now button
6. Once the theme has been installed, click the Activate link


=== Getting Started ===

Since Quark is a starter theme to kick of your own awesome theme, the first thing you want to do is copy the quark theme folder and change the name to something else. You'll then need to do a three-step find and replace on the name in all the templates.

1. Search for quark inside single quotations to capture the text domain.
2. Search for quark_ to capture all the function names.
3. Search for quark with a space before it to replace all the occurrences of it in comments.
   (You'd replace this with the capitalized version of your theme name.)

or, to put it another way...

Search for:'quark'
 Replace with:'yourawesomethemename'
Search for:quark_
 Replace with:yourawesomethemename_
Search for: quark
 Replace with: YourAwesomeThemeName

Lastly, update the stylesheet header in style.css and either update or delete this readme.txt file.


== License ==

Quark is licensed under the [GNU General Public License version 2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the
Free Software Foundation; either version 2 of the License, or (at your option) any later version.


== Credits ==

Quark utilises the following awesomeness:

[Options Framework](http://wptheming.com/options-framework-theme), which is licensed under the GPLv2 License
[Responsive Grid System](http://www.responsivegridsystem.com), which is licensed under a Creative Commons Attribution 3.0 License
[Modernizr](http://modernizr.com), which is licensed under the MIT license
[Normalize.css](https://github.com/necolas/normalize.css), which is licensed under the MIT license
[Audio.js](http://kolber.github.com/audiojs), which is licensed under the MIT License
[jQuery Validation](http://bassistance.de/jquery-plugins/jquery-plugin-validation) which is dual licensed under the MIT license and GPL licenses
[IcoMoon icon font](http://icomoon.io), which is licensed with a royalty free license from [KeyaMoon](https://twitter.com/keyamoon)
[PT Sans font](http://www.fontsquirrel.com/fonts/PT-Sans) which is licensed as per [Font Squirrel](http://www.fontsquirrel.com)
[Museo 500 font](http://www.fontsquirrel.com/fonts/Museo), which is licensed as per the [Font Squirrel](http://www.fontsquirrel.com)
Background images, licensed under a Creative Commons Attribution-ShareAlike 3.0 Unported License from [Subtle Patterns](http://subtlepatterns.com)


== Changelog ==

= 1.1 =
- Changed margin and removed padding on .row class and consolidated html to remove extra container elements from templates
- Removed unnecessary comments from style.css
- Updated navigation margins in media queries
- Updated margin, padding & font-size with matching rem values, where missing
- Updated readme.txt with Getting Started information
- Removed Google Analytics code from footer and enqueued with other scripts
- Initial Repository Release


= 1.0 =
- Initial version

