=== Plugin Name ===
Contributors: Rustaurius, EtoileWebDesign
Tags: frequently asked questions, FAQ, FAQs, easy FAQ, knowledge base, simple FAQ, FAQ categories, FAQs, knowledgebase, answer, answers, faq page, FAQ Plugin, help, help desk, helpdesk, questions, wordpress faq, FAQ list, FAQ accordion, custom post type with accordion, faq list, faq with accordion, jquery ui accordion, jquery-ui, shortcodes, wordpress, WordPress Plugin, Categories, social media, facebook, widget, widgets, statistics, AJAX, analytics, responsive
Requires at least: 3.7.0
Tested up to: 4.3.1
License: GPLv3
License URI:http://www.gnu.org/licenses/gpl-3.0.html

A simple FAQ plugin that lets you create or your users FAQs, order FAQs, publicize FAQs, etc. and insert a list or AJAX FAQ search using shortcodes

== Description == 

<a href='http://www.etoilewebdesign.com/ultimate-faq-demo/'>FAQ Demo</a>

Create, organize and publicize your Frequently Asked Questions in no time through your Wordpress Admin Panel with the incredibly easy-to-use, responsive Ultimate FAQ plugin. You can use either the accordion FAQ style, to display one answer on click, or the list FAQ style, to have answers displayed by default. Features include statistics on how many times FAQs have been viewed, styling options, display and ordering options among many others. 

Want to decide exactly what order your FAQs are displayed in? Use our simple drag-and-drop reordering feature! Create SEO-friendly links to individual FAQ posts to simply direct customers to exactly the right answer, right away. You can even let your customers add to your FAQ list with [submit-question] shortcode, which lets visitors submit a question and even propose and answer for it! Easily add links to popular social media, such as Facebook, Twitter and Pinterest so that your customers can help you spread the word!

Great for combining with our <a href='https://wordpress.org/plugins/front-end-only-users/'>user management plugin </a> to create a member's only FAQ area.

= Key Features =

* Create FAQ categories
* Create FAQ posts and assign to categories to them
* An AJAX search form
* Export all FAQs to a PDF to create a user manual
* Insert custom CSS to style your FAQ posts
* Select animation options for displaying FAQ posts
* Toggle accordion (close open FAQ when a new one is opened) behaviour on/off
* Share on social media 

= Premium features include =
* User-submitted FAQs
* AJAX FAQ search
* Import/Export of FAQs from spreadsheet
* Export FAQs to PDF
* SEO-Friendly FAQ, category and tag permalinks
* Advanced styling options
* Re-ordering of FAQs

= Shortcodes =

* [ultimate-faqs]: display all FAQs, or only specific categories using include_category and exclude_category attributes (both take a comma-separated list of category slugs)
* [popular-faqs]: displays a number of the most viewed FAQs (5 unless specified).
* [recent-faqs]: displays a number of the most recently added FAQs (5 unless specified).
* [select-faq]: display specific FAQ posts, using the attributes faq_name, faq_slug and faq_id which take comma-separated lists of post names, slugs and ids respectively.
* [ultimate-faq-search]: display a search form that allows users to find FAQs with a specific string in the title or body of the post (premium).
*[submit-question]: display a form that allows users to submit FAQs of their own and, if enabled, enter an enter to their submitted question as well (premium).

Check out our Frequently Asked Questions here:
<https://wordpress.org/plugins/ultimate-faqs/faq/>

Please head to the "Support" forum to report issues or make suggestions:
<https://wordpress.org/support/plugin/ultimate-faqs>



--------------------------------------------------------------




== Frequently Asked Questions ==

= How do I get my FAQs to show up on my page? =

Try adding the shortcode [ultimate-faqs] to whatever page you'd like to display it on. 

= What are the current FAQ shortcodes? =

* [ultimate-faqs]: display all FAQs, or only specific categories using "include_category" and "exclude_category" attributes (both take a comma-separated list of category slugs) 
* [select-faq]: display specific FAQ posts, using the attributes “faq_name”, “faq_slug” and “faq_id” which take comma-separated lists of post names, slugs and ids respectively.
* [ultimate-faq-search]: display a search form that allows users to find FAQs with a specific string in the title or body of the post.

= What attributes does the [ultimate-faqs] shortcode accept? =

The shortcode accepts two attributes, “include_category? and “exclude_category”, both take a comma-separated list of category slugs.

= Can I hide my FAQ categories? =

Yes, you can choose to display or hide categories on the FAQ settings page.

= Is it possible to re-order my FAQS? =

Currently you can choose between ascending or descending ordering by either Title, Date Created, or Date Modified. 

= How can I make my FAQS sharable over social media? =

On the FAQ settings page you can choose to link to twitter, facebook and more!

= How do I make my FAQ?s searchable? =

You can use the shortcode, [ultimate-faq-search], which displays an AJAX search form.

= How do I customize my FAQs, for example, to change the font? =

You can customize the plugin by adding code to the Custom CSS box on the settings page, go to the "Custom CSS" box. For example to change the font you might want to add something like:

.ufaq-faq-title h4, .ufaq-faq-category-title h4  {font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;}

For more questions and support you can post in the support forum:
<https://wordpress.org/support/plugin/ultimate-faqs>

== Screenshots ==

1. Simple Car FAQ demo page
2. Example responsive, open FAQ
3. The AJAX FAQ search shortcode in use
4. Simple user submitted FAQs form
5. Admin area showing all FAQs with their number of views as well as their categories
6. Admin simple drag-and-drop FAQ ordering area
7. Responsive, simple styling options
8. All answers displayed in the 'list' FAQ mode

== Changelog ==
= 1.0.7 =
- Minor CSS update

= 1.0.6 =
- Fixed an issue where new users weren't able to update ordering even after upgrading to premium

= 1.0.5 =
- Minor CSS update

= 1.0.4 =
- Fixed a status error message

= 1.0.3 =
- Added in widgets to display a number of popular or recently created faqs

= 1.0.2 =
- CSS update for the ordering table in the admin area

= 1.0.1 =
- Fix for the FAQ ordering bug

= 1.0.0 =
- Premium version release, check out our website for all of the details <http://www.etoilewebdesign.com/ultimate-faq/>

= 0.26 =
- Javascript fix

= 0.25 =
- Fixed the accordion effect

= 0.24 =
- Added an option to not scroll when FAQs are opened
- Switched the "+" beside each FAQ to a "-" when it's open
- Fixed the problem where the plugin options would be reset when the browser was closed and then reopened to the options page

= 0.23 =
- Fixed an error with single FAQ display

= 0.22 =
- File was missing from upload

= 0.21 =
- Added a new pretty permalinks option
- Fixed the no reveal effect single post display
- Fixed the scroll for single post display

= 0.20 =
- Fixed the accordion effect which was broken in the V0.19 browser compatibilty fix

= 0.19 =
- Fixed the cross-browser FAQ opening compatibility issue

= 0.18 =
- Fixed a searching error which didn't display some results 

= 0.17 =
- Fixed a potential display issue for un-viewed FAQs
- Fixed a jQuery error

= 0.16 = 
- Added in a "popular-faqs" shortcode that can be used to display a number of the most looked at FAQs
- Added back in new and improved social media buttons

= 0.15 =
- Added in FAQ Tags, to make it easier to use categories feature correctly

= 0.14 = 
- Added sorting by FAQ post views and FAQ categories

= 0.13 =
- Removed social media buttons temporarily until a better option can be found

= 0.12 =
- Fixed the settings link from the plugin page

= 0.11 =
- Fixed an error that made AJAX FAQ search case-sensitive
- Added in an option to display all FAQ text on page load

= 0.10 =
- Added in "# of Views" statistics for FAQ posts
- Added in an FAQ list widget
- Added in an FAQ category widget
- Added in the ability to link directly to a post in a list
- Added the "+" symbol for single FAQ posts
- Fixed the AJAX error for searching, removed the search button and updated results dynamically

= 0.9 =
- Fixed a display error with group by categories

= 0.8 =
- Fixed a small messaging error

= 0.7 =
- Fixed an unclosed div tag
- 'Share' text is hidden when no social media selected
- Fixed a display message error

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

