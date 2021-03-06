<?php
/**
 * List layout of logos
 *
 * @package Logo Carousel Pro
 */

$outline .= '<div class="sp-logo-carousel-pro-section layout-' . $layout . ' sp-lcpro-id-' . $post_id . ' sp-logo-section-id-' . $custom_id . ' sp-lcpro-clear">';
if ( 'true' == $tooltip ) {
	$outline .= '<div class="sp-lcp-tooltip-conf" ' . $lcp_tooltip_option . '></div>';
}
if ( 'true' == $section_title ) {

	$outline .= '<h2 class="sp-logo-carousel-pro-section-title" style="';
	if ( 'true' == $section_title_font_load ) {
		$outline .= 'font-family:' . $title_typography_family . '; ' . $this->lcpro_the_font_variants( $title_typography['variant'] ) . '';
	}
	$outline .= 'font-size:' . $title_typography_size . 'px; line-height:' . $title_typography_height . 'px; text-transform:' . $title_typography_transform . '; text-align:' . $title_typography_alignment . '; letter-spacing:' . $title_typography_spacing . '; color:' . $title_typography_color . '; margin-bottom: ' . $section_title_margin_bottom . 'px; ">' . get_the_title( $post_id ) . '</h2>';
}
if ( 'true' == $preloader ) {
	require_once( SP_LOGO_CAROUSEL_PRO_PATH . 'public/views/layout/preloader.php' );
}

$outline .= '<div id="sp-logo-carousel-pro' . $custom_id . '" class="sp-logo-carousel-pro-area' . $preloader_class . ' list-container ' . ( 'true' == $tooltip ? 'splcp-ttip' : '' ) . '">';

if ( $page_que->have_posts() ) {
	while ( $page_que->have_posts() ) :
		$page_que->the_post();

		$logo_link_data = get_post_meta( get_the_ID(), 'sp_lcp_logo_link_option', true );
		$logo_link      = ( isset( $logo_link_data['lcp_logo_link']['link'] ) ? $logo_link_data['lcp_logo_link']['link'] : '' );
		$logo_ref       = ( isset( $logo_link_data['lcp_logo_link']['ref'] ) && true == $logo_link_data['lcp_logo_link']['ref'] ? 'true' : 'false' );
		$the_image_title_attr = '  title="' . the_title_attribute( array( 'echo' => false ) ) . '"';
		$image_title_attr     = 'true' == $show_image_title_attr ? $the_image_title_attr : '';
		if ( has_post_thumbnail() ) {
			$lcp_thumb            = get_post_thumbnail_id();
			$lcp_img_url          = wp_get_attachment_url( $lcp_thumb );
			$logo_image_alt       = get_post_meta( $lcp_thumb, '_wp_attachment_image_alt', true );
			$logo_image_alt_title = ! empty( $logo_image_alt ) ? $logo_image_alt : get_the_title();
			if ( ! empty( $lcp_img_url ) && ! empty( $width ) && ! empty( $height ) ) {
				$logo_image     = sp_resize( $lcp_img_url, $width . 'px', $height, $crop );
			} else {
				$logo_image = '';
			}
		}

		if ( 'description_limit' == $description_type && 'true' == $description ) {
			$trim_content   = get_the_content();
			$words_limit    = $description_words_limit;
			$count          = str_word_count( $trim_content );
			$short_content = wp_trim_words( $trim_content, $words_limit, '' );
			if ( $count >= $words_limit && 'true' == $description_read_more && 'true' == $link ) {
				$read_more_content = '';
				if ( 'popup' == $link_type ) {
					$read_more_content .= '<div class="sp-lcpro-readmore-area">';
					$read_more_content .= '<a href="#" data-remodal-target="sp-lcpro-logo-id-' . get_the_ID() . '" class="sp-lcpro-readmore">';
					$read_more_content .= $description_read_more_text;
				} elseif ( 'external_link' == $link_type && ! empty( $logo_link ) ) {
					$read_more_content .= '<div class="sp-lcpro-readmore-area">';
					$read_more_content .= '<a target="' . $target . '" href="' . esc_url( $logo_link ) . '" class="sp-lcpro-readmore" ';
					if ( 'true' == $logo_ref ) {
						$read_more_content .= 'rel="nofollow"';
					}
					$read_more_content .= '>';
					$read_more_content .= $description_read_more_text;
				}
				if ( 'popup' == $link_type || 'external_link' == $link_type && ! empty( $logo_link ) ) {
					$read_more_content .= '</a>';
					$read_more_content .= '</div>';
				}
			} else {
				$read_more_content = '';
			}
		} else {
			$short_content     = get_the_content();
			$read_more_content = '';
		}

		$outline .= '<div role="tabpanel" tabindex="0" class="sp-lcp-item sp-lcpro-clear sp-lcp-item-border">';

		if ( 'left' == $list_style ) {
			$outline .= '<div class="list-logo-area">';
			if ( 'true' == $link && 'popup' == $link_type ) {
				$outline .= '<a href="#" data-remodal-target="sp-lcpro-logo-id-' . get_the_ID() . '" ' . $image_title_attr . ' >';
			} elseif ( ! empty( $logo_link ) && 'true' == $link ) {
				$outline .= '<a target="' . $target . '" href="' . esc_url( $logo_link ) . '" ' . $image_title_attr . ' ';
				if ( 'true' == $logo_ref ) {
					$outline .= 'rel="nofollow"';
				}
				$outline .= '>';
			}
			if ( has_post_thumbnail() ) {
				if ( $logo_image ) {
					$outline .= '<img src="' . $logo_image . '" alt="' . $logo_image_alt_title . '"';
				} else {
					$outline .= '<img src="' . $lcp_img_url . '" alt="' . $logo_image_alt_title . '"';
				}
				if ( 'true' == $tooltip ) {
					$outline .= 'class="sp-lcp-tooltip" title="' . get_the_title() . '"';
				}
				$outline .= '>';
			}
			if ( 'true' == $link && 'popup' == $link_type || ! empty( $logo_link ) && 'true' == $link ) {
				$outline .= '</a>';
			}
			$outline .= '</div>';

			$outline .= '<div class="list-content-area">';
			if ( get_the_title() && true == $title ) {
				$outline .= '<div class="list-title logo-title">' . get_the_title() . '</div>';
			}
			if ( get_the_content() && true == $description ) {
				$outline .= '<div class="list-description">' . $short_content . '</div>';
				$outline .= $read_more_content;
			}
			$outline .= '</div>';
		} elseif ( 'center' == $list_style ) {
			$outline .= '<div class="list-logo-area-center text-center">';
			if ( 'true' == $link && 'popup' == $link_type ) {
				$outline .= '<a href="#" data-remodal-target="sp-lcpro-logo-id-' . get_the_ID() . '" ' . $image_title_attr . ' >';
			} elseif ( ! empty( $logo_link ) && 'true' == $link ) {
				$outline .= '<a target="' . $target . '" href="' . esc_url( $logo_link ) . '" ' . $image_title_attr . ' ';
				if ( 'true' == $logo_ref ) {
					$outline .= 'rel="nofollow"';
				}
				$outline .= '>';
			}
			if ( has_post_thumbnail() ) {
				if ( $logo_image ) {
					$outline .= '<img src="' . $logo_image . '" alt="' . $logo_image_alt_title . '"';
				} else {
					$outline .= '<img src="' . $lcp_img_url . '" alt="' . $logo_image_alt_title . '"';
				}
				if ( 'true' == $tooltip ) {
					$outline .= 'class="sp-lcp-tooltip" title="' . get_the_title() . '"';
				}
				$outline .= '>';
			}
			if ( 'true' == $link && 'popup' == $link_type || ! empty( $logo_link ) && 'true' == $link ) {
				$outline .= '</a>';
			}
			$outline .= '</div>';

			$outline .= '<div class="list-content-area-center text-center">';
			if ( get_the_title() && true == $title ) {
				$outline .= '<div class="list-title logo-title">' . get_the_title() . '</div>';
			}
			if ( get_the_content() && true == $description ) {
				$outline .= '<div class="list-description">' . $short_content . '</div>';
				$outline .= $read_more_content;
			}
			$outline .= '</div>';
		} elseif ( 'right' == $list_style ) {

			$outline .= '<div class="list-content-area text-right">';
			if ( get_the_title() && true == $title ) {
				$outline .= '<div class="list-title logo-title">' . get_the_title() . '</div>';
			}
			if ( get_the_content() && true == $description ) {
				$outline .= '<div class="list-description">' . $short_content . '</div>';
				$outline .= $read_more_content;
			}
			$outline .= '</div>';
			$outline .= '<div class="list-logo-area">';
			if ( 'true' == $link && 'popup' == $link_type ) {
				$outline .= '<a href="#" data-remodal-target="sp-lcpro-logo-id-' . get_the_ID() . '" ' . $image_title_attr . ' >';
			} elseif ( ! empty( $logo_link ) && 'true' == $link ) {
				$outline .= '<a target="' . $target . '" href="' . esc_url( $logo_link ) . '" ' . $image_title_attr . ' ';
				if ( 'true' == $logo_ref ) {
					$outline .= 'rel="nofollow"';
				}
				$outline .= '>';
			}
			if ( has_post_thumbnail() ) {
				if ( $logo_image ) {
					$outline .= '<img src="' . $logo_image . '" alt="' . $logo_image_alt_title . '"';
				} else {
					$outline .= '<img src="' . $lcp_img_url . '" alt="' . $logo_image_alt_title . '"';
				}
				if ( 'true' == $tooltip ) {
					$outline .= 'class="sp-lcp-tooltip" title="' . get_the_title() . '"';
				}
				$outline .= '>';
			}
			if ( 'true' == $link && 'popup' == $link_type || ! empty( $logo_link ) && 'true' == $link ) {
				$outline .= '</a>';
			}

			$outline .= '</div>';
		}
		$outline .= '</div>'; // sp-lcp-item.
		if ( 'true' == $link && 'popup' == $link_type ) {
			if ( file_exists( SP_LOGO_CAROUSEL_PRO_PATH . 'public/views/layout/popup.php' ) ) {
				require( SP_LOGO_CAROUSEL_PRO_PATH . 'public/views/layout/popup.php' );
			}
		}
	endwhile;

	wp_reset_postdata();
	// Custom query loop pagination.
	$outline .= '<div class="lcp-col-lg-1 sp-lcpro-clear">';
	if ( $page_que->max_num_pages > 1 ) {
		$big   = 999999999; // need an unlikely integer.
		$items = paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'prev_next' => true,
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $page_que->max_num_pages,
			'type'      => 'array',
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
		) );

		$pagination = "<ul class=\"lcp-pagination\">\n\t<li>";
		$pagination .= join( "</li>\n\t<li>", $items );
		$pagination .= "</li>\n</ul>\n";

		$outline .= $pagination;
	}
	$outline .= '</div>';

} else {
	$outline .= '<h2 class="sp-not-found-any-logo">' . esc_html__( 'No logos found', 'logo-carousel-pro' ) . '</h2>';
}

$outline .= '</div>';
$outline .= '</div>';
