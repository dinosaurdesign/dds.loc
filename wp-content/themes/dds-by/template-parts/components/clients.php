<section class="home__clients" style="background-color: #efecec">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 offset-sm-3 justify-content-end">
                <h2 class="text-left" itemprop="name">Благодарим<br/>за<br/>сотрудничество<br/>
                    <img class="arrow__down align-self-end"
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
				if ( has_post_thumbnail() ) {
					$thumb       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
//					$thumb_alt   = trim( strip_tags( $attachment->post_excerpt ) );
//					$thumb_title = trim( strip_tags( $attachment->post_title ) );
					echo '<div class="col-6 col-md-3 clients"> <img class="img-fluid" src="' . $thumb[0] . '" /> </div> ';
				}// формат вывода
			}

			wp_reset_postdata();
			?>
        </div>
    </div>
</section>
