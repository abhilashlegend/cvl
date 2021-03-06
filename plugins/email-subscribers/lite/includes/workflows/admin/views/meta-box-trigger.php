<?php
/**
 * Admin trigger metabox
 *
 * @since       4.4.1
 * @version     1.0
 * @package     Email Subscribers
 */

// Group triggers.
$trigger_list = array();

foreach ( ES_Workflow_Triggers::get_all() as $trigger ) {
	if ( $trigger instanceof ES_Workflow_Trigger ) {
		$trigger_list[ $trigger->get_group() ][ $trigger->get_name() ] = $trigger;
	}
}

if ( ! ES()->is_starter() ) {
	$starter_trigger_list = array(
		'Comment' => array(
			'ig_es_comment_added' => __( 'Comment Added', 'email-subscribers' ),
		),
		'Form'    => array(
			'ig_es_cf7_submitted'              => __( 'Contact Form 7 Submitted', 'email-subscribers' ),
			'ig_es_wpforms_submitted'          => __( 'WP Form Submitted', 'email-subscribers' ),
			'ig_es_ninja_forms_submitted'      => __( 'Ninja Form Submitted', 'email-subscribers' ),
			'ig_es_gravity_forms_submitted'	   => __( 'Gravity Form Submitted', 'email-subscribers' ),
			'ig_es_forminator_forms_submitted' => __( 'Forminator Form Submitted', 'email-subscribers' ),
		),
		'Order'   => array(
			'ig_es_wc_order_completed'    => __( 'WooCommerce Order Completed', 'email-subscribers' ),
			'ig_es_edd_complete_purchase' => __( 'EDD Purchase Completed', 'email-subscribers' ),
			'ig_es_give_donation_made'    => __( 'Give Donation Added', 'email-subscribers' ),
		),
	);

	$trigger_list = array_merge_recursive( $trigger_list, $starter_trigger_list );
}

if ( ! ES()->is_pro() ) {
	$pro_trigger_list = array(
		'Comment' => array(
			'ig_es_wc_product_review_approved' => __( 'New Product Review Posted', 'email-subscribers' ),
		),
		'Order'   => array(
			'ig_es_wc_order_refunded' => __( 'WooCommerce Order Refunded', 'email-subscribers' ),
		),
	);
	$trigger_list = array_merge_recursive( $trigger_list, $pro_trigger_list );
}
?>
<table class="ig-es-table">
	<tr class="ig-es-table__row" data-name="trigger_name" data-type="select"
		data-required="1">
		<td class="ig-es-table__col ig-es-table__col--label">
			<label><?php esc_html_e( 'Trigger', 'email-subscribers' ); ?> <span class="required">*</span></label>
		</td>
		<td class="ig-es-table__col ig-es-table__col--field">
			<select name="ig_es_workflow_data[trigger_name]" class="ig-es-field js-trigger-select" required>
				<option value=""><?php esc_html_e( '[Select]', 'email-subscribers' ); ?></option>
				<?php foreach ( $trigger_list as $trigger_group => $triggers ) : ?>
					<optgroup label="<?php echo esc_attr( $trigger_group ); ?>">
						<?php
						foreach ( $triggers as $trigger_name => $_trigger ) :
							if ( $_trigger instanceof ES_Workflow_Trigger ) :
								?>
								<option value="<?php echo esc_attr( $_trigger->get_name() ); ?>" <?php echo esc_attr( $current_trigger && $current_trigger->get_name() === $trigger_name ? 'selected="selected"' : '' ); ?>><?php echo esc_html( $_trigger->get_title() ); ?></option>
								<?php
							elseif ( is_string( $_trigger ) ) :
								?>
								<option value="<?php echo esc_attr( $trigger_name ); ?>" disabled><?php echo esc_html( $_trigger ); ?></option>
								<?php
							endif;
						endforeach;
						?>
					</optgroup>
				<?php endforeach; ?>
			</select>
			<?php if ( $current_trigger && $current_trigger->get_description() ) : ?>
				<div class="js-trigger-description"><?php echo wp_kses_post( $current_trigger->get_description_html() ); ?></div>
			<?php else : ?>
				<div class="js-trigger-description"></div>
			<?php endif; ?>
		</td>
	</tr>

	<?php

	if ( $workflow ) {
		ES_Workflow_Admin::get_view(
			'trigger-fields',
			array(
				'trigger'     => $current_trigger,
				'workflow'    => $workflow,
				'fill_fields' => true,
			)
		);
	}

	?>
</table>
