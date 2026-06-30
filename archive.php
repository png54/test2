<?php
/**
 * The template for displaying archive pages
 *
 * @package cgea-theme
 */

get_header(); ?>

<div class="bg-gray-50 py-12 border-b border-gray-200">
    <div class="container mx-auto px-4">
        <?php
        the_archive_title( '<h1 class="text-3xl font-bold text-gray-900">', '</h1>' );
        the_archive_description( '<div class="text-gray-500 mt-2 text-sm">', '</div>' );
        ?>
    </div>
</div>

<div class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="h-48 overflow-hidden">
                            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
                        </div>
                    <?php endif; ?>
                    <div class="p-6">
                        <span class="text-xs text-gray-400 font-semibold uppercase block mb-2"><?php echo get_the_date(); ?></span>
                        <h2 class="text-xl font-bold text-gray-900 mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="text-gray-600 text-sm mb-4"><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
                        <a href="<?php the_permalink(); ?>" class="text-red-600 text-xs font-bold hover:underline"><?php esc_html_e("En savoir plus &rarr;", "cgea-theme"); ?></a>
                    </div>
                </article>
            <?php endwhile; ?>
            
            <!-- Pagination standard WordPress -->
            <div class="col-span-1 md:col-span-3 pt-12 text-center">
                <?php the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => esc_html__( '&larr; Précédent', 'cgea-theme' ),
                    'next_text' => esc_html__( 'Suivant &rarr;', 'cgea-theme' ),
                )); ?>
            </div>
            
        <?php else : ?>
            <div class="col-span-1 md:col-span-3 py-12 text-center text-gray-500">
                <p><?php esc_html_e("Aucun contenu trouvé dans cette catégorie.", "cgea-theme"); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
