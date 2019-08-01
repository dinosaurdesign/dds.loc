<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dds.by
 */

get_header();
?>
    <header class="portfolio__header bg_dotted container-fluid">
        <div class="row align-items-end">
            <div class="col-2 bg-white offset-3">
                <h2 class="text-left">Свяжитесь с нами</h2>
                <div class="d-flex justify-content-start img-fluid">
                    <img class="arrow__down img-fluid"
                         src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                    <img class="arrow__down img-fluid"
                         src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                    <img class="arrow__down img-fluid"
                         src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                </div>

            </div>
        </div>
    </header>
<div class="container mt-30">
	<?php kama_breadcrumbs(' /'); ?>
</div>

    <section class="container home__contactscont" id="home__contacts">
        <div class="container home__contacts" id="home__contacts">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-10 offset-1 offset-md-2 col-md-8 justify-content-end">
                    <p class="text-right">Позвоните нам или заполните форму<br>и мы сами свяжемся с Вами.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
                    <ul class="row list__none" itemscope itemtype="http://schema.org/Organization">
                        <li class="col-12 col-md-4"><a href="tel: +37529244-43-75" itemprop="telephone">+375(29)244-43-75</a></li>
                        <li class="col-12 col-md-4"><a class="link__mail" href="mailto: info@dds.by" itemprop="email">info@dds.by</a>
                        </li>
                        <li class="col-12 col-md-4">
                            <ul class="navigation__social">
                                <li class="text-center"><a href="https://www.behance.net/DinnersaurDesign"
                                                           target="_blank"><img
                                                src="<?php echo get_template_directory_uri(); ?>/img/icons/behance.svg"
                                                alt="Ресторанный дизайн Витебск"></a></li>
                                <li><a href="https://vk.com/dinnersaurdesign" target="_blank"><img
                                                src="<?php echo get_template_directory_uri(); ?>/img/icons/vk.svg"
                                                alt="Ресторанный дизайн Витебск"></a>
                                </li>
                                <li><a href="https://www.instagram.com/DinnersaurDesign/" target="_blank"><img
                                                src="<?php echo get_template_directory_uri(); ?>/img/icons/in-logo.svg"
                                                alt="Ресторанный дизайн Витебск"></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="w-100"></div>
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
                    <form id="" method="POST" name="application" action="">
						<?php the_content(); ?>
                    </form>
                    <div id="result_form"></div>
                </div>
            </div>
    </section>
<?php

get_footer();
