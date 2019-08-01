<?php
get_header();
?>
    <header class="portfolio__header">
        <div class="row align-items-end">
            <div class="col-2 bg-white offset-3">
                <h2 class="text-left" itemprop="name">Делаем то, что любим</h2>
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
		<?php kama_breadcrumbs( ' /' ); ?>
    </div>

   <?php include 'components/services.php' ?>

<?php

get_footer();

