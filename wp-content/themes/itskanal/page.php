<?php
/**
 * Template for displaying pages
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="page-header bg-gradient-to-br from-its-blue to-its-blue-dark text-white section-padding">
    <div class="container-custom">
        <h1 class="text-4xl md:text-5xl font-bold"><?php the_title(); ?></h1>
    </div>
</div>

<div class="container-custom section-padding">
    <?php
    while (have_posts()) : the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>

            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-8 rounded-lg overflow-hidden">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content prose max-w-none">
                <?php the_content(); ?>
            </div>

        </article>

        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
