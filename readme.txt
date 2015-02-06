=== Plugin Name ===
Contributors: Rustaurius 
Tags: frequently asked questions, FAQ, easy FAQ, knowledge base, simple FAQ, FAQ categories
Requires at least: 3.5.0
Tested up to: 4.1
License: GPLv3
License URI:http://www.gnu.org/licenses/gpl-3.0.html

A plugin that lets you create FAQs (frequently asked questions), organize them, publicize them, etc. and insert them using shortcodes

== Description ==

A plugin that lets you create FAQs (frequently asked questions), organize them, publicize them, etc. and insert them using shortcodes

**Through the WordPress admin panel, you can:**
* Create FAQ categories
* Create FAQ posts and assign categories to them
* Insert FAQ posts using shortcodes (by FAQ name, category, include/exclude etc.)
* Select animation options for displaying FAQ posts
* Insert custom CSS to style your FAQ posts
* Toggle accordion (close open FAQ when a new one is opened) behaviour on/off

**Upcoming features:**
* FAQ statistics, so you know which posts are read most frequently
* FAQ search either with page reloads or using AJAX
* Ability to receive suggested FAQs from visitors
* Up/down voting of FAQ posts
* Export all FAQs to a PDF, to easily create a user manual
* Shortcodes for popular and recent posts

**Current Shortcodes:**
* [ultimate-faqs]: display all FAQs, or only specific categories using "include_category" and "exclude_category" attributes (both take a comma-separated list of category slugs)
* [select-faq]: display specific FAQ posts, using the attributes "faq_name", "faq_slug" and "faq_id" which take comma-separated lists of post names, slugs and ids respectively
* [ultimate-faq-search]: display a search form that allows users to find FAQs with a specific string in the title or body of the post

Please head to the "Support" tab to report errors or make suggestions.
Demo videos will be posted as soon as they are available.

== Installation ==

1. Upload the `ultimate-faq` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the newly created admin menu to create FAQ and FAQ categories
4. Put your FAQs on the front-end of your site with the "[ultimate-faqs]" shortcode

--------------------------------------------------------------



== Frequently Asked Questions ==

= What attributes does the "[ultimate-faqs]" shortcode accept? =

The shortcode accepts two attributes, "include_category" and "exclude_category", both take a comma-separated list of category slugs.

== Screenshots ==

1. Admin area
2. Sample FAQ page

== Changelog ==
= 0.6 =
- Fixed a bug with the AJAX search feature

= 0.5 =
- Added a whole bunch of new features
- Most important new feature is a shortcode, ultimate-faq-search, that displays an AJAX search form

= 0.4 =
- Added the option to "Hide Categories" from FAQ posts

= 0.3 =
- Added the ability to export all FAQs to a PDF document (to create a user manual, for instance)

= 0.2 =
- Added a number of grouping and ordering options to the "Options" page

= 0.1 =
- Initial beta version. Please make comments/suggestions in the "Support" forum.

== Upgrade Notice ==

