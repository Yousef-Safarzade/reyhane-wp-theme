<?php

Reyhane\config::init();


add_action( 'after_setup_theme', function () {

    \Reyhane\scripts::define_hooks();

});


\Reyhane\supports::define_hooks();

\Reyhane\widgets::define_hooks();

\Reyhane\ServicesPostType::define_hooks();

\Reyhane\TestimonialPostType::define_hooks();

\Reyhane\ElementorWidgets::define_hooks();