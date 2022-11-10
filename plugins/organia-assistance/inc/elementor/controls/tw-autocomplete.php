<?php

class Tw_Autocomplete extends Elementor\Base_Data_Control
{

    /**
     * Get autocomplete control type.
     *
     * Retrieve the control type, in this case `autocomplete`.
     *
     * @return string Control type.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_type()
    {
        return 'tw_autocomplete';
    }

    /**
     * Enqueue autocomplete one area control scripts and styles.
     *
     * Used to register and enqueue custom scripts and styles used by the autocomplete one
     * area control.
     *
     * @since 1.0.0
     * @access public
     */
    public function enqueue()
    {
        wp_enqueue_script('tw-autocomplete-control', TW_URL . '/inc/elementor/assets/js/tw_autocomplete.js', ['jquery'], '', false);
    }

    /**
     * Get Tw_Autocomplete one area control default settings.
     *
     * Retrieve the default settings of the Tw_Autocomplete one area control. Used to return
     * the default settings while initializing the Tw_Autocomplete one area control.
     *
     * @return array Control default settings.
     * @since 1.0.0
     * @access protected
     *
     */
    protected function get_default_settings()
    {
        return [
            'multiple' => false,
            'taxonomy' => false,
            'post_type' => false,
            'label_block' => true,
            'options' => [],
        ];
    }

    /**
     * Render Tw_Autocomplete one area control output in the editor.
     *
     * Used to generate the control HTML in the editor using Underscore JS
     * template. The variables for the class are available using `data` JS
     * object.
     *
     * @since 1.0.0
     * @access public
     */
    public function content_template()
    {
        $control_uid = $this->get_control_uid();
        ?>
        <div class="elementor-control-field">
            <# if ( data.label ) {#>
            <label for="<?php echo $control_uid; ?>" class="elementor-control-title">{{{ data.label }}}</label>
            <# } #>
            <div class="elementor-control-input-wrapper elementor-control-unit-5">
                <# var multiple = ( data.multiple ) ? 'multiple' : ''; #>
                <select id="<?php echo $control_uid; ?>" class="elementor-select2" type="select2" {{ multiple }} data-setting="{{ data.name }}">
                    <# _.each( data.options, function( option_title, option_value ) {
                    var value = data.controlValue;
                    if ( typeof value == 'string' ) {
                    var selected = ( option_value === value ) ? 'selected' : '';
                    } else if ( null !== value ) {
                    var value = _.values( value );
                    var selected = ( -1 !== value.indexOf( option_value ) ) ? 'selected' : '';
                    }
                    #>
                    <option {{ selected }} value="{{ option_value }}">{{{ option_title }}}</option>
                    <# } ); #>
                </select>
            </div>
        </div>
        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{{ data.description }}}</div>
        <# } #>
        <?php
    }

}