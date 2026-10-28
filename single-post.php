<?php get_header(); ?>

<?php

    while ( have_posts() ) :

        the_post();

        $categories = wp_get_post_categories( get_the_ID() );

        $related_posts = \Reyhane\Blog::get_related_post_with_formatted_data( get_the_ID() , 3);

    ?>

    <main id="content" <?php post_class( 'site-main' ); ?> >

        <div class="reyhane-container reyhane-center-container reyhane-blog-main-container">

            <div class="reyhane-blog-content-wrapper">

                <div class="reyhane-blog-content">

                    <h1 class="reyhane-blog-title">

                        <?php the_title(); ?>

                    </h1>


                    <div class="reyhane-blog-meta">

                        <div class="reyhane-blog-meta-item">

                            <span class="meta-title"> تاریخ انتشار : </span>

                            <span class="meta-value"> <?php echo get_the_date('j , F , Y ') ?></span>

                        </div>


                        <div class="meta-separator"> | </div>

                        <div class="reyhane-blog-meta-item">

                            <span class="meta-title"> مدت مطالعه : </span>

                            <span class="meta-value">

                             <?php

                             printf(
                                     '%s %s' ,
                                     \Reyhane\helper::englishToPersianNumber( get_field('time_to_read') ),
                                     'دقیقه'
                             )

                             ?>

                        </span>

                        </div>

                        <div class="meta-separator"> | </div>

                        <div class="reyhane-blog-meta-item">

                            <span class="meta-title"> دسته بندی : </span>

                            <span class="meta-value">

                             <?php

                             $dom = [];

                             foreach ($categories as $category_id) {

                                 $category = get_category( $category_id );

                                 $dom[] = sprintf(
                                         '<a href="%s">%s</a>',
                                         get_category_link($category_id),
                                         $category->name
                                 );

                             }

                             echo implode(' , ', $dom);

                             ?>

                        </span>

                        </div>

                    </div>


                    <div class="blog-main-image">

                        <?php echo get_the_post_thumbnail( get_the_ID() , 'full' );  ?>

                    </div>


                    <div class="blog-main-content">

                        <?php the_content(); ?>

                    </div>

                </div>



                <?php if(!empty($related_posts)){ ?>

                    <div class="reyhane-blog-related-posts">

                        <h3 class="reyhane-related-post-main-title">مطالب مرتبط</h3>

                        <div class="reyhane-blog-related-posts-items-container">

                            <?php foreach ( $related_posts as $related_post ) {

                                get_template_part('/templates/single-post-grid-item/index', '' , $related_post);

                            } ?>

                        </div>

                    </div>

                <?php } ?>


            </div>


            <div class="reyhane-blog-sidebar">

                <?php dynamic_sidebar('reyhane-post-sidebar'); ?>


            </div>

        </div>



    </main>

<?php endwhile; ?>

<?php get_footer(); ?>
