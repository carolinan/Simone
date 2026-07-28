=== Simone ===
Contributors: poena
Requires at least: 7.0
Tested up to: 7.0
License: GPL 2.0 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simone is a responsive theme orignally designed and developed by 
[Morten Rand-Hendriksen](http://mor10.com) available from the [WordPress Theme Directory]
(http://wordpress.org/themes/simone/).

The theme was adopted by Carolina Nymark in 2020, since Morten no longer had time to maintain it.

Simone\'s design is focussed on typography and aims to put the content front and center. 
Fonts are large and clear and scale according to screen width. 
On wider screens blockquotes and images can be aligned left and right to break out of the main stream 
and get a pull-quote effect.
The featured images are responsive through the use of the <picture> element resulting in appropriate 
image sizes being loaded to fit individual screen sizes.

== Changelog ==

=== 2.2.1 ===
Removed the legacy XFN profile link.
Added aria-hidden to the arrow icons that show after "Continue reading".
Legacy support for classic widget titles: Replaced heading level H1 with H2.

Addressed requirements from the accessibility-ready review:
Changed the focus outline from dotted to solid.
Changed the aria-label of the menu in the header from Main to Primary.
Disabled the insertion of the core block patterns because the widths don't work well.
Added a screen reader text that identifies sticky posts.
Added a new h1 heading to the "posts page" (the blog page) when one is selected in Settings > Reading.
Removed the link from the post dates on archives.
Added a unique accessible name (screen reader text) to the "Leave a comment" links.
Removed numerous "Edit" links because they were missing accessible names. 
Changed the default color of the border of form text input fields, to increase the color contrast.
Set a 100% width on form text input fields so that the WordPress default "size" attribute does not 
cause a scrollbar on small browser widths when a 400% zoom is used.
Changed the heading level of the post titles in the "recent post" sections on the 404 page and search results page 
from H2 to H3.
Made sure the submit button for the search form is visible on the 404 page and search results page.
Reduced the number of aside elements. Instead of each widget using an aside element, aside is now used to wrap all widgets 
in the sidebar, and the section element is used to wrap the footer widget area.
Added an aria-label to the sidebar wrapper.
Reverted the styling of the HTML elements mark and ins to the browser defaults, to resolve a color contrast issue.

=== 2.2 ===
Updated minimum required versions.
Introduced theme.json, with support for borders, shadows, and font family. Removed code that is replaced by theme.json.
Added navigation-widget theme support.
Replaced the outdated superfish script with navigation.js.
Renamed hide.js to hide-authorbox.js.
Removed the jQuery dependency.
Removed the obsolete skip link focus fix script.
Replaced the JavaScript powered masonry footer layout with CSS grid. Deleted the obsolete enquire.js and masonry-settings.js scripts.
Added sidebar-order.js to ensure that on small screens, the left sidebar is below the content.
Updated the accessible names on the navigation landmarks.
Updated the toggle for the search form in the main navigation to use a button instead of a link.
Added a visible submit button to the search form in the main navigation.
Updated the toggle for the responsive main navigation to use a button instead of a link.
Updated the label of the search form (Added searchform.php).
Updated the heading levels so that the page title is the H1 instead of the site title (the exception is the homepage).
Updated link styles.
Updated the default color for headings in the site footer.
Removed title attributes.
When the user has not entered a post title, the post id is now used to ensure "post links" have a unique accessible name. Example: Continue Reading Post #123.
Fixed a bug with the link text for "All posts by..." in the author box. Note: to test the author box, the user needs to have a biography filled in.
Updated the "hide author box" control from a link to a button.
Added an accessible name to linked featured images.
Moved the display of the category links to the post meta section. They were previously above the post title.
Removed support for Google + since the service has been discountinued.
Replaced Twitter with X.
Removed the legacy admin header code. This screen is no longer used in the WP admin, the customizer is used instead.
Fixed a bug with the values for the settings in the customizer.
Adjusted the default color of the tagline to increase the color contrast ratio.
Adjusted the styling of headings placed in the widget areas, to look more like the classic widget design the theme had from the start.
Adjusted hover and focus styles for linked images and linked gallery images.
Adjusted colors for the gallery image captions, both the block and the classic gallery shortcode.
Removed translation files, instead, translations are managed at: https://translate.wordpress.org/projects/wp-themes/simone/


=== 2.1.5 ===
Fixed a bug that affected the details block.
Fixed two JavaScript warnings related to a jQuery upgrade.
Removed the title tag filter
Hide tagline markup if there is no tagline.
Added support for block features:
Custom spacing
Link color
Border

=== 2.1.4 ===
Replaced the remote fonts with local fonts, for privacy reasons.
Fixed a bug with the font FontAwesome icons.
Fixed bugs with the editor styles that were not displaying the correct fonts.

=== 2.1.3 ===
Fixed a critical problem with the responsive menu.

=== 2.1.2 ===
Improved escaping.
Code style changes to better match WordPress coding standards.
Corrected license information and credits for assets.
Replaced the screenshot image, to follow the theme directory requirements.
Updated Enquire to v2.1.6 and included the non minified version.
Updated Superfish and included the non minified version.

Accessbility improvements:
Updated the search toggle in the menu to fix a problem with the focus/tab order.
Markup changes to the post navigation, where a heading that was only used for styling was removed.
Reduced the number of H1 headings.
Added underlines to links in the comment content.

=== 2.1.1 ===
- Update to Font Awesome 4.5.0

=== 2.1.0 ===
- Remove custom Responsive Images code for featured images because of RICG support in WP core.
- Add core title-tag support.
- Update background tile graphic to avoid strobing on high-resolution displays.

=== 2.0.4 ===
- Load picturefill only if post(s) have thumbnail(s), courtesy of @AlexAlexandru
- Fixed errors in Swedish translation, courtesy of @ljb

=== 2.0.3 ===
- Fix html escaping in featured image alt text

=== 2.0.2 ===
- CSS cleanup and bugfix for RTL

=== 2.0.1 ===
- New translation for Turkish (courtesy of Mehmet Yurtar)
- Updated translation for Simplified Chinese (courtesy of Jerry Wang)
- Various CSS cleanup for sidebar left scenario

=== 2.0 ===
New features:
- RTL language support
- Custom background color and background image option in Customizer
- Sidebar position option in Customizer
- Index and archive content display (excerpt or content) in Customizer
Updates:
- New translation for Persian / Farsi (coursesy of Emad Navy)
- New translation for Swedish (courtesy of Ted Derneby)
- New method for loading of stylesheets when child theme is used.

=== 1.0.11 ===
- New translation for Catalan (courtesy of Faleg)
- New translation for Dutch (courtesy of Richard van Naamen)

=== 1.0.10 ===
- New translation for Simplified Chinese (courtesy of Jerry Wang)
- Updated Portugese translation (courtesy of João Gomes)
- Heavier font in site description for improved accessibility
- Various code fixes and cleanups

=== 1.0.9 ===
- Font Awesome updated to 4.2.0
- New social menu icons for Foursquare, JSFiddle, Reddit, SoundCloud, Stack Overflow, Vine, Yelp, WordPress.com
- New translations for Spanish (courtesy of Juan Pablo), Portugese (courtesy of João Gomes), and Russian (courtesy of Vladimir Samoletov).
- Various CSS and HTML updates.

=== 1.0.8.1 ===
- New translations for Finnish (courtesy of Sami Keijonen) and Italian (courtesy of  Giorgio Riccardi).

=== 1.0.8 ===
- New translations for French, German, and Norwegian. Hungarian translation added courtesy of Beata Kozma.

=== 1.0.7.2 ===
- Full refactoring of translation files including updated nb_NO translation.

=== 1.0.7.1 ===
- Minor translation updates to address date formatting and wider language support. Stop-gap while waiting for more translation files to come online.

=== 1.0.7 ===
- French translation courtesy of Christine Rondeau

=== 1.0.6 ===
- German translation courtesy of Caspar Hübinger

=== 1.0.5 ===
- Translation files updated to reflect recent changes.
- Various translation improvements throughout
- Norwegian Bokmål translation updated

=== 1.0.4 ===
- Various translation improvements courtesy of Caspar Hübinger (@glueckpress). See https://github.com/mor10/simone/pull/5 for details.

=== 1.0.2 ===
- Featured image on single posts and pages and the first post on index page now responsive with <picture> element
- Fixed .screen-reader-text based on http://snook.ca/archives/html_and_css/hiding-content-for-accessibility

== Features ==

=== Customizer Options ===
Extended options available from the Customizer:

1. Header background color
2. Header text color
3. Link color (changes link colors throughout the site including site title. Also sets color of .border-custom class.)
4. Optional Header image of 1280px x 300px
5. Sidebar position: Simone can be configured to display the sidebar on the right (default) or on the left.
6. Archive display: Archive pages show excerpts by default. This can be changed to display full content.

=== Widgetized Areas ===
1. Sidebar, max content width 300px.
2. Footer, max content width 320px.

=== Post Formats ===
Standard and Aside post formats are supported. Asides are displayed without headings or meta content in index pages. All other displays are identical with Standard posts.

=== Featured Images ===
Posts and pages can have Featured Images. On single posts and pages max Featured Image (Post Thumbnail) size is 1060px x 650px. On index pages the featured image is displayed in 780px x 250px hard crop.

=== Optional Social Media menu ===
The header features an optional social media menu which is displayed on the far right of the menu area. Social media icons are automatically generated based on the URLs of different social media services so a link menu item with a Twitter URL will automatically show the Twitter icon etc. To activate the menu simply create a new menu and assign it to the Social Menu template location.
The social menu is inspired by this [article by Justin Tadlock](http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2).

=== Extras ===
Simone ships with three border options for images and other elements that can be applied by adding a class to the desired element. The classes add a 1px solid border around the current element. The classes are .border-black (black), .border-gray (#b9b9b9 or 25% gra), and .border-custom (defaults to header color but is overridden by custom link color in Customizer). These classes are added to allow the user to add borders in a semantic and standards based way.
Note that from version 2.2, the theme supports border options directly in the block editor.

=== Licenses and External Assets ===

Simone
====================================
Simone WordPress Theme, joint copyright 2014-2020 Morten Rand-Hendriksen & Carolina Nymark 2020-2026.
Simone is distributed under the terms of the GNU GPL v2

Simone\'s code base started out as _s (http://underscores.me) as it were on February 6, 2014.
(C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)

In version 2.2, the new skip-link style was copied directly from WordPress version 7.0.
WordPress is released under the terms of the GPL (GNU General Public License) version 2 or (at your option) any later version.

Twenty Fourteen
Twenty Fourteen WordPress Theme, Copyright 2013-2020 WordPress.org & Automattic.com
Twenty Fourteen is Distributed under the terms of the GNU GPL

Fonts:
Lato: http://www.google.com/fonts/specimen/Lato SIL Open Font Licence 1.1 http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL
PT Serif: http://www.google.com/fonts/specimen/PT+Serif SIL Open Font Licence 1.1 http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL

FontAwesome: 
https://fontawesome.com/
Icons — CC BY 4.0 License
In the Font Awesome Free download, the CC BY 4.0 license applies to all icons packaged as .svg and .js files types.
Fonts — SIL OFL 1.1 License
In the Font Awesome Free download, the SIL OFL license applies to all icons packaged as web and desktop font files.
Code — MIT License
In the Font Awesome Free download, the MIT license applies to all non-font and non-icon files.

=== Namesake ===
Simone is named after philosopher Simone de Beauvoir: http://en.wikipedia.org/wiki/Simone_de_Beauvoir
