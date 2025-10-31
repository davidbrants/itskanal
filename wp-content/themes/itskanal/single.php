<?php
/**
 * Template for displaying single posts
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container-custom section-padding">
    <?php
    while (have_posts()) : the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>

            <header class="entry-header mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-its-blue mb-4"><?php the_title(); ?></h1>

                <div class="flex items-center text-gray-600 text-sm space-x-4">
                    <time datetime="<?php echo get_the_date('c'); ?>" class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo get_the_date(); ?>
                    </time>

                    <?php if (get_the_author()) : ?>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            <?php the_author(); ?>
                        </span>
                    <?php endif; ?>

                    <?php if (has_category()) : ?>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            <?php the_category(', '); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-8 rounded-lg overflow-hidden">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content prose max-w-none mb-8">
                <?php the_content(); ?>
            </div>

            <?php if (has_tag()) : ?>
                <div class="border-t border-gray-200 pt-6 mb-8">
                    <div class="flex items-center flex-wrap">
                        <span class="font-semibold mr-3 text-gray-700">Tags:</span>
                        <?php the_tags('<span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm mr-2 mb-2">', '</span><span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm mr-2 mb-2">', '</span>'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <nav class="post-navigation flex justify-between border-t border-gray-200 pt-8">
                <div class="prev-post">
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                        ?>
                        <span class="text-sm text-gray-500 block mb-2">Vorheriger Artikel</span>
                        <a href="<?php echo get_permalink($prev_post); ?>" class="text-its-blue hover:text-its-blue-dark font-semibold">
                            ← <?php echo get_the_title($prev_post); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="next-post text-right">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                        ?>
                        <span class="text-sm text-gray-500 block mb-2">Nächster Artikel</span>
                        <a href="<?php echo get_permalink($next_post); ?>" class="text-its-blue hover:text-its-blue-dark font-semibold">
                            <?php echo get_the_title($next_post); ?> →
                        </a>
                    <?php endif; ?>
                </div>
            </nav>

        </article>

        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
