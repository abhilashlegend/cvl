jQuery(document).ready(function ($) {

	"use strict"
	ig_es_register_campaign_rules_js_events_handler();

});

function ig_es_register_campaign_rules_js_events_handler( conditions_elem ) {
	if ( 'undefined' === typeof conditions_elem ) {
		conditions_elem = jQuery('.ig-es-conditions');
	}
	jQuery.each(jQuery(conditions_elem), function () {
		var _self = jQuery(this),
			conditions = _self.find('.ig-es-conditions-wrap'),
			groups = _self.find('.ig-es-condition-group'),
			cond = _self.find('.ig-es-condition');

		groups.eq(0).appendTo(_self.find('.ig-es-condition-container'));

		_self
			.on('click', '.add-condition', function () {
				ig_es_add_and_condtion();
			})
			.on('click', '.add-or-condition', function () {
				var cont = jQuery(this).parent(),
					id = cont.find('.ig-es-condition').last().data('id'),
					clone = cond.eq(0).clone();

				clone.removeAttr('id').appendTo(cont).data('id', ++id);
				jQuery.each(clone.find('input, select'), function () {
					var _this = jQuery(this),
						name = _this.attr('name');
					_this.attr('name', name.replace(/\[\d+\]\[\d+\]/, '[' + cont.data('id') + '][' + id + ']')).prop('disabled', false);
					if( jQuery(_this).hasClass('ig-es-campaign-rule-form-multiselect') ) {
						jQuery(_this).ig_es_select2();
					}
					if( jQuery(_this).hasClass('condition-field')) {
						ig_es_handle_list_condition();
					}
				});
				clone.find('.condition-field').val('').focus();
				cond = _self.find('.ig-es-condition');
			});

			jQuery('.remove-conditions').on('click', function () {
				if (confirm(ig_es_rules_data.i18n.remove_conditions)) {
					jQuery(conditions).empty();
					jQuery('.ig-es-conditions-render-wrapper').empty();
					jQuery(document).trigger('ig_es_update_contacts_counts',[{condition_elem:_self}]);
				}
				return false;
			});
		conditions
			.on('click', '.remove-condition', function () {
				var c = jQuery(this).parent();
				if (c.parent().find('.ig-es-condition').length == 1) {
					c = c.parent();
				}
				c.slideUp(100, function () {
					jQuery(this).remove();
					ig_es_handle_list_condition();
					jQuery(document).trigger('ig_es_update_contacts_counts',[{condition_elem:_self}]);
				});
			})
			.on('change', '.condition-field', function (event) {

				var condition = jQuery(this).closest('.ig-es-condition'),
					field = jQuery(this),
					operator_field, value_field;
				ig_es_show_operator_and_value_field(field);
				jQuery(document).trigger('ig_es_update_contacts_counts',[{condition_elem:_self}]);
			})
			.on('change', '.condition-operator', function () {
				jQuery(document).trigger('ig_es_update_contacts_counts',[{condition_elem:_self}]);
			})
			.on('change', '.condition-value', function () {
				jQuery(document).trigger('ig_es_update_contacts_counts',[{condition_elem:_self}]);
			})
			.on('click', '.ig-es-condition-add-multiselect', function () {
				jQuery(this).parent().clone().insertAfter(jQuery(this).parent()).find('.condition-value').select().focus();
				return false;
			})
			.on('click', '.ig-es-condition-remove-multiselect', function () {
				jQuery(this).parent().remove();
				jQuery(document).trigger('ig_es_update_contacts_counts',[{condition_elem:_self}]);
				return false;
			})
			.on('change', '.ig-es-conditions-value-field-multiselect > .condition-value', function () {
				if (0 == jQuery(this).val() && jQuery(this).parent().parent().find('.condition-value').size() > 1) jQuery(this).parent().remove();
			})
			.find('.condition-field').prop('disabled', false).trigger('change');

		jQuery(document).trigger('ig_es_update_contacts_counts',[{condition_elem:_self}]);

		// Add one list condition if there are no conditions.
		if( 0 === jQuery(_self).find('.ig-es-conditions-wrap .ig-es-condition-group').length ) {
			ig_es_add_default_list_condition();
		} else {
			jQuery(_self).find('.ig-es-conditions-wrap .ig-es-condition-group .condition-value').each(function(){
				if( jQuery(this).hasClass('ig-es-campaign-rule-form-multiselect') ) {
					jQuery(this).ig_es_select2();
				}
			});
		}

		function ig_es_add_and_condtion( condition_data ) {
			let id = groups.length,
					clone = groups.eq(0).clone();

			clone.removeAttr('id').appendTo(conditions).data('id', id).show();
			jQuery.each(clone.find('input, select'), function () {
				let _this = jQuery(this);
					name = _this.attr('name');
				_this.attr('name', name.replace(/\[\d+\]/, '[' + id + ']')).prop('disabled', false);
				
				if( jQuery(_this).hasClass('ig-es-campaign-rule-form-multiselect') ) {
					jQuery(_this).ig_es_select2();
				}
			});

			if ( 'undefined' === typeof condition_data ) {
				condition_data = {
					condition: '',
				}
			}
			let condition_value = condition_data.condition;
			let condition_field = clone.find('.condition-field');
			jQuery(condition_field).val(condition_value).focus();
			if ( '' !== condition_value ) {
				ig_es_show_operator_and_value_field(condition_field);
			}
			groups = _self.find('.ig-es-condition-group');
			cond = _self.find('.ig-es-condition');
			ig_es_handle_list_condition();
		}

		function ig_es_handle_list_condition( selected_elem ) {
			if ( ig_es_rules_data.is_pro ) {
				return;
			}
			var condition_fields = jQuery('.ig-es-conditions-wrap .condition-field');
			var list_rule_count = 0;
			jQuery(condition_fields).each(function(){
				var selected_rule = jQuery(this).val();
				if ( '_lists__in' === selected_rule ) {
					list_rule_count++;
				}
			});
			var hide_list_rule = list_rule_count > 0;
			var campaign_rules = jQuery('.ig-es-conditions-wrap .condition-field');
			jQuery(campaign_rules).each(function(index,elem){
				var list_rule_option = jQuery(this).find('option[value = "_lists__in"]');
				var list_rule_text   = jQuery(list_rule_option).text();
				list_rule_text       = list_rule_text.replace(' [PRO]','');
				if ( 'undefined' !== typeof selected_elem ) {
					if( hide_list_rule && ! ( jQuery(selected_elem)[0] === elem ) ) {
						list_rule_text += ' [PRO]';
						jQuery(list_rule_option).prop("selected", false).attr('disabled','disabled');
					} else {
						jQuery(list_rule_option).removeAttr('disabled');
					}
				} else {
					if( index > 0 && hide_list_rule ) {
						list_rule_text += ' [PRO]';
						jQuery(list_rule_option).prop("selected", false).attr('disabled','disabled');
					} else {
						jQuery(list_rule_option).removeAttr('disabled');
					}
				}
				jQuery(list_rule_option).text(list_rule_text);
			});
		}

		function ig_es_add_default_list_condition() {
			ig_es_add_and_condtion({ condition: '_lists__in' });
		}

		function ig_es_show_operator_and_value_field( field ) {

			var condition = jQuery(field).closest('.ig-es-condition'),
					operator_field, value_field;

			condition.find('div.ig-es-conditions-value-field').removeClass('active').find('.condition-value').prop('disabled', true);
			condition.find('div.ig-es-conditions-operator-field').removeClass('active').find('.condition-operator').prop('disabled', true);

			value_field = condition.find('div.ig-es-conditions-value-field[data-fields*=",' + jQuery(field).val() + ',"]').addClass('active').find('.condition-value').prop('disabled', false);
			operator_field = condition.find('div.ig-es-conditions-operator-field[data-fields*=",' + jQuery(field).val() + ',"]').addClass('active').find('.condition-operator').prop('disabled', false);

			if (!value_field.length) {
				value_field = condition.find('div.ig-es-conditions-value-field-default').addClass('active').find('.condition-value').prop('disabled', false);
			}
			if (!operator_field.length) {
				operator_field = condition.find('div.ig-es-conditions-operator-field-default').addClass('active').find('.condition-operator').prop('disabled', false);
			}

			if ( jQuery(field).hasClass('condition-field') ) {
				ig_es_handle_list_condition(field);
			}
		}
	});
}