<?php
/**
 * Main template file
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container-custom section-padding">
    <?php if (have_posts()) : ?>

        <div class="max-w-4xl mx-auto">
            <?php while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-6 rounded-lg overflow-hidden">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header mb-6">
                        <h1 class="text-4xl font-bold text-its-blue mb-4">
                            <a href="<?php the_permalink(); ?>" class="hover:text-its-blue-dark transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h1>

                        <div class="text-gray-600 text-sm">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                            <?php if (get_the_author()) : ?>
                                <span class="mx-2">|</span>
                                <span><?php echo esc_html__('Von', 'itskanal') . ' ' . get_the_author(); ?></span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <div class="entry-content prose max-w-none">
                        <?php
                        if (is_singular()) {
                            the_content();
                        } else {
                            the_excerpt();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="btn-primary mt-4">
                                <?php esc_html_e('Weiterlesen', 'itskanal'); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>

                </article>

            <?php endwhile; ?>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Vorherige', 'itskanal'),
                'next_text' => __('Nächste &raquo;', 'itskanal'),
            ));
            ?>

        </div>

    <?php else : ?>

        <div class="max-w-4xl mx-auto text-center py-16">
            <h1 class="text-4xl font-bold text-its-blue mb-4"><?php esc_html_e('Keine Inhalte gefunden', 'itskanal'); ?></h1>
            <p class="text-gray-600 mb-8"><?php esc_html_e('Es wurden keine Inhalte gefunden. Versuchen Sie eine Suche.', 'itskanal'); ?></p>
            <?php get_search_form(); ?>
        </div>

    <?php endif; ?>
</div>

<?php
get_footer();
