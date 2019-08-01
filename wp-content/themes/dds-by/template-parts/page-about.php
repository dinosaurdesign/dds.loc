<?php
get_header();
?>
    <header class="row">
        <div class="col-12">
            <div class="portfolio__header bg_dotted container-fluid">
                <div class="row align-items-end">
                    <div class="col-2 bg-white offset-3">
                        <h2 class="text-left" itemprop="name"><?php the_title(); ?></h2>
                        <div class="d-flex justify-content-start">
                            <img class="arrow__down img-fluid"
                                 src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                            <img class="arrow__down img-fluid"
                                 src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                            <img class="arrow__down img-fluid"
                                 src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article>
        <div class="container mt-30">
			<?php kama_breadcrumbs( ' /' ); ?>
        </div>
        <section class="container mt-80">
            <header class="col-3">
                <h2 class="text-right">Dinnersaur<br>Design<br>Studio</h2>
            </header>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 offset-sm-3 col-sm-9 mb-5">
							<?php the_content(); ?>
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <section class="d-none d-md-flex home__clients" style="background-color: #efecec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 offset-sm-3 justify-content-end">
                        <h2 class="text-left" itemprop="name">Благодарим<br/>за<br/>сотрудничество<br/><img
                                    class="arrow__down align-self-end"
                                    src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg"
                                    alt="дизайн Витебск"/></h2>
                    </div>
                    <div class="w-100"></div>
					<?php
					// параметры по умолчанию
					$args = array(
						'numberposts'      => 16,
						'category_name'    => 'clients',
						'orderby'          => 'date',
						'order'            => 'DESC',
						'include'          => array(),
						'exclude'          => array(),
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post',
						'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
					);

					$posts = get_posts( $args );

					foreach ( $posts as $post ) {
						setup_postdata( $post );
						?>
                        <div class="col-12 col-sm-6 col-md-3 clients">
							<?php clients_thumbnail(); ?>
                        </div>
						<?
					}
					wp_reset_postdata();
					?>
                </div>

            </div>
        </section>
    </article>

<?php

get_footer();

