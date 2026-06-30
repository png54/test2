<?php
/**
 * Template Name: Accueil CGEA
 *
 * @package cgea-theme
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Section 1 : Hero Banner (ACF Réutilisable) -->
    <section class="hero-section relative bg-gray-900 text-white py-32 overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold max-w-3xl leading-tight mb-6">
                <?php echo esc_html(get_field('hero_title_principal') ?: "Réguler l'Énergie, Bâtir le Futur de la Transition"); ?>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mb-8">
                <?php echo esc_html(get_field('hero_sub_description') ?: "Souveraineté énergétique nationale, audit d'efficacité administrative, transition énergétique."); ?>
            </p>
            <a href="#about" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-md font-semibold transition inline-block">
                <?php echo esc_html(get_field('hero_cta_text') ?: "En savoir plus"); ?>
            </a>
        </div>
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <?php 
        $hero_bg = get_field('hero_background_image');
        $hero_bg_url = '';
        if (is_array($hero_bg) && isset($hero_bg['url'])) {
            $hero_bg_url = $hero_bg['url'];
        } elseif (is_string($hero_bg) && !empty($hero_bg)) {
            $hero_bg_url = $hero_bg;
        } else {
            $hero_bg_url = 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1600';
        }
        ?>
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($hero_bg_url); ?>'); z-index:-1;"></div>
    </section>

    <!-- Section 2 : À propos & Chiffres Clés (Statistiques) -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6 border-l-4 border-red-600 pl-4"><?php esc_html_e("Présentation du CGEA", "cgea-theme"); ?></h2>
                <div class="text-gray-700 leading-relaxed space-y-4">
                    <?php echo wp_kses_post(get_field('about_text_presentation') ?: "Le Conseil Général de l'Énergie (CGEA) est l'organe supérieur de régulation, d'audit d'efficacité énergétique et de planification stratégique nationale."); ?>
                </div>
            </div>
            
            <!-- Compteurs de Statistiques Dynamiques -->
            <div class="grid grid-cols-2 gap-6 bg-gray-50 p-8 rounded-lg border border-gray-100">
                <div class="text-center p-4">
                    <span class="block text-4xl font-bold text-red-600 mb-2">500+</span>
                    <span class="text-sm font-semibold text-gray-600"><?php esc_html_e("Projets Financés", "cgea-theme"); ?></span>
                </div>
                <div class="text-center p-4">
                    <span class="block text-4xl font-bold text-red-600 mb-2">95%</span>
                    <span class="text-sm font-semibold text-gray-600"><?php esc_html_e("Électrification Rurale", "cgea-theme"); ?></span>
                </div>
                <div class="text-center p-4">
                    <span class="block text-4xl font-bold text-red-600 mb-2">12</span>
                    <span class="text-sm font-semibold text-gray-600"><?php esc_html_e("Bureaux Régionaux", "cgea-theme"); ?></span>
                </div>
                <div class="text-center p-4">
                    <span class="block text-4xl font-bold text-red-600 mb-2">1.2GW</span>
                    <span class="text-sm font-semibold text-gray-600"><?php esc_html_e("Capacité Propre", "cgea-theme"); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3 : Dernières Actualités (WP_Query CPT: news) -->
    <section class="py-20 bg-gray-50 border-t border-b border-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900"><?php esc_html_e("Dernières Actualités", "cgea-theme"); ?></h2>
                    <p class="text-gray-500 mt-2"><?php esc_html_e("Toute l'information officielle de l'énergie", "cgea-theme"); ?></p>
                </div>
                <a href="<?php echo get_post_type_archive_link('news'); ?>" class="text-red-600 font-bold hover:text-red-700"><?php esc_html_e("Voir toutes les actualités &rarr;", "cgea-theme"); ?></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $news_query = new WP_Query(array(
                    'post_type'      => 'news',
                    'posts_per_page' => 3,
                ));

                if ( $news_query->have_posts() ) :
                    while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                        <article class="bg-white rounded-lg overflow-hidden border border-gray-100 hover:shadow-lg transition">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="h-48 overflow-hidden">
                                    <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <span class="text-xs font-bold text-red-600 uppercase tracking-widest block mb-2"><?php echo get_the_date(); ?></span>
                                <h3 class="text-lg font-bold text-gray-900 mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="text-gray-600 text-sm mb-4"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                                <a href="<?php the_permalink(); ?>" class="text-xs font-bold text-red-600 hover:underline"><?php esc_html_e("Lire l'article &rarr;", "cgea-theme"); ?></a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-gray-500"><?php esc_html_e("Aucune actualité publiée pour le moment.", "cgea-theme"); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
