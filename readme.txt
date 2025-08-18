=== SEPA QR-Code for Woocommerce ===
Contributors: thedoctorcoernel
Tags: woocommerce, payment, sepa, qr
Requires at least: 4.7
Tested up to: 6.6.2
Stable tag: 2.1.2
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Free plugin that adds a SEPA-QR Code for bank transfer payments (bacs) in the WooCommerce emails and order confirmation screen.

== Description ==

This free plugin adds a SEPA (Single Euro Payments Area) QR code to the WooCommerce emails and order confirmation screen.
This allows you to provide an easy payment solution for your customers for free. You don't have to pay for a subscription
with a payment provider and your customers can use their bank's mobile app to pay.

Keep in mind that the SEPA QR code only works for payments in Euro.

Also, if you have multiple bank accounts in your WooCommerce settings, the first one will be used (may change in the future).

= Usage =

Just install the plugin and activate it.

= Settings =

In the WordPress settings, a "SEPA QR" menu item will be added. There you can choose whether or not to store the
generated QR codes as an image (a PNG file). This is necessary for some email clients (like GMail) that won't render Base64
encoded images.

= Translation =

Currently, English, Dutch, French and German are supported.

== Frequently Asked Questions ==

= I can't see the QR-Code in a specific email client =

In the WordPress admin UI, go to Settings > SEPA QR and enable the option to store the QR codes as images.

= What about privacy / GDPR =

The plugin creates the QR-Code on your server and it does not use any external resources. However,
when using the option to store the QR codes as images, this means the QR codes remain on your server.
I have yet to implement a cleanup solution. But even with a cleanup solution, the images will probably
remain on your server for some time (and be sent across the internet to your mail server). I'm not lawyer,
but it seems wise to inform your customers about this.
A more future proof solution may be to replace the QR code in the email with a link to a page hosted
by your website with the QR code.

== Screenshots ==

1. the QR-Code gets added to the WooCommerce order email
2. example how the qr-code is hooked into a pdf envoice

== Changelog ==

= 2.1.2 =

* Fixed translations by giving the language files the correct name.

= 2.1.1 =

* Fixed version numbering

= 2.1.0 =

* Added French and German translations

= 2.0.3 =

* Bumped version number in correct places

= 2.0.2 =

* Fixed issue with WP file system not being initialized.

= 2.0.1 =

* Fixed issues found by Plugin Check

= 2.0.0 =

* Revamped readme
* Renamed text domain
* Added Dutch language

= 1.0.4 =
* initial commit to the wordpress directory

== Development ==

Development happens in the [GitHub](https://github.com/petermorlion/SEPA-QR-for-Woocommerce)
repository. The [SVN](https://plugins.svn.wordpress.org/sepa-qr-code-for-woocommerce/)
repository is for releases only.
