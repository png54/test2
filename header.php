<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo (is_rtl() || get_locale() == 'ar') ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#D71920',
                        'primary-hover': '#C4141B',
                    }
                }
            }
        }
    </script>
    <?php wp_head(); ?>
    <style>
        :root {
            --primary: #D71920;
            --primary-hover: #C4141B;
            --black-text: #1A1A1A;
            --light-gray: #F5F5F5;
            --borders: #E5E5E5;
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm" style="border-bottom: 2px solid var(--borders)">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        
        <!-- Logo CGEA -->
        <div class="site-branding flex items-center space-x-3">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center gap-3">
                <span style="font-size: 1.5rem; font-weight: 800; color: var(--primary); letter-spacing: -0.5px;">CGEA</span>
                <div class="border-l border-gray-300 pl-3 h-8 hidden md:block">
                    <span class="text-xs font-semibold text-gray-500">Conseil Général de l'Énergie</span>
                </div>
            </a>
        </div>

        <!-- Menu de navigation principal -->
        <nav id="site-navigation" class="main-navigation hidden lg:flex items-center gap-6">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'flex items-center gap-6 text-sm font-medium text-gray-700',
                'container'      => false,
            ) );
            ?>
        </nav>

        <!-- Sélecteur de Langue & Outil de Recherche -->
        <div class="header-actions flex items-center gap-4">
            <!-- Intégration Polylang -->
            <div class="language-switcher text-sm font-semibold text-gray-700">
                <?php if ( function_exists('pll_the_languages') ) : ?>
                    <ul class="flex gap-3">
                        <?php pll_the_languages(array('show_flags'=>0, 'show_names'=>1)); ?>
                    </ul>
                <?php else : ?>
                    <!-- Fallback manuel si Polylang est temporairement inactif -->
                    <a href="?lang=fr" class="hover:text-red-600 px-1">FR</a> | 
                    <a href="?lang=ar" class="hover:text-red-600 px-1 font-ar">العربية</a>
                <?php endif; ?>
            </div>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>?s=" class="search-btn text-gray-600 hover:text-red-600">
                <span class="dashicons dashicons-search"></span>
            </a>
            
            <a href="#contact" class="hidden md:inline-block bg-red-600 text-white px-4 py-2 rounded text-xs font-bold uppercase tracking-wider hover:bg-red-700 transition">
                Contactez-nous
            </a>
        </div>
    </div>
</header>
