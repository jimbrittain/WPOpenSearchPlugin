# WPOpenSearchPlugin - A Wordpress OpenSearchDescription Plugin

A minimal plugin that creates an OpenSearchDescription xml and adds the appropriate link tags to wp_head execution.

## Description

Provides an OpenSearchDescription xml for your wordpress installation, served as application/opensearchdescription+xml and includes the necessary profile and link to the wp_head to your installation/theme &lt;head&gt;. A possible extension would be if variables are supplied within the url these could be used as examples throughout.

## Getting Started

### Installing

* Upload the files within source to your Wordpress installation in /wp-content/plugins/WPOpenSearchPlugin.
* Activate the plugin

## Authors

* Jim Brittain: [@jimbrittain](https://github.com/jimbrittain/) [immaturedawn](http://www.immaturedawn.co.uk)

## Version History

* 0.2
    * Ensured that ShortName and link title are now the same (from Mozilla specification)
    * Removed HTML profile attribute to comply with HTML5 specification
    * Various bug fixes and optimizations
* 0.1
    * Internal Release

## License

This project is licensed under the terms of the MIT license. See the LICENSE.md file for details.

## Acknowledgments

* [mozilla](https://developer.mozilla.org/en-US/docs/Web/OpenSearch)
* [amazon](https://www.amazon.com)
* [DeWitt Clinton](https://github.com/dewitt/opensearch)
