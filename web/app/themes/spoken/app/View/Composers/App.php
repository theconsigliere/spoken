<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'preloader' => $this->preloader(),
            'socials' => $this->socials(),
            'header' => $this->header(),
            'cookiePopup' => $this->cookiePopup(),
            'footer' => $this->footer(),
            'announcementBar' => $this->announcementBar(),
            'subscribe' => $this->subscribe(),
            'openingTimes' => $this->openingTimes(),
            'contactDetails' => $this->contactDetails(),
            'opentableEmbed' => $this->opentableEmbed(),
            'privacyPolicy' => $this->privacyPolicy(),
        ];
    }
    
    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    // Header content
    public function header() {
        $header = get_field('header', 'options');

        $newHeaderContent = [];

        // find out how many items are in the menu array
        $menuCount = count($header['menu']);

        // divide the menu array in half, if there is not an even amount make second array bigger
        $newHeaderContent['desktopMenuOne'] = array_slice($header['menu'], 0, ceil($menuCount / 2));
        $newHeaderContent['desktopMenuTwo'] = array_slice($header['menu'], ceil($menuCount / 2));


        $newHeaderContent['mobile_menu'] = $header['menu'];

        // push logo to newHeaderContent
        $newHeaderContent['logo'] = $header['logo'];


        return $newHeaderContent;
    }

    // Preloader content
    public function preloader() {
        $preloader = get_field('preloader', 'options');
        return $preloader;
    }

    // Socials content
    public function socials() {
        $socials = get_field('socials', 'options');
        return $socials;
    }

    // Cookie popup content
    public function cookiePopup() {
        $cookiePopup = get_field('cookie_popup', 'options');
        return $cookiePopup;
    }

    // Footer content
    public function footer() {
        $footer = get_field('footer', 'options');
        return $footer;
    }

    // Announcement bar content
    public function announcementBar() {
        $announcementBar = get_field('announcement_bar', 'options');
        return $announcementBar;
    }

    // Subscribe content
    public function subscribe() {
        $subscribe = get_field('subscribe', 'options');
        return $subscribe;
    }

    // Subscribe content
    public function openingTimes() {
        $openingTimes = get_field('opening_times', 'options');
        return $openingTimes;
    }

    // Contact details content
    public function contactDetails() {
        $contactDetails = get_field('contact_details', 'options');
        return $contactDetails;
    }

    // Opentable embed content
    public function opentableEmbed() {
        $opentableEmbed = get_field('opentable_embed', 'options');
        return $opentableEmbed;
    }

    // cookie policy
    public function privacyPolicy() {
        return get_field('privacy_policy_popup', 'options');
    }
    
}