<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
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
                        <div class="col-xs-12 col-md-7 left-col">
                            <div class="logo-wrapper">
                                <a href="<?=get_home_url()?>" class="logo">Inglewood Primary School<br /><span>Te Kura O Kohanga Moa</span></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-5 right-col">
                            <div class="contacts-wrapper">
                                <a href="tel:067568040">06 756 8040</a>
                                <address>33 Kelly Street, 4330, NZ</address>
                            </div>
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
                        <div class="col-xl-12">
                            [menu]
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>