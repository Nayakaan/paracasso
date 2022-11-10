<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>
<div class="col-lg-12">
    <section class="no-results not-found content_none_fnc">
        <h2 class="searchtitle"><?php echo esc_html__('Nothing Found', 'organia'); ?></h2>
        <div class="none_contents">
            <p>
                <?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'organia'); ?>
            </p>
            <?php
            get_search_form();
            ?>
        </div><!-- .page-content -->
    </section><!-- .no-results -->
</div>
