<div class="reyhane-widget-wrapper">

    <?php for ($i=1; $i <= 4; $i++) { ?>

        <div id="<?php echo 'widget-'.$i; ?>" class="reyhane-widget-column"  >

            <?php dynamic_sidebar('footer-' . $i); ?>

        </div>

    <?php } ?>

</div>