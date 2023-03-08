<?php
    declare(strict_types=1);
    use PHPUnit\Framework\Testcase;
    include __DIR__.'/../../../dumb_wordpress_functions.php';
    include __DIR__.'/../src/WPOpenSearchPlugin.php';
    final class wp_OpenSearchTests extends Testcase
    {
        public function testfor_OpenSearchPlugin_is_class(): void
        {
            $this->assertTrue(class_exists('WPOpenSearchPlugin'));
        }
        public function testfor_OpenSearchPlugin_isEnabled(): void
        {
            $this->assertTrue(method_exists('WPOpenSearchPlugin', 'isEnabled'));
        }
        public function testfor_OpenSearchPlugin_isEnabledWorks(): void
        {
            $this->assertTrue(WPOpenSearchPlugin::isEnabled() === true);
        }
        public function testfor_OpenSearchPlugin_getUrl(): void
        {
            $this->assertTrue(method_exists('WPOpenSearchPlugin', 'getUrl'));
        }
        public function testfor_OpenSearchPlugin_getUrl_works(): void
        {
            $this->assertTrue(WPOpenSearchPlugin::getUrl() === 'PLUGIN/opensearchdescription.php');
        }
        public function testfor_OpenSearchPlugin_viewLinkTag_exists():void 
        {
            $this->assertTrue(method_exists('WPOpenSearchPlugin', 'viewLinkTag'));
        }
        public function testfor_OpenSearchPlugin_viewLinkTag_works(): void
        {
            $str = '<link rel="profile" src="http://a9.com/-/spec/opensearch/1.1/" />'.'<link rel="search" type="application/opensearchdescription+xml" href="'.WPOpenSearchPlugin::getUrl().'" title="Site Search" />';
            $this->assertTrue(WPOpenSearchPlugin::viewLinkTag() === $str);
        }
        public function testfor_OpenSearchPlugin_writeLinkTag_exists(): void
        {
            $this->assertTrue(method_exists('WPOpenSearchPlugin', 'writeLinkTag'));
        }
        public function testfor_OpenSearchPlugin_writeLinkTag_works(): void
        {
            WPOpenSearchPlugin::writeLinkTag();
            $this->expectOutputString(WPOpenSearchPlugin::viewLinkTag());
        }
        public function testfor_OpenSearchPlugin_head_action(): void
        {
            $this->assertTrue(ActionHook::has('wp_head', 'WPOpenSearchPlugin::writeLinkTag'));
        }
        public function testfor_OpenSearchPlugin_activation(): void
        {
            $this->assertTrue(RegistrationHook::has('WPOpenSearchPlugin::activate', 'activation'));
        }
        public function testfor_OpenSearchPlugin_deactivation(): void
        {
            $this->assertTrue(RegistrationHook::has('WPOpenSearchPlugin::deactivate', 'deactivation'));
        }
        public function testfor_OpenSearchPlugin_uninstallHook(): void
        {
            $this->assertTrue(RegistrationHook::has('WPOpenSearchPlugin::uninstall', 'uninstall'));
        }
    }

