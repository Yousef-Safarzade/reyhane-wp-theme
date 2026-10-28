<?php get_header(); ?>

    <div class="reyhane-container reyhane-center-container reyhane-archive-title-section">

        <?php if( is_category() ){ ?>

            <h1><?php single_cat_title(" " , true); ?></h1>

            <p><?php echo category_description(); ?></p>

        <?php } else if( is_tag() ) { ?>

            <h1><?php single_tag_title(" " , true); ?></h1>

            <p><?php echo tag_description(); ?></p>

        <?php } else { ?>

            <h1>مجله سلامت</h1>

            <p>در مجله سلامت آخرین مطالب دنیای پزشکی دندان را دنبال کنید.</p>

        <?php } ?>

    </div>

    <div class="reyhane-container reyhane-center-container reyhane-archive-items-container <?php  echo !have_posts() ? ' no-post-found ' : '' ?>">

        <?php if ( have_posts() ) { ?>

            <?php while ( have_posts() ) { ?>

                    <?php the_post(); ?>

                    <?php
                        get_template_part(
                            'templates/single-post-grid-item/index' ,
                            '' ,
                            \Reyhane\Blog::format_post_data( get_the_ID() )
                        )
                    ?>

            <?php } ?>

        <?php }else{ ?>

                <h2 class="no-post-found">مطلبی یافت نشد</h2>

        <?php } ?>

    </div>

<?php get_footer(); ?>