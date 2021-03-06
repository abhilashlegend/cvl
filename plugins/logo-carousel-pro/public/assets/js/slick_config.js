jQuery(document).ready(function ($) {

    $('.sp-logo-carousel-pro-area.mode_standard').each(function (index) {
        var _this = $(this);
        var custom_id = _this.attr('id');

        if (_this.data('vertical') == false) {
            switch (_this.data('arrowtype')) {
                case 'chevron_arrow_horizon':
                    var nav_arrow_horizon_one = 'fa fa-chevron-left';
                    var nav_arrow_horizon_two = 'fa fa-chevron-right';
                    break;
                case 'double_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-angle-double-left';
                    nav_arrow_horizon_two = 'fa fa-angle-double-right';
                    break;
                case 'bold_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-arrow-left';
                    nav_arrow_horizon_two = 'fa fa-arrow-right';
                    break;
                case 'long_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-long-arrow-left';
                    nav_arrow_horizon_two = 'fa fa-long-arrow-right';
                    break;
                case 'caret_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-caret-left';
                    nav_arrow_horizon_two = 'fa fa-caret-right';
                    break;
                default:
                    nav_arrow_horizon_one = 'fa fa-angle-left';
                    nav_arrow_horizon_two = 'fa fa-angle-right';
            }
        } else {
            switch (_this.data('arrowtype')) {
                case 'chevron_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-chevron-up';
                    nav_arrow_horizon_two = 'fa fa-chevron-down';
                    break;
                case 'double_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-angle-double-up';
                    nav_arrow_horizon_two = 'fa fa-angle-double-down';
                    break;
                case 'bold_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-arrow-up';
                    nav_arrow_horizon_two = 'fa fa-arrow-down';
                    break;
                case 'long_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-long-arrow-up';
                    nav_arrow_horizon_two = 'fa fa-long-arrow-down';
                    break;
                case 'caret_arrow_horizon':
                    nav_arrow_horizon_one = 'fa fa-caret-up';
                    nav_arrow_horizon_two = 'fa fa-caret-down';
                    break;
                default:
                    nav_arrow_horizon_one = 'fa fa-angle-up';
                    nav_arrow_horizon_two = 'fa fa-angle-down';
            }
        }

        if (_this.data('nav_type') === "nav_text") {
            previousArrow = '<button class="slick-prev" data-role="none" aria-label="Previous slide" role="button"><span>Prev</span></button>';
            nextiousArrow = '<button class="slick-next" data-role="none" aria-label="Next slide" role="button"><span>Next</span></button>';
        } else {
            previousArrow = '<button class="slick-prev" data-role="none" aria-label="Previous slide" role="button"><i class="' + nav_arrow_horizon_one + '"></i></button>';
            nextiousArrow = '<button class="slick-next" data-role="none" aria-label="Next slide" role="button"><i class="' + nav_arrow_horizon_two + '"></i></button>';
        }

        if (custom_id != '') {
            jQuery('#' + custom_id).slick({
                prevArrow: previousArrow,
                nextArrow: nextiousArrow,
                lazyLoad: 'ondemand',
            }); // Slick end

        }
    });

});
