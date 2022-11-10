<?php
if (!defined('ABSPATH')) die('Direct access forbidden.');

class Tw_Users_Meta_Hooks
{
    public function __construct()
    {
        add_action('show_user_profile', array($this, 'tw_user_avater'));
        add_action('edit_user_profile', array($this, 'tw_user_avater'));
        add_action('personal_options_update', array($this, 'tw_user_avatar_src'));
        add_action('edit_user_profile_update', array($this, 'tw_user_avatar_src'));
    }

    public function tw_user_avater($user)
    {
        ?>

        <table class="form-table">
            <tr>
                <th><label>User Avatar</label></th>
                <td>
                    <?php
                    $avater_src = get_the_author_meta('user_avatar', $user->ID);
                    $user_av_ID = get_the_author_meta('user_av_ID', $user->ID);
                    if ($avater_src != '') {
                        $av = $avater_src;
                        $vis = 'block';
                    } else {
                        $av = '';
                        $vis = 'none';
                    }
                    ?>
                    <img class="user_logo upImg" src="<?php echo esc_url($av); ?>" height="100" width="100"
                         style="display: <?php echo esc_attr($vis); ?>;"/>
                    <div class="clear"></div>
                    <input type="text" name="user_avatar" value="<?php echo esc_url($av); ?>"
                           class="regular-text user_avater_url"/>
                    <input type="hidden" name="user_av_ID" value="<?php echo esc_attr($user_av_ID); ?>"
                           id="user_av_ID"/>
                    <a href="#" class="useravatar_upload button">Upload</a>
                </td>
            </tr>
            <?php
                $_user_facebook = get_the_author_meta('_user_facebook', $user->ID);
                $_user_twitter = get_the_author_meta('_user_twitter', $user->ID);
                $_user_instagram = get_the_author_meta('_user_instagram', $user->ID);
                $_user_vimeo = get_the_author_meta('_user_vimeo', $user->ID);
                $_user_linkedin = get_the_author_meta('_user_linkedin', $user->ID);
                $_user_pinterest = get_the_author_meta('_user_pinterest', $user->ID);
                $_user_dribbble = get_the_author_meta('_user_dribbble', $user->ID);
                $_user_behance = get_the_author_meta('_user_behance', $user->ID);
                $_user_youtube = get_the_author_meta('_user_youtube', $user->ID);
            ?>
            <tr>
                <th><label>Facebook</label></th>
                <td>
                    <input type="text" name="_user_facebook" value="<?php echo $_user_facebook; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Twitter</label></th>
                <td>
                    <input type="text" name="_user_twitter" value="<?php echo $_user_twitter; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Instagram</label></th>
                <td>
                    <input type="text" name="_user_instagram" value="<?php echo $_user_instagram; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Vimeo</label></th>
                <td>
                    <input type="text" name="_user_vimeo" value="<?php echo $_user_vimeo; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Linkedin</label></th>
                <td>
                    <input type="text" name="_user_linkedin" value="<?php echo $_user_linkedin; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Pinterest</label></th>
                <td>
                    <input type="text" name="_user_pinterest" value="<?php echo $_user_pinterest; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Dribbble</label></th>
                <td>
                    <input type="text" name="_user_dribbble" value="<?php echo $_user_dribbble; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Behance</label></th>
                <td>
                    <input type="text" name="_user_behance" value="<?php echo $_user_behance; ?>" class="regular-text"/>
                </td>
            </tr>
            <tr>
                <th><label>Youtube</label></th>
                <td>
                    <input type="text" name="_user_youtube" value="<?php echo $_user_youtube; ?>" class="regular-text"/>
                </td>
            </tr>
        </table>
        <?php
    }

    function tw_user_avatar_src($user_id)
    {
        update_user_meta($user_id, 'user_avatar', sanitize_text_field($_POST['user_avatar']));
        update_user_meta($user_id, 'user_av_ID', sanitize_text_field($_POST['user_av_ID']));
        
        update_user_meta($user_id, '_user_facebook', sanitize_text_field($_POST['_user_facebook']));
        update_user_meta($user_id, '_user_twitter', sanitize_text_field($_POST['_user_twitter']));
        update_user_meta($user_id, '_user_instagram', sanitize_text_field($_POST['_user_instagram']));
        update_user_meta($user_id, '_user_vimeo', sanitize_text_field($_POST['_user_vimeo']));
        update_user_meta($user_id, '_user_linkedin', sanitize_text_field($_POST['_user_linkedin']));
        update_user_meta($user_id, '_user_pinterest', sanitize_text_field($_POST['_user_pinterest']));
        update_user_meta($user_id, '_user_dribbble', sanitize_text_field($_POST['_user_dribbble']));
        update_user_meta($user_id, '_user_behance', sanitize_text_field($_POST['_user_behance']));
        update_user_meta($user_id, '_user_youtube', sanitize_text_field($_POST['_user_youtube']));
    }
}

?>