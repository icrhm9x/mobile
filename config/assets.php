<?php

return [
    'offline'        => env('ASSETS_OFFLINE', true),
    'enable_version' => env('ASSETS_ENABLE_VERSION', false),
    'version'        => env('ASSETS_VERSION', time()),
    'scripts'        => [
        'modernizr',
        'jquery',
        'bootstrap',
        'owl-carousel',
        'jquery_scrollUp',
        'price_slider',
        'jquery_bxslider',
        'mobile_menu',
        'wow',
        'plugins',
        'main',
    ],
    'styles'         => [
        'Bootstrap',
        'owl-carousel',
        'theme',
        'transitions',
        'font_awesome',
        'font-icon',
        'mobile-menu',
        'animate',
        'normalize',
        'main',
        'style css',
        'responsive',
    ],
    'resources'      => [
        'scripts' => [
            // js common
            'modernizr' => [
                'use_cdn'  => false,
                'location' => 'header',
                'src'      => [
                    'local' => '/assets/client/js/vendor/modernizr-2.8.3.min.js',
                ],
            ],
            'jquery'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/vendor/jquery-1.11.3.min.js',
                ],
            ],
            'bootstrap'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/bootstrap.min.js',
                ],
            ],
            'owl-carousel'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/owl.carousel.min.js',
                ],
            ],
            'jquery_scrollUp'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/jquery.scrollUp.min.js',
                ],
            ],
            'price_slider'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/price-slider.js',
                ],
            ],
            'jquery_bxslider'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/jquery.bxslider.min.js',
                ],
            ],
            'mobile_menu'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/jquery.meanmenu.js',
                ],
            ],
            'wow'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/wow.js',
                ],
            ],
            'plugins'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/plugins.js',
                ],
            ],
            'main'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/main.js',
                ],
            ],
            // end js common

            // index
            'Nivo-slider'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/custom-slider/js/jquery.nivo.slider.js',
                ],
            ],
            'home'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/custom-slider/home.js',
                ],
            ],

            // contact
            'gmap'       => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src'      => [
                    'local' => '/assets/client/js/gmap.js',
                ],
            ],
        ],
        'styles'  => [
            // css common
            'Bootstrap' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/bootstrap.min.css',
                ],
                // 'attributes' => [
                //     'integrity'   => 'sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB',
                //     'crossorigin' => 'anonymous',
                // ],
            ],
            'owl-carousel' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/owl.carousel.css',
                ],
            ],
            'theme' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/owl.theme.css',
                ],
            ],
            'transitions' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/owl.transitions.css',
                ],
            ],
            'font_awesome' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/font-awesome.min.css',
                ],
            ],
            'font-icon' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/fonts/font-icon.css',
                ],
            ],
            'mobile-menu' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/meanmenu.min.css',
                ],
            ],
            'animate' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/animate.css',
                ],
            ],
            'normalize' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/normalize.css',
                ],
            ],
            'main' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/main.css',
                ],
            ],
            'style css' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/style.css',
                ],
            ],
            'responsive' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/responsive.css',
                ],
            ],
            // end css common

            // index
            'jquery-ui' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/css/jquery-ui.css',
                ],
            ],
            'nivo-slider' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/custom-slider/css/nivo-slider.css',
                ],
            ],
            'preview' => [
                'use_cdn'    => false,
                'location'   => 'header',
                'src'        => [
                    'local' => '/assets/client/custom-slider/css/preview.css',
                ],
            ],
        ],
    ],
];
