<div class="reyhane-user-dashboard-content">

    <?php

        global $post;

        $post_slug = $post->post_name;

        if ( $post_slug == 'user-appointments' ){

            get_template_part('/templates/user-dashboard/section' , 'appointments' , $args );

        } else if ( $post_slug == 'edit-user-data' ) {

            get_template_part('/templates/user-dashboard/section' , 'edit-user-data-form' , $args );

        } else if ( $post_slug == 'user-invoices' ) {

            get_template_part('/templates/user-dashboard/section' , 'user-invoices' , $args );

        } else {

            get_template_part('/templates/user-dashboard/section' , 'edit-user-data-form' , $args );

        }


    ?>

</div>