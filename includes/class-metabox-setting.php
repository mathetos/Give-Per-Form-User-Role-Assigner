<?php
// Exit if access directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Example code to show how to add metabox tab to give form data settingd.
 *
 * @package     Give
 * @subpackage  Classes/Give_Metabox_Setting_Fields
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
class Give_Metabox_Setting_Fields {

	/**
	 * Give_Metabox_Setting_Fields constructor.
	 */
	function __construct() {
		$this->id     = 'user-role-fields';
		$this->prefix = '_give_';

		add_filter( 'give_metabox_form_data_settings', array( $this, 'setup_setting' ), 999 );
	}

	function setup_setting( $settings ) {

		$screen = get_current_screen();

		// Custom metabox settings.
		$settings["{$this->id}_custom"] = array(
			'id'        => "{$this->id}_custom",
			'title'     => __( 'User Role', 'give' ),
			'icon-html' => '<span class="dashicons dashicons-groups"></span>',
			'fields'    => array(
				array(
					'id'       => "{$this->id}_user_role",
					'name'     => __( 'Donor Assigned User Role', 'give' ),
					'type'     => 'datepicker',
					'desc'     => __( 'This is the user role that your donors will be assign if you select to support registration in the "<a href="' . $screen . '#form_display_options">Form Display</a>" tab.', 'give' ),
					// Give metabox api by default call give_*field_type* function,
					// You can override that function call by passing callback array key.
					'callback' => array( $this, 'user_role_field' ),
				),
			),
		);

		return $settings;
	}


	/**
	 * Donor Assigned User Role field.
	 *
	 * @access public
	 *
	 * @param $field
	 */
	function user_role_field( $field ) {
		global $thepostid;

		$field['value'] = give_get_field_value( $field, $thepostid );

		echo '<p class="give-field-wrap ' . esc_attr( $field['id'] ) . '_field"><label for="' . give_get_field_name( $field ) . '">' . wp_kses_post( $field['name'] ) . '</label>'; ?>

            <select id="<?php echo give_get_field_name( $field )?>" name="<?php echo give_get_field_name( $field )?>">
                <?php
                    foreach (get_editable_roles() as $role_name => $role_info):
                        echo '<option value="' . $role_name . '" ' . selected( $field['value'], $role_name ) . '>' . $role_info['name'] . '</option>';
                   endforeach; ?>
            </select>

            <?php
            if ( ! empty( $field['description'] ) ) {
                echo '<span class="give-field-description">' . wp_kses_post( $field['description'] ) . '</span>';
            }
            echo '</p>';
	}
}

new Give_Metabox_Setting_Fields();