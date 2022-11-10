<?php
/* 
 * ThemeWar Helpar File
 */

/*
 * Register Sidebar  for this theme.
 */
if (!function_exists('organia_register_sidebars')) {
    function organia_register_sidebars($areas, $defaultParams = array())
    {
        if (empty($defaultParams)) {
            $defaultParams = array(
                'before_widget' => '<div id="%1$s" class="widget widget-container %2$s">',
                'after_widget' => "</div>",
                'before_title' => '<h3 class="widget_title">',
                'after_title' => '</h3>',
            );
        }

        foreach ($areas as $id => $area) {
            $params = array_merge($defaultParams, $area, array('id' => $id));
            register_sidebar($params);
        }
    }
}

/*
 * Google Font Enqueue  for this theme.
 */
if (!function_exists('organia_google_fonts_url')) {
    function organia_google_fonts_url()
    {
        $fonts_url = '';
        $font_families = array();

        $Spartan = _x('on', 'Spartan font: on or off', 'organia');
        $Roboto = _x('on', 'Roboto font: on or off', 'organia');

        if ('off' !== $Spartan) {
            $font_families[] = 'Spartan:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap';
        }

        if ('off' !== $Roboto) {
            $font_families[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap';
        }

        if ($font_families) {
            $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
            );
            $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
        }

        return esc_url_raw($fonts_url);
    }
}

/*
 * Custom Comment List for this theme.
 */
if (!function_exists('organia_comment_listing')) {
    function organia_comment_listing($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        $avater = get_avatar_url($comment->comment_author_email);
        if ($comment->user_id != '' && $comment->user_id != 0) {
            $userId = $comment->user_id;
            $avID = get_the_author_meta('user_av_ID', $userId);
            if ($avID != '') {
                $userAvater = organia_attachment_url($avID, 103, 103);
            } else {
                $userAvater = $avater;
            }
        } else {
            $userAvater = $avater;
        }
        $dateformate = get_option('date_format');
        ?>
        <li id="comment-<?php echo esc_attr($comment->comment_ID); ?>" <?php comment_class($args['has_children'] ? 'parent' : '', $comment); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body single_comment clearfix <?php if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') { ?> pingbackcomments <?php } ?>">
            <?php if ($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback'): ?>
                <img src="<?php echo esc_url($userAvater); ?>" alt="<?php echo esc_attr($comment->comment_author); ?>">
            <?php endif; ?>
            <h4 class="cm_author"><a href="javascript:void(0);"><?php echo esc_html($comment->comment_author); ?></a></h4>
            <div class="sc_content">
                <?php comment_text(); ?>
            </div>
            <span class="cm_date"><?php echo get_the_time('F j, Y'); ?></span>
            <?php comment_reply_link(array_merge($args, array('add_below' => 'div-comment', 'reply_text' => esc_html__('Reply', 'organia') . '<i class="twi-long-arrow-right"></i>', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </article>
        <?php
    }
}

/*
 * Post View Count  for this theme.
 */
function organia_post_view_count($id)
{

    $view = get_post_meta($id, '_organia_post_view', true);
    $view = (empty($view)) ? 0 : $view;
    $view += 1;

    update_post_meta($id, '_organia_post_view', $view);

}


/*
 * Get Post View Count  for this theme.
 */
function organia_get_post_view_count($id)
{
    $view = get_post_meta($id, '_organia_post_view', true);
    $view = (empty($view)) ? 0 : $view;
    $view = $view . ($view == 1 ? esc_html__(' View', 'organia') : esc_html__(' Views', 'organia'));
    return $view;
}

/*
 * Check if Plugin is Active for this theme.
 */
if (!function_exists('organia_plugin_active')) {
    function organia_plugin_active($plugin)
    {
        return in_array($plugin . '/' . $plugin . '.php', apply_filters('active_plugins', get_option('active_plugins')));
    }
}


if (!function_exists('organia_return')) {
    function organia_return($s)
    {
        return $s;
    }
}

/**
 * Get option value
 * @since  1.0.0
 */

if (!function_exists('organia_option')) {
    function organia_option($option)
    {
        return get_theme_mod($option, organia_defaults($option));
    }
}

/**
 *Default option value
 * @since  1.0.0
 */
if (!function_exists('organia_defaults')) {
    function organia_defaults($options)
    {
        $default = array(
            'body_font' => array(),
            'heading_font' => array(),
            'header_layout' => '1',
            'show_login' => '',
            'show_header_cta' => '',
        );

        if (!empty($default[$options])) {
            return $default[$options];
        }
    }
}

/* * ---------------------------------------------------------------
* Get Author Avater URL
* -------------------------------------------------------------* */
function organia_get_author_avater_url($userid, $w = 'full', $h = '')
{
    $user_av_ID = get_user_meta($userid, 'user_av_ID', TRUE);
    $email = get_the_author_meta($userid);
    if ($user_av_ID > 0) {
        $img = organia_attachment_url($user_av_ID, $w, $h);
        return $img;
    } else {
        return get_avatar_url($email, array('size' => 170));
    }
}

/*=======================================
/ organia Related Posts
//======================================*/
function organia_related_posts($post_id, $num_of_item = 4)
{
    $post_tags = wp_get_post_tags($post_id, array('fields' => 'ids'));
    $post_cats = wp_get_post_categories($post_id, array('fields' => 'ids'));

    $rels = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $num_of_item,
        'post__not_in' => array($post_id)
    );
    if (!empty($post_tags) || !empty($post_cats)):
        $rels['tax_query'] = array(
            'relation' => 'OR'
        );
    endif;
    if (!empty($post_tags)):
        $rels['tax_query'][] = array(
            'taxonomy' => 'post_tag',
            'field' => 'id',
            'terms' => $post_tags,
            'include_children' => true,
            'operator' => 'IN'
        );
    endif;
    if (!empty($post_cats)):
        $rels['tax_query'][] = array(
            'taxonomy' => 'category',
            'field' => 'id',
            'terms' => $post_cats,
            'include_children' => true,
            'operator' => 'IN'
        );
    endif;

    $rel = new WP_Query($rels);
    if ($rel->have_posts()):
        echo '<div class="relatedPostSlider owl-carousel">';
        while ($rel->have_posts()):
            $rel->the_post();
            ?>
            <div class="blogItem01">
                <div class="blogThumb">
                    <img src="<?php echo organia_post_thumbnail(get_the_ID(), 420, 272); ?>" alt="<?php echo get_the_title(); ?>">
                    <div class="blogDate"><?php echo get_the_time('d M'); ?></div>
                </div>
                <div class="blogContent">
                    <div class="bmeta">
                        <span><i class="twi-calendar-alt1"></i><?php echo esc_html__('By ', 'organia'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>-<span><i class="twi-comment"></i><a
                                    href="<?php echo get_the_permalink(); ?>"><?php echo comments_number(esc_html__('0 Comment', 'organia'), esc_html__('1 Comment', 'organia'), '% ' . esc_html__('Comments', 'organia')); ?></a></span>
                    </div>
                    <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        echo '</div>';
    else:
        echo '<div class="alert alert-warning" role="alert">
                ' . esc_html__('No post found for display as related post.', 'organia') . '
             </div>';
    endif;
}

/*==============================================================================
/ Site Preloader
/=============================================================================*/
if (!function_exists('organia_preloader_creator')) {
    function organia_preloader_creator()
    {
        $show_preloader = get_theme_mod('show_preloader', 2);
        $proloader      = get_theme_mod('proloader', 0);
        $loader_logo    = get_theme_mod('loader_logo', '');
        $loader_text    = get_theme_mod('loader_text', esc_html__('ORGANIA', 'organia'));

        $preHTML = '';
        if ($show_preloader == 1) {
            switch ($proloader) {
                case 0:
                    ?>
                    <div class="preloader clock text-center">
                        <div class="organiaLoader">
                            <div class="loaderO">
                                <?php
                                $words  = str_split($loader_text);
                                $i      = 1;
                                foreach ($words as $key => $value) {
                                    echo ' <span>'.$value.'</span> ';
                                }
                                $i++;
                                ?>
                            </div>
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                 width="471.000000pt" height="474.000000pt" viewBox="0 0 471.000000 474.000000"
                                 preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,474.000000) scale(0.100000,-0.100000)" stroke="none">
                                <path d="M2313 4728 c2 -15 -118 -25 -309 -27 -74 -1 -124 -6 -147 -16 -20 -8
                                -50 -15 -67 -15 -42 0 -138 -30 -245 -75 -52 -23 -108 -42 -170 -60 -74 -21
                                -162 -62 -185 -85 -9 -9 -65 -46 -80 -53 -8 -4 -28 -16 -45 -26 -16 -11 -52
                                -32 -80 -46 -125 -68 -197 -125 -366 -294 -303 -304 -406 -438 -462 -601 -9
                                -25 -21 -99 -27 -165 -27 -284 -26 -279 -93 -525 -47 -170 -45 -567 2 -740 29
                                -107 44 -157 57 -192 54 -145 74 -208 74 -230 0 -16 7 -34 51 -133 10 -22 43
                                -70 73 -105 50 -58 71 -92 91 -140 6 -16 16 -33 58 -97 15 -24 27 -46 27 -50
                                0 -20 48 -100 79 -132 94 -95 213 -201 267 -236 32 -21 78 -51 102 -67 24 -15
                                45 -28 48 -28 3 0 17 -9 32 -19 47 -33 226 -147 254 -162 15 -8 62 -32 105
                                -53 43 -22 98 -52 124 -67 141 -82 240 -128 349 -160 168 -49 185 -54 370 -91
                                85 -17 365 -17 450 0 91 19 170 41 203 58 16 8 34 14 40 14 11 0 124 51 157
                                71 8 5 38 20 65 34 28 15 66 35 85 47 19 11 55 31 80 45 62 33 80 44 120 74
                                19 14 60 36 90 48 80 34 163 71 180 81 8 5 38 21 65 35 48 24 77 41 99 58 163
                                120 214 162 279 230 93 96 145 163 181 232 15 28 32 59 39 70 15 25 99 138
                                107 145 4 3 27 35 52 72 46 67 69 113 103 198 9 25 23 59 30 76 8 18 17 49 20
                                70 4 22 11 53 16 69 4 17 11 42 14 58 3 15 12 27 20 27 13 0 15 23 15 140 0
                                112 -3 140 -14 140 -19 0 -26 54 -25 220 0 158 9 226 27 222 9 -1 12 23 12 83
                                0 62 -3 84 -12 83 -8 -2 -15 17 -21 52 -14 96 -42 191 -82 285 -63 146 -172
                                367 -200 409 -14 21 -25 41 -25 45 0 5 -6 14 -13 20 -8 6 -19 29 -26 51 -7 23
                                -19 44 -27 47 -8 3 -14 11 -14 18 0 7 -7 18 -15 25 -9 7 -27 36 -41 64 -59
                                117 -111 191 -196 276 -105 105 -212 206 -288 270 -36 30 -67 58 -70 61 -22
                                25 -307 187 -332 188 -9 1 -29 7 -45 15 -35 18 -92 39 -163 59 -30 9 -77 23
                                -103 32 -26 8 -58 15 -71 15 -12 0 -45 7 -72 15 -27 8 -117 18 -199 22 -111 6
                                -149 11 -148 21 2 9 -27 12 -117 12 -91 0 -119 -3 -117 -12z m-305 -65 c38
                                -10 5 -23 -60 -23 -54 0 -75 11 -45 23 18 8 78 8 105 0z m682 -13 c0 -13 -40
                                -13 -60 0 -11 7 -5 10 23 10 20 0 37 -4 37 -10z m265 -30 c28 -7 83 -26 123
                                -41 158 -63 228 -91 257 -104 17 -7 50 -20 75 -30 25 -9 58 -23 73 -31 16 -8
                                34 -14 41 -14 40 0 193 -126 454 -375 112 -107 244 -305 204 -305 -5 0 -30 30
                                -57 68 -86 116 -349 376 -410 403 -11 5 -47 25 -80 44 -33 19 -97 54 -143 77
                                -86 45 -107 56 -157 88 -84 53 -268 136 -365 166 -30 9 -75 22 -100 30 -25 8
                                -59 14 -77 14 -40 0 -91 19 -76 28 16 10 179 -2 238 -18z m-1085 10 c0 -5 -12
                                -12 -27 -15 -16 -3 -41 -10 -58 -16 -16 -6 -43 -14 -60 -19 -28 -8 -50 -15
                                -127 -41 -54 -18 -77 -22 -95 -15 -15 6 -15 8 -3 16 8 6 24 10 36 10 11 0 25
                                5 32 12 13 13 72 36 122 48 19 4 46 12 60 18 32 14 120 15 120 2z m598 -26
                                c13 -4 21 -11 19 -17 -2 -6 -64 -10 -162 -9 -88 0 -165 -4 -171 -9 -15 -12
                                -157 -24 -180 -15 -35 13 7 26 87 26 41 0 79 4 85 9 15 16 274 27 322 15z
                                m-575 -71 c-13 -2 -33 -2 -45 0 -13 2 -3 4 22 4 25 0 35 -2 23 -4z m-419 -22
                                c7 -11 -17 -21 -49 -21 -12 0 -28 -7 -35 -15 -7 -8 -22 -15 -34 -15 -11 0 -30
                                -7 -40 -15 -11 -8 -30 -15 -42 -15 -12 0 -24 -5 -26 -11 -2 -6 -13 -9 -23 -6
                                -19 5 -19 5 3 12 12 4 22 11 22 15 0 14 79 50 109 50 16 0 34 7 41 15 14 16
                                65 21 74 6z m1356 -10 c117 -23 209 -48 224 -59 6 -5 24 -12 39 -16 31 -7 27
                                -26 -5 -26 -25 0 -119 26 -166 46 -18 8 -45 14 -60 14 -15 1 -38 7 -52 15 -14
                                8 -52 14 -87 15 -34 0 -69 3 -79 7 -16 6 -16 7 2 14 32 13 84 10 184 -10z
                                m-980 -20 c22 -7 18 -9 -25 -16 -27 -4 -55 -12 -62 -17 -7 -6 -27 -14 -45 -18
                                -18 -5 -58 -18 -88 -30 -30 -12 -66 -25 -80 -29 -41 -13 -159 -72 -165 -82
                                -10 -15 -45 -10 -45 6 0 8 7 15 15 15 8 0 15 5 15 10 0 6 10 15 23 21 12 5 31
                                15 42 22 98 61 156 83 275 106 110 22 107 21 140 12z m-420 -61 c0 -6 -8 -14
                                -17 -17 -24 -9 -124 -84 -203 -154 -36 -31 -83 -67 -105 -79 -22 -12 -55 -30
                                -74 -41 -18 -11 -40 -19 -48 -17 -10 2 28 45 100 115 100 97 129 118 209 157
                                91 44 138 56 138 36z m-400 -179 c0 -11 -80 -88 -145 -139 -27 -21 -88 -76
                                -135 -120 -47 -45 -88 -82 -92 -82 -53 0 182 253 272 293 8 4 33 18 55 32 47
                                28 45 28 45 16z m2506 -62 c3 -6 27 -21 53 -33 25 -12 59 -32 75 -46 56 -49
                                136 -131 136 -139 0 -5 7 -12 16 -15 8 -3 12 -11 9 -16 -4 -7 -20 2 -40 22
                                -46 46 -82 78 -135 118 -25 19 -53 42 -63 52 -10 10 -24 18 -32 18 -8 0 -15 4
                                -15 9 0 5 -9 11 -20 14 -11 3 -20 10 -20 16 0 14 27 14 36 0z m-2646 -218 c0
                                -5 -4 -11 -8 -13 -5 -1 -40 -39 -79 -83 -39 -44 -84 -94 -99 -112 -110 -121
                                -210 -257 -264 -358 -6 -11 -19 -33 -30 -50 -11 -16 -24 -41 -30 -54 -6 -14
                                -32 -56 -57 -94 -32 -48 -49 -65 -56 -58 -13 13 16 137 42 186 14 27 67 102
                                81 115 3 3 29 34 59 70 30 36 62 72 70 81 35 36 100 108 165 184 79 92 183
                                195 197 195 5 0 9 -4 9 -9z m3043 -41 c19 0 257 -295 257 -318 0 -5 7 -15 15
                                -22 8 -7 15 -20 15 -30 0 -10 7 -20 15 -24 17 -6 21 -46 5 -46 -6 0 -15 11
                                -20 25 -5 14 -14 25 -20 25 -5 0 -10 6 -10 13 -1 10 -60 89 -163 217 -70 86
                                -135 179 -129 184 3 4 12 0 18 -8 6 -9 14 -16 17 -16z m-3343 6 c0 -8 -6 -21
                                -12 -28 -7 -8 -18 -23 -25 -33 -6 -11 -34 -56 -61 -100 -59 -96 -89 -150 -175
                                -315 -35 -69 -73 -141 -85 -160 -22 -36 -28 -48 -37 -76 -10 -31 -25 -1 -25
                                49 1 171 98 342 339 598 40 44 75 79 77 79 2 0 4 -6 4 -14z m76 -103 c-80
                                -102 -123 -146 -130 -134 -4 6 -1 14 7 17 9 3 18 16 21 30 7 26 119 144 137
                                144 6 0 -10 -26 -35 -57z m3614 -395 c0 -10 -5 -18 -10 -18 -15 0 -23 27 -16
                                47 6 15 8 15 16 3 6 -8 10 -23 10 -32z m31 -69 c3 -13 13 -42 23 -64 23 -50
                                73 -155 85 -175 34 -61 42 -83 34 -91 -13 -13 -80 80 -118 161 -27 58 -55 148
                                -55 176 0 32 23 27 31 -7z m237 -304 c2 -15 10 -34 18 -42 8 -8 14 -26 14 -41
                                0 -15 7 -36 15 -46 16 -21 19 -56 8 -95 -6 -23 -7 -23 -14 -5 -4 10 -8 35 -9
                                54 0 19 -7 44 -15 54 -8 11 -15 33 -15 49 0 15 -7 35 -15 43 -18 19 -20 67 -2
                                62 6 -3 13 -17 15 -33z m-4233 -55 c-5 -15 -10 -19 -17 -12 -5 5 -7 20 -3 32
                                5 15 10 19 17 12 5 -5 7 -20 3 -32z m4110 6 c0 0 16 -21 35 -46 l35 -45 -3
                                -139 c-1 -76 -5 -143 -9 -149 -8 -13 -23 13 -23 42 0 13 -6 47 -14 75 -23 81
                                -44 167 -53 224 -9 50 -9 52 11 46 12 -4 21 -7 21 -8z m-4144 -135 c-8 -22 -9
                                -19 -10 24 0 42 2 46 10 26 6 -15 6 -34 0 -50z m-61 14 c0 -19 -4 -35 -10 -35
                                -11 0 -13 30 -4 54 10 25 14 19 14 -19z m-22 -160 c-3 -64 -8 -118 -11 -121
                                -3 -3 -11 -3 -18 1 -8 6 -9 35 -4 108 7 108 12 127 27 127 7 0 9 -39 6 -115z
                                m4360 -180 c5 -99 7 -188 4 -197 -9 -35 -31 -17 -47 40 -14 45 -15 63 -6 88 6
                                17 11 85 11 151 0 131 8 180 21 128 5 -17 12 -111 17 -210z m-4356 -306 c3
                                -148 -6 -208 -23 -163 -9 23 -11 300 -2 333 6 24 7 24 14 4 4 -12 9 -90 11
                                -174z m-75 14 c-3 -10 -5 -2 -5 17 0 19 2 27 5 18 2 -10 2 -26 0 -35z m4396
                                -29 c14 -59 12 -101 -6 -189 -9 -44 -16 -102 -15 -130 2 -98 -34 -313 -60
                                -360 -48 -87 -234 -306 -248 -292 -4 4 10 41 32 83 21 41 52 101 68 131 47 90
                                67 151 88 268 22 122 43 212 63 265 8 19 16 71 19 115 10 143 40 198 59 109z
                                m116 -97 c1 -79 -18 -89 -33 -19 -11 51 13 156 25 112 4 -14 7 -56 8 -93z
                                m-29 -275 c0 -117 -9 -167 -26 -150 -10 10 -11 261 -1 276 19 29 27 -7 27
                                -126z m-4320 45 c0 -15 7 -44 15 -64 8 -19 15 -45 15 -57 0 -12 7 -32 16 -44
                                9 -13 13 -30 10 -38 -8 -20 -26 -8 -26 17 0 10 -4 19 -9 19 -24 0 -61 169 -46
                                207 5 15 7 15 15 3 6 -8 10 -28 10 -43z m-66 -243 c3 -9 6 -27 6 -41 0 -13 7
                                -31 15 -39 8 -9 15 -25 15 -38 0 -12 7 -31 15 -42 18 -24 20 -67 3 -62 -7 3
                                -14 14 -16 26 -2 11 -10 26 -18 32 -8 7 -14 27 -14 44 0 17 -7 40 -15 50 -8
                                11 -15 35 -15 53 0 35 14 44 24 17z m214 -178 c3 -12 -1 -17 -10 -14 -7 3 -15
                                13 -16 22 -3 12 1 17 10 14 7 -3 15 -13 16 -22z m-6 -148 c61 -69 125 -210 89
                                -196 -16 6 -102 112 -122 150 -19 37 -26 88 -12 88 4 0 24 -19 45 -42z m220
                                -202 c18 -22 57 -69 87 -104 29 -34 51 -65 47 -69 -20 -21 -189 151 -199 203
                                -6 34 28 18 65 -30z m3584 5 c-9 -10 -16 -23 -16 -30 0 -17 -109 -158 -156
                                -202 -42 -39 -230 -181 -254 -192 -27 -12 -55 -32 -63 -44 -8 -13 -37 -18 -37
                                -7 0 4 35 39 78 78 42 39 120 112 172 162 52 50 115 108 140 130 25 21 65 60
                                90 85 25 26 49 44 53 42 5 -3 1 -13 -7 -22z m-3706 -51 c0 -5 5 -10 11 -10 15
                                0 85 -55 134 -105 22 -22 85 -76 140 -120 55 -44 102 -82 105 -86 3 -3 57 -52
                                120 -109 159 -144 154 -139 148 -146 -4 -3 -19 3 -35 14 -42 30 -147 97 -163
                                106 -37 18 -137 83 -190 123 -85 65 -262 238 -275 269 -25 61 -27 74 -11 74 9
                                0 16 -4 16 -10z m2700 -625 c0 -8 -8 -15 -19 -15 -10 0 -24 -7 -31 -15 -7 -8
                                -22 -15 -34 -15 -11 0 -30 -7 -40 -15 -22 -17 -62 -20 -70 -6 -7 10 16 21 44
                                21 9 0 23 7 30 15 7 8 22 15 34 15 11 0 30 7 40 15 25 19 46 19 46 0z m-1795
                                -65 c3 -5 18 -10 33 -10 15 -1 38 -7 52 -15 14 -8 34 -14 44 -15 18 0 115 -45
                                205 -95 24 -14 50 -25 56 -25 7 0 18 -7 25 -15 7 -8 22 -15 34 -15 11 0 30 -7
                                40 -15 11 -8 30 -15 43 -15 13 0 26 -7 29 -15 4 -9 19 -15 39 -15 19 0 37 -5
                                40 -10 12 -19 -28 -23 -79 -7 -28 9 -62 18 -76 21 -14 2 -50 14 -80 26 -30 12
                                -68 25 -85 30 -16 4 -85 36 -153 71 -151 78 -163 85 -171 96 -3 5 -17 14 -31
                                20 l-25 12 27 0 c15 1 30 -3 33 -9z m1355 -83 c-38 -35 -310 -61 -390 -38 -24
                                7 -24 7 9 14 18 4 72 7 120 8 47 0 102 7 121 14 19 7 62 14 95 14 50 1 57 -1
                                45 -12z m310 -27 c12 -7 8 -11 -17 -16 -18 -3 -38 -13 -44 -20 -6 -8 -18 -14
                                -26 -14 -8 0 -27 -6 -41 -14 -26 -13 -61 -29 -139 -63 -21 -9 -46 -20 -55 -24
                                -29 -14 -128 -45 -206 -64 -84 -20 -185 -17 -245 8 -44 19 -41 37 6 37 17 0
                                49 6 72 14 22 8 73 24 113 36 40 13 75 27 78 31 3 5 17 9 32 9 15 1 38 7 52
                                15 14 8 44 14 67 15 23 0 77 7 120 15 43 8 98 15 123 15 25 0 54 7 64 15 23
                                17 26 18 46 5z m-1125 -56 c12 -5 14 -9 4 -14 -15 -10 -41 -1 -33 11 6 11 8
                                11 29 3z m484 -33 c11 -7 4 -11 -25 -17 -21 -4 -53 -13 -71 -21 -47 -19 -172
                                -18 -180 2 -12 33 26 44 147 45 63 0 121 -4 129 -9z"/>
                                </g>
                                </svg>
                        </div>
                    </div>
                    <?php
                    break;
                case 1:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-circus la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 2:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-climbing-dot la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 3:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-clip-rotate la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                case 4:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-clip-rotate-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 5:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-clip-rotate-pulse la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 6:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-newton-cradle la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 7:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-rotate la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                case 8:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-scale-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 9:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-scale-ripple-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 10:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-zig-zag la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 11:
                    $preHTML .= '<div class="preloader text-center"><div class="la-fire la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 12:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-scale la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 13:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-scale-party la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 14:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-scale-pulse-out la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 15:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-spin-clockwise-fade-rotating la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 16:
                    $preHTML .= '<div class="preloader text-center"><div class="la-square-jelly-box la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 17:
                    $preHTML .= '<div class="preloader text-center"><div class="la-square-spin la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                case 18:
                    $preHTML .= '<div class="preloader text-center"><div class="loader-inner sk-folding-cube">
                                    <div class="sk-cube1 sk-cube"></div>
                                    <div class="sk-cube2 sk-cube"></div>
                                    <div class="sk-cube4 sk-cube"></div>
                                    <div class="sk-cube3 sk-cube"></div>
                                </div></div>';
                    break;
                case 19:
                    $preHTML .= '<div class="preloader text-center"><div class="la-pacman la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 20:
                    $preHTML .= '<div class="preloader text-center"><div class="la-timer la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                case 21:
                    ?>
                    <div class="preloader clock text-center">
                        <div class="organiaLoader loLogo">
                            <?php if (!empty($loader_logo)): ?>
                            <img src="<?php echo esc_url($loader_logo); ?>" alt="<?php echo esc_attr($loader_text); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    break;
                default:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-scale-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;

            }
        }

        echo organia_kses($preHTML);
    }
}


function organia_get_date_format()
{
    $date_format = get_option('date_format');
    if ($date_format != ''):
        return $date_format;
    else:
        return 'd M';
    endif;
}

function organia_post_thumbnail($postID = null, $w = '', $h = '', $crop = TRUE)
{
    $src = ($w == 'full' ? 'http://via.placeholder.com/1920x1080' : 'http://via.placeholder.com/' . $w . 'x' . $h);
    if (has_post_thumbnail($postID)) {
        $src = get_the_post_thumbnail_url($postID, 'full');
        $attachment_id = get_post_thumbnail_id($postID);

        if ($w == 'full') {
            return $src;
        }
        if (defined('FW')) {
            $fw_resize = FW_Resize::getInstance();
            $response = $fw_resize->process($attachment_id, $w, $h, $crop);

            return (!is_wp_error($response) && !empty($response['src'])) ? $response['src'] : $src;
        } else {
            $response = wp_get_attachment_image_src($attachment_id, array($w, $h));
            if (isset($response[0]) && !empty($response[0])) {
                return $response[0];
            }
            return $src;
        }
    }
    return $src;
}

function organia_attachment_url($attachmentID = null, $w = '', $h = '', $crop = TRUE)
{
    $src = ($w == 'full' ? 'http://via.placeholder.com/1920x1080' : 'http://via.placeholder.com/' . $w . 'x' . $h);
    if ($attachmentID != '') {
        $src = wp_get_attachment_image_src($attachmentID, 'full');

        if ($w == 'full') {
            return $src[0];
        }
        if (defined('FW')) {
            $fw_resize = FW_Resize::getInstance();
            $response = $fw_resize->process($attachmentID, $w, $h, $crop);

            return (!is_wp_error($response) && !empty($response['src'])) ? $response['src'] : $src[0];
        } else {
            $response = wp_get_attachment_image_src($attachmentID, array($w, $h));
            if (isset($response[0]) && !empty($response[0])) {
                return $response[0];
            }
            return $src[0];
        }
    }
    return $src;
}

/*=======================================
/ Product Flash Function
//======================================*/
function organia_product_flash_notice_label()
{
    global $product;
    $productId = $product->get_id();
    if ($product->is_type('grouped')) {
        return;
    }

    $total_sales = get_post_meta($product->get_id(), 'total_sales', TRUE);
    $_stock = get_post_meta($product->get_id(), '_stock', TRUE);
    $_low_stock_amount = get_post_meta($product->get_id(), '_low_stock_amount', TRUE);
    $_stock_status = get_post_meta($product->get_id(), '_stock_status', TRUE);

    $is_fresh = (defined('FW') ? fw_get_db_post_option($productId, '_is_fresh', 2) : 2);


    $html = '<div class="prLabels">';
    if ($is_fresh == 1):
        $html .= '<p class="justin">' . esc_html__('Fresh', 'organia') . '</p><div class="clearfix"></div>';
    endif;

    if ($product->is_type('variable')):
        $percentages = array(0);
        $prices = $product->get_variation_prices();
        foreach ($prices['price'] as $key => $price):
            if ($prices['regular_price'][$key] !== $price):
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            endif;
        endforeach;
        if (array_sum($percentages) > 0):
            $html .= '<p class="off">-' . max($percentages) . '% '.esc_html__('off', 'organia').'</p><div class="clearfix"></div>';
        endif;
    elseif ($product->is_on_sale() && !$product->is_type('variable')):
        $regular_price = (float)$product->get_regular_price();
        $sale_price = (float)$product->get_sale_price();

        $html .= '<p class="off">-' . round(100 - ($sale_price / $regular_price * 100)) . '% '.esc_html__('off', 'organia').'</p><div class="clearfix"></div>';
    endif;

    if ($product->is_featured()):
        $html .= '<p class="featured">' . esc_html__('Featured', 'organia') . '</p><div class="clearfix"></div>';
    endif;

    if ($_stock != '' && $_low_stock_amount != '' && $_stock <= $_low_stock_amount):
        if ($_stock > 0):
            $html .= '<p class="limitedstock">' . esc_html__('Limited Stock', 'organia') . '</p><div class="clearfix"></div>';
        else:
            $html .= '<p class="outofstock">' . esc_html__('Out of Stock', 'organia') . '</p><div class="clearfix"></div>';
        endif;
    elseif (($_stock == 0 || $_stock == '') && $_stock_status == 'outofstock'):
        $html .= '<p class="outofstock">' . esc_html__('Out of Stock', 'organia') . '</p><div class="clearfix"></div>';
    endif;
    $html .= '</div>';

    return $html;
}

function organia_breadcrumbs($style = 1)
{
    // Set variables for later use
    $home_link = esc_url(home_url('/'));
    $home_text = organia_kses('<i class="twi-home"></i>', 'organia') . esc_html__('Home', 'organia');
    $link_before = '';
    $link_after = '';
    $link_attr = ' rel="v:url" property="v:title"';
    $link = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $delimiter = ('<i class="twi-angle-right"></i>');              // Delimiter between crumbs
    $before = ''; // Tag before the current crumb
    $after = '';                // Tag after the current crumb
    $page_addon = '';                       // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links = '';

    /**
     * Set our own $wp_the_query variable. Do not use the global variable version due to
     * reliability
     */
    $wp_the_query = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if (is_singular()) {
        /**
         * Set our own $post variable. Do not use the global variable version due to
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post($queried_object);

        // Set variables 
        $title = apply_filters('the_title', $post_object->post_title);
        $title = (strlen($title) > 30 && is_single() ? substr($title, 0, 30) . '...' : $title);
        $parent = $post_object->post_parent;
        $post_type = $post_object->post_type;
        $post_id = $post_object->ID;
        $post_link = $before . $title . $after;
        $parent_string = '';
        $post_type_link = '';

        if (0 !== $parent) {
            $parent_links = [];
            while ($parent) {
                $post_parent = get_post($parent);

                $parent_links[] = sprintf($link, esc_url(get_permalink($post_parent->ID)), get_the_title($post_parent->ID));

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse($parent_links);

            $parent_string = implode($delimiter, $parent_links);
        }

        // Lets build the breadcrumb trail
        if ($parent_string) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ($post_type_link)
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ($category_links)
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if (is_archive()) {
        if ((is_category() || is_tag() || is_tax()) && !is_search()) {
            // Set the variables for this section
            $term_object = get_term($queried_object);
            $taxonomy = $term_object->taxonomy;
            $term_id = $term_object->term_id;
            $term_name = $term_object->name;
            $term_parent = $term_object->parent;
            $taxonomy_object = get_taxonomy($taxonomy);
            $current_term_link = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
            $parent_term_string = '';

            if (0 !== $term_parent) {
                // Get all the current term ancestors
                $parent_term_links = [];
                while ($term_parent) {
                    $term = get_term($term_parent, $taxonomy);

                    $parent_term_links[] = sprintf($link, esc_url(get_term_link($term)), $term->name);

                    $term_parent = $term->parent;
                }

                $parent_term_links = array_reverse($parent_term_links);
                $parent_term_string = implode($delimiter, $parent_term_links);
            }

            if ($parent_term_string) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif (is_author()) {

            $breadcrumb_trail = esc_html__('Author: ', 'organia') . $before . $queried_object->data->display_name . $after;

        } elseif (is_date()) {
            // Set default variables
            $year = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ($monthnum) {
                $date_time = DateTime::createFromFormat('!m', $monthnum);
                $month_name = $date_time->format('F');
            }

            if (is_year()) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif (is_month()) {

                $year_link = sprintf($link, esc_url(get_year_link($year)), $year);

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif (is_day()) {

                $year_link = sprintf($link, esc_url(get_year_link($year)), $year);
                $month_link = sprintf($link, esc_url(get_month_link($year, $monthnum)), $month_name);

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif (is_post_type_archive()) {

            $post_type = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object($post_type);

            if ($post_type == 'product'):
                $breadcrumb_trail = $before . esc_html__('Shop', 'organia') . $after;
            else:
                $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;
            endif;

        }
    }

    // Handle the search page
    if (is_search()) {
        $breadcrumb_trail = esc_html__('Search for: ', 'organia') . $before . get_search_query() . $after;
    }

    // Handle 404's
    if (is_404()) {
        $breadcrumb_trail = $before . esc_html__('Error 404', 'organia') . $after;
    }

    // Handle paged pages
    if (is_paged()) {
        $current_page = get_query_var('paged') ? get_query_var('paged') : get_query_var('page');
        $page_addon = $before . sprintf(__('<i class="twi-angle-right"></i> Page %s', 'organia'), number_format_i18n($current_page)) . $after;
    }

    $breadcrumb_output_link = '';
    //$breadcrumb_output_link .= '<div class="breadcrumb">';
    if (is_home() || is_front_page()) {
        // Do not show breadcrumbs on page one of home and frontpage
        if (is_paged()) {
            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $page_addon;
        } elseif (!is_front_page() && is_home()) {
            $blog_page = get_option('page_for_posts', true);
            if ($blog_page > 0) {
                $breadcrumb_trail = $before . get_the_title($blog_page) . $after;
            } else {
                $breadcrumb_trail = $before . esc_html__('Blog', 'organia') . $after;
            }

            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $delimiter;
            $breadcrumb_output_link .= $breadcrumb_trail;
            $breadcrumb_output_link .= $page_addon;
        } elseif (is_front_page() && is_home()) {
            $breadcrumb_trail = $before . esc_html__('Blog', 'organia') . $after;

            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $delimiter;
            $breadcrumb_output_link .= $breadcrumb_trail;
            $breadcrumb_output_link .= $page_addon;
        }
    } else {
        $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }

    return '<p class="breadcrumbs">' . $breadcrumb_output_link . '</p>';
}

function organia_kses($raw)
{

    $allowed_tags = array(
        'a' => array(
            'class' => array(),
            'href' => array(),
            'rel' => array(),
            'title' => array(),
            'target' => array(),
        ),
        'option' => array(
            'value' => array(),
        ),
        'abbr' => array(
            'title' => array(),
        ),
        'b' => array(),
        'blockquote' => array(
            'cite' => array(),
        ),
        'cite' => array(
            'title' => array(),
        ),
        'code' => array(),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'dl' => array(),
        'dt' => array(),
        'em' => array(),
        'h1' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'i' => array(
            'class' => array(),
        ),
        'img' => array(
            'alt' => array(),
            'class' => array(),
            'height' => array(),
            'src' => array(),
            'width' => array(),
        ),
        'li' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'iframe' => array(
            'width' => array(),
            'height' => array(),
            'scrolling' => array(),
            'frameborder' => array(),
            'allow' => array(),
            'src' => array(),
        ),
        'strike' => array(),
        'br' => array(),
        'strong' => array(),
        'data-wow-duration' => array(),
        'data-wow-delay' => array(),
        'data-wallpaper-options' => array(),
        'data-stellar-background-ratio' => array(),
        'ul' => array(
            'class' => array(),
        ),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }
    return $allowed;
}


/*
* Retrive categories array for elementor options
*/
function organia_category_array($taxonomy = 'category', $label = 'All Category', $order = 'DESC', $order_by = 'ID', $hideEmpty = 1, $field = 'id')
{
    $category_args = array(
        'orderby' => $order_by,
        'order' => $order,
        'hide_empty' => $hideEmpty,
        'hierarchical' => 1,
        'taxonomy' => $taxonomy
    );
    $categories = get_categories($category_args);
    $catsArray = array('0' => esc_html($label));
    if (is_array($categories) && count($categories) > 0 && $field == 'id') {
        foreach ($categories as $cat) {
            $catsArray[$cat->term_id] = $cat->name;
        }
    } else {
        foreach ($categories as $cat) {
            $catsArray[$cat->slug] = $cat->name;
        }
    }

    return $catsArray;
}

/*
* Retrive Post Type array for elementor options
*/
function organia_post_array($postType = 'post', $label = 'All Post', $order = 'DESC', $order_by = 'ID')
{
    $post_args = array(
        'post_type' => $postType,
        'post_status' => 'publish',
        'orderby' => $order_by,
        'order' => $order,
        'posts_per_page' => -1
    );
    $allPosts = new WP_Query($post_args);
    $posts_array = array('0' => esc_html($label));
    if ($allPosts->have_posts()):
        while ($allPosts->have_posts()):
            $allPosts->the_post();
            $posts_array[get_the_ID()] = get_the_title();
        endwhile;
    endif;

    return $posts_array;
}

/**
 * Easy Mailchimp
 */
function organia_easy_mailchimp()
{
    $lists = array();
    if (function_exists('yikes_easy_mailchimp_extender_get_form_interface')):
        $interface = yikes_easy_mailchimp_extender_get_form_interface();
        $all_forms = $interface->get_all_forms();
        if (!empty($all_forms)) {
            $lists['0'] = esc_html__('None', 'organia');
            foreach ($all_forms as $id => $form) {
                $lists[$id] = esc_html($form['form_name']);
            }
        } else {
            $lists['0'] = esc_html__('None', 'organia');
        }
    else:
        $lists['0'] = esc_html__('None', 'organia');
    endif;
    return $lists;
}

function organia_check($number)
{
    if ($number % 2 == 0) {
        return "even";
    } else {
        return "odd";
    }
}

/**
 * Global Popup
 */
function organia_popup_style()
{

    $enable_popup = get_theme_mod('enable_popup', 2);
    $site_popup_style = get_theme_mod('site_popup_style', 1);
    $popup_image = get_theme_mod('popup_image', 'https://via.placeholder.com/414x505.jpg');
    $popup_bg_image = get_theme_mod('popup_bg_image', 'https://via.placeholder.com/800x430.jpg');
    $popup_titles = get_theme_mod('popup_titles', esc_html__('50% OFF', 'organia'));
    $popup_sub_titles = get_theme_mod('popup_sub_titles', esc_html__('Don’t want to miss anything?', 'organia'));
    $popup_content = get_theme_mod('popup_content', esc_html__('Garcia, a versatil web designer. Phasellus vehicula the justo eg diam in posuere phasellus eget sem', 'organia'));
    $select_mail = get_theme_mod('select_mail', 0);
    $link_url = get_theme_mod('link_url', '#');
    $para = str_replace(['{', '}'], ['<a target="_blank" href="' . esc_url($link_url) . '">', '</a>'], $popup_content);

    if ($enable_popup == 1):
        if ($site_popup_style == 2):
            ?>
            <div class="common_popup popup02">
                <div class="popupInner">
                    <a class="colse_popup" href="javascript:void(0)"><i class="twi-times2"></i></a>
                    <div class="popup_middle">
                        <div class="popup_area" style="background-image: url('<?php echo esc_url($popup_bg_image); ?>')">
                            <div class="popup_subscribe">
                                <?php if ($popup_titles != ''): ?>
                                    <h3><?php echo organia_kses($popup_titles); ?></h3>
                                <?php endif; ?>
                                <?php if ($popup_sub_titles != ''): ?>
                                    <span><?php echo organia_kses($popup_sub_titles); ?></span>
                                <?php endif; ?>
                                <?php
                                if ($select_mail > 0) {
                                    echo '<div class="subscribe_form">';
                                    echo do_shortcode('[yikes-mailchimp form="' . $select_mail . '"]');
                                    echo '</div>';
                                }
                                ?>
                                <?php if ($para != ''): ?>
                                    <p><?php echo organia_kses($para); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="common_popup">
                <div class="popupInner">
                    <div class="popup_middle">
                        <div class="cus container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="popup_area">
                                        <a class="colse_popup" href="javascript:void(0)"><i class="twi-times1"></i></a>
                                        <div class="popup_thumb">
                                            <img src="<?php echo esc_url($popup_image); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                        </div>
                                        <div class="popup_subscribe">
                                            <?php if ($popup_titles != ''): ?>
                                                <h2><?php echo organia_kses($popup_titles); ?></h2>
                                            <?php endif; ?>
                                            <?php if ($popup_sub_titles != ''): ?>
                                                <h4><?php echo organia_kses($popup_sub_titles); ?></h4>
                                            <?php endif; ?>
                                            <?php if ($para != ''): ?>
                                                <p><?php echo organia_kses($para); ?></p>
                                            <?php endif; ?>
                                            <?php
                                            if ($select_mail > 0) {
                                                echo '<div class="subscribe_form">';
                                                echo do_shortcode('[yikes-mailchimp form="' . $select_mail . '"]');
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endif;
    endif;
}

function organia_shop_category_dropdown($taxonomy = '', $taxomony_id = 0)
{
    $shop_is_category_dropdown = get_theme_mod('shop_is_category_dropdown', true);
    $shop_categories = get_theme_mod('shop_categories', []);
    $shop_dropdown_label = get_theme_mod('shop_dropdown_label', esc_html('Categories', 'organia'));

    if (!empty($taxonomy) && $taxomony_id > 0):
        if ($taxonomy == 'product_cat'):
            $shop_cats_is_category_dropdown = fw_get_db_term_option($taxomony_id, 'product_cat', 'shop_cats_is_category_dropdown', 1);
            $shop_cats_dropdown_label = fw_get_db_term_option($taxomony_id, 'product_cat', 'shop_cats_dropdown_label', esc_html__('Categories', 'organia'));
            $shop_cats_categories = fw_get_db_term_option($taxomony_id, 'product_cat', 'shop_cats_categories', []);

            $shop_is_category_dropdown = ($shop_cats_is_category_dropdown > 0 ? $shop_cats_is_category_dropdown : $shop_is_category_dropdown);
            $shop_categories = (!empty($shop_cats_categories) ? $shop_cats_categories : $shop_categories);
            $shop_dropdown_label = (!empty($shop_cats_dropdown_label) ? $shop_cats_dropdown_label : $shop_dropdown_label);
        elseif ($taxonomy == 'product_tag'):
            $shop_cats_is_category_dropdown = fw_get_db_term_option($taxomony_id, 'product_tag', 'shop_tags_is_category_dropdown', 1);
            $shop_cats_dropdown_label = fw_get_db_term_option($taxomony_id, 'product_tag', 'shop_tags_dropdown_label', esc_html__('Categories', 'organia'));
            $shop_cats_categories = fw_get_db_term_option($taxomony_id, 'product_tag', 'shop_tags_categories', []);

            $shop_is_category_dropdown = ($shop_cats_is_category_dropdown > 0 ? $shop_cats_is_category_dropdown : $shop_is_category_dropdown);
            $shop_categories = (!empty($shop_cats_categories) ? $shop_cats_categories : $shop_categories);
            $shop_dropdown_label = (!empty($shop_cats_dropdown_label) ? $shop_cats_dropdown_label : $shop_dropdown_label);
        endif;
    endif;

    $html = '';
    if ($shop_is_category_dropdown && !empty($shop_categories)):
        $html .= '<div class="filterBy select-area">';
        $html .= '<select name="orderby" class="browseCategory">';
        $html .= '<option data-termurl="#" value="">' . esc_html($shop_dropdown_label) . '</option>';
        foreach ($shop_categories as $scat):
            $cat_id = (isset($scat['cat_id']) && $scat['cat_id'] > 0 ? $scat['cat_id'] : 0);
            if ($cat_id > 0):
                $term = get_term($cat_id, 'product_cat');
                $html .= '<option data-termurl="' . get_category_link($term->term_id) . '" vlaue="' . $term->term_id . '">' . $term->name . '</option>';
            endif;
        endforeach;
        $html .= '</select>';
        $html .= '</div>';
    endif;

    return $html;
}

function get_totalcount_product()
{
    $count_posts = wp_count_posts('product');
    if (isset($count_posts->publish)) {
        return $count_posts->publish;
    }
    return '';

}
