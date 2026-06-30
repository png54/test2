<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cgea-theme
 */

get_header();
?>

<main id="primary" class="site-main py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm p-6 md:p-10'); ?>>
                
                <header class="entry-header mb-8">
                    <?php if ( 'post' === get_post_type() || 'news' === get_post_type() ) : ?>
                        <div class="entry-meta text-xs text-red-600 font-bold uppercase tracking-wider mb-3">
                            <?php echo get_the_date(); ?> | Par <?php the_author(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <h1 class="entry-title text-3xl md:text-4xl font-extrabold text-gray-950 mb-4"><?php the_title(); ?></h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="entry-featured-image mb-8 rounded-lg overflow-hidden h-96">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content text-gray-800 leading-relaxed space-y-6 text-sm md:text-base">
                    <?php
                    the_content();
                    ?>
                </div>

                <!-- Section des métadonnées personnalisées (ACF) selon le CPT -->
                <?php if ( get_post_type() === 'events' ) : ?>
                    <div class="mt-8 p-6 bg-red-50 border border-red-100 rounded-lg">
                        <h4 class="font-bold text-red-700 mb-2"><?php esc_html_e("Informations de l'Événement", "cgea-theme"); ?></h4>
                        <p class="text-sm"><strong><?php esc_html_e("Date :", "cgea-theme"); ?></strong> <?php echo esc_html(get_field('event_date') ?: 'Non définie'); ?></p>
                        <p class="text-sm"><strong><?php esc_html_e("Lieu :", "cgea-theme"); ?></strong> <?php echo esc_html(get_field('event_location') ?: 'Non défini'); ?></p>
                    </div>
                <?php elseif ( get_post_type() === 'documents' ) : ?>
                    <div class="mt-8 p-6 bg-blue-50 border border-blue-100 rounded-lg flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-blue-800 mb-1"><?php esc_html_e("Téléchargement du document", "cgea-theme"); ?></h4>
                            <p class="text-xs text-gray-500">
                                <?php echo get_field('file_type') ?: 'PDF'; ?> (<?php echo get_field('file_size') ?: 'N/A'; ?>)
                            </p>
                        </div>
                        <a href="<?php echo esc_url(get_field('download_url') ?: '#'); ?>" class="bg-blue-600 text-white px-4 py-2 rounded text-xs font-bold hover:bg-blue-700 transition">
                            <?php esc_html_e("Télécharger", "cgea-theme"); ?>
                        </a>
                    </div>
                <?php endif; ?>

            </article>
            <?php
        endwhile; // End of the loop.
        ?>
    </div>
</main>

<?php
get_footer();
