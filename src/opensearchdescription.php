<?php
    if (!headers_sent()) {
        header('Content-Type: application/opensearchdescription+xml; charset=utf-8');
    } 
    $wp_did_header = true;
    define('WP_USE_THEMES', false);
    require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
    if (function_exists('wp')) {
        wp();
    }
?>
<?xml version="1.0" encoding="UTF-8"?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/">
    <InputEncoding><?php echo get_bloginfo('charset'); ?></InputEncoding>
    <OutputEncoding><?php echo get_bloginfo('charset'); ?></OutputEncoding>
    <AdultContent>false</AdultContent>
    <Language><?php echo get_bloginfo('language'); ?></Language>
    <SyndicationRight>open</SyndicationRight>
    <Attribution>© <?php echo get_bloginfo('name').', '.date('Y'); ?></Attribution>
    <Developer>Automatic &amp; Immature Dawn</Developer>
<?php
    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/favicon.ico')) {
?>
    <Image type="image/vnd.microsoft.icon"><?php echo get_bloginfo('url'); ?>/favicon.ico</Image>
<?php
    }
?>
    <Url type="text/rss+xml" rel="results" template="<?php echo get_bloginfo('url'); ?>/?s={searchTerms}&amp;feed=rss"></Url>
    <Url type="text/atom+xml" rel="results" template="<?php echo get_bloginfo('url'); ?>/?s={searchTerms}&amp;feed=atom"></Url>
    <Url type="text/html" rel="results" template="<?php echo get_bloginfo('url'); ?>/?s={searchTerms}"></Url>
<?php
    /* Start of block where translation will be necessary  */
    $str = __('Search ', 'WPOpenSearchPlugin');
    $str .= get_bloginfo('name'); ?>
    <Description><?php echo $str; ?></Description>
    <Tags><?php echo str_replace(' ', '', strtolower(get_bloginfo('name'))); ?> site search</Tags>
    <Contact><?php echo get_bloginfo('admin_email'); ?></Contact>
    <ShortName><?php echo __('Site Search', 'WPOpenSearchPlugin'); ?></ShortName>
<?php
    $str = get_bloginfo('name');
    $str .= ' |'.__(' Site Search', 'WPOpenSearchPlugin'); ?>
    <LongName><?php echo $str; ?></LongName>
<?php $str = get_bloginfo('name'); ?>
    <Query role="example" searchTerms="<?php echo $str; ?>"></Query>
 </OpenSearchDescription>
<?php
    exit(0);
