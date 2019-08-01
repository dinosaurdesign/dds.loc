<section class="container section__services">
    <div class="row services__container">
		<?php if ( have_posts() ) : query_posts( 'p=164' );
			while ( have_posts() ) : the_post();
				?>
<!--                <div class="col wow fadeInLeft" data-wow-offset="200" style="background-color: #F3EFEA;">-->
<!--                    <a href="--><?php //echo esc_url( get_permalink() ); ?><!--" rel="bookmark">-->
<!---->
<!--                        <div class="services__icon">-->
<!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/services/restaurant.svg" alt="">-->
<!--                            <h3 class="text-center" itemprop="name">--><?php //the_title(); ?><!--</h3>-->
<!--                        </div>-->
<!---->
<!--                    </a>-->
<!--                </div>-->
                <div class="col wow fadeInLeft" data-wow-offset="200" style="background-color: #F3EFEA;">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                        <div class="services__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/services/icon-menu.svg" alt="">
                            <h3 class="text-center" itemprop="name"><?php the_title(); ?></h3>
                        </div>
                    </a>
                </div>

                <div class="col services__tags wow fadeInRight d-none d-sm-none d-md-flex" data-wow-offset="200">
                    <ul class="">
                        <li>#Дизайн меню</li>
                        <li>#Основное меню</li>
                        <li>#Сезонное меню</li>
                        <li>#Барные карты</li>
                        <li>#Тэйбл тенты</li>
                        <li>#Плейсметы</li>
                        <li>#Перевод меню</li>
                    </ul>
                </div>
			<?php
			endwhile;
		endif;
		wp_reset_query(); ?>
    </div>
</section>
<section class="container">
    <div class="row services__container">
		<?php if ( have_posts() ) : query_posts( 'p=166' );
			while ( have_posts() ) : the_post();
				?>
                <div class="col order-1 wow fadeInRight" data-wow-offset="200" style="background-color: #E1ECEF;">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                        <div class="services__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/services/011-restaurant.svg"
                                 alt="">
                            <h3 class="text-center" itemprop="name">
								<?php the_title(); ?></h3>
                        </div>
                    </a>
                </div>
                <div class="col order-0 services__tags wow fadeInLeft d-none d-sm-none d-md-flex" data-wow-offset="200">
                    <ul class="">
                        <li>#Фирменный стиль</li>
                        <li>#Логотип</li>
                        <li>#Афиша</li>
                        <li>#Рекламны баннер</li>
                        <li>#Оформление социальны сетей</li>
                        <li>#Плейсметы</li>
                        <li>#Перевод меню</li>
                    </ul>
                </div>
			<?php endwhile;
		endif;
		wp_reset_query(); ?>
    </div>
</section>
<section class="container">
    <div class="row services__container">
		<?php if ( have_posts() ) : query_posts( 'p=168' );
			while ( have_posts() ) : the_post();
				?>
                <div class="col wow fadeInLeft" data-wow-offset="200" style="background-color: #EFEFEF;">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                        <div class="services__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/services/036-website.svg" alt="">
                            <h3 class="text-center" itemprop="name"><?php the_title(); ?></h3>
                        </div>
                    </a>
                </div>
                <div class="col services__tags wow fadeInRight d-none d-sm-none d-md-flex" data-wow-offset="200">
                    <ul class="">
                        <li>#Сайт доставки еды</li>
                        <li>#Интернет магазин</li>
                        <li>#Корпоративный сайт</li>
                        <li>#Landind‑page</li>
                        <li>#Сайт‑визитка</li>

                    </ul>
                </div>
			<?php endwhile;
		endif;
		wp_reset_query(); ?>
    </div>
</section>
