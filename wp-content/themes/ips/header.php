<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
$setting = new Setting(111);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <section id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 left-col">
                            <div class="logo-wrapper">
                                <a href="<?=get_home_url()?>" class="logo">Inglewood Primary School<br /><span>Te Kura O Kohanga Moa</span></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 right-col">
                            <div class="contacts-wrapper">
                                <a href="tel:<?=$setting->getPhone()?>"><?=$setting->getPhone()?></a>
                                <address>33 Kelly Street, 4330, NZ</address>
                            </div>
                            <a class="events-calendar" href="https://calendar.google.com/calendar?cid=aW5nbGV3b29kLnNjaG9vbC5uel80NTZyN3NkbmxmaG81bTZqNHI3cXZnZ2NhOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t" target="_blank"><span class="fa fa-calendar"></span>Events Calendar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="main-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 no-padding">
                            <div id="ips-menu-wrapper">
                                <a class="events-calendar-m" href="https://calendar.google.com/calendar?cid=aW5nbGV3b29kLnNjaG9vbC5uel80NTZyN3NkbmxmaG81bTZqNHI3cXZnZ2NhOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t" target="_blank"><span class="fa fa-calendar"></span></a>
                                <div class="main-nav wrapper-fluid wrapper-navbar" id="wrapper-navbar">
                                    <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'primary',
                                                'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                                'menu_class' => 'nav navbar-nav',
                                                'fallback_cb' => '',
                                                'menu_id' => 'main-menu'
                                            )
                                        );
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>