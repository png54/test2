<?php
/**
 * CGEA Footer Template
 *
 * @package cgea-theme
 */
?>

<footer id="colophon" class="site-footer bg-gray-900 text-white pt-16 pb-8 border-t-4 border-red-600">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
        
        <!-- Colonne 1 : Description -->
        <div>
            <h3 class="text-xl font-bold text-white mb-4">CGEA</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                <?php echo esc_html(get_bloginfo('description')); ?>
            </p>
            <div class="social-icons flex gap-4">
                <a href="<?php echo esc_url(get_theme_mod('facebook_url', '#')); ?>" class="text-gray-400 hover:text-white"><span class="dashicons dashicons-facebook"></span></a>
                <a href="<?php echo esc_url(get_theme_mod('twitter_url', '#')); ?>" class="text-gray-400 hover:text-white"><span class="dashicons dashicons-twitter"></span></a>
                <a href="<?php echo esc_url(get_theme_mod('linkedin_url', '#')); ?>" class="text-gray-400 hover:text-white"><span class="dashicons dashicons-linkedin"></span></a>
            </div>
        </div>

        <!-- Colonne 2 : Liens Utiles -->
        <div>
            <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4"><?php esc_html_e("Navigation", "cgea-theme"); ?></h3>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_class'     => 'space-y-2 text-sm text-gray-400',
                'container'      => false,
            ));
            ?>
        </div>

        <!-- Colonne 3 : Contact et Informations -->
        <div>
            <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4"><?php esc_html_e("Contactez-nous", "cgea-theme"); ?></h3>
            <ul class="space-y-3 text-sm text-gray-400">
                <li class="flex items-start gap-2">
                    <span class="dashicons dashicons-location text-red-600"></span>
                    <span><?php esc_html_e("Avenue des Ministères, Bloc Administratif Central, BP 4022", "cgea-theme"); ?></span>
                </li>
                <li class="flex items-center gap-2">
                    <span class="dashicons dashicons-phone text-red-600"></span>
                    <span>+212 537 777 000</span>
                </li>
                <li class="flex items-center gap-2">
                    <span class="dashicons dashicons-email text-red-600"></span>
                    <span>contact@cgea.gov.ma</span>
                </li>
            </ul>
        </div>

        <!-- Colonne 4 : Newsletter -->
        <div>
            <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4"><?php esc_html_e("Newsletter", "cgea-theme"); ?></h3>
            <p class="text-gray-400 text-sm mb-4"><?php esc_html_e("Inscrivez-vous pour recevoir les avis d'appels d'offres et circulaires.", "cgea-theme"); ?></p>
            <form action="" method="post" class="flex">
                <input type="email" placeholder="Votre adresse email" class="bg-gray-800 text-white border-0 px-3 py-2 text-sm rounded-l focus:ring-1 focus:ring-red-600 w-full" required>
                <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 text-sm rounded-r font-bold uppercase">S'abonner</button>
            </form>
        </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-gray-800 pt-8 mt-8">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
            <p>&copy; <?php echo date('Y'); ?> CGEA. <?php esc_html_e("Tous droits réservés. Portail officiel de souveraineté.", "cgea-theme"); ?></p>
            <p class="mt-2 md:mt-0"><?php esc_html_e("Développé conformément aux standards de développement WordPress.", "cgea-theme"); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
