<?php
/**
 * The template for displaying contact us.
 *
 *
 * @package understrap
 */

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="main_content" role="main">


	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="page-title">Share a Triumph</h1>
					<p>
						Did the Sights for Hope or one of its predecessors affect your life or the life of someone special in a meaningful way? We would like to hear about it, and we may share your story with others. Please take a moment and complete the form below.
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
						<?php

$error_message = [];
$aria_state = [];
$success = false;
$_SESSION['form_submit'] = null;

$name = $city = $state = $zip = $phone = $email = $story_about_you = $someones_name = $story = $photo = $story_date = $permission = ""; 

$aria_state['name'] = 'false';
$aria_state['city'] = 'false';
$aria_state['state'] = 'false';
$aria_state['zip'] = 'false';
$aria_state['phone'] = 'false';
$aria_state['email'] = 'false';
$aria_state['is_this_story_about_you'] = 'false';
$aria_state['story'] = 'false';

if(isset($_POST['bmg_submit']) && empty($_SESSION['form_submit'])) {


	if ( !function_exists('wp_handle_upload') ) {
	require_once(ABSPATH . "wp-admin" . '/includes/image.php');	
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	}

	$name = $_POST['uname'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$story_about_you = $_POST['is_this_story_about_you'];
	$someones_name = $_POST['if_it_is_about_someone_else_what_is_their_name'];
	$story = $_POST['describe_your_story'];
	$file = $_FILES['photo'];
	$photo =  wp_handle_upload( $file, array('test_form' => false) );
	$story_date = $_POST['story_date'];
	$permission = $_POST['permission'];

	if(empty($name)) {
		$error_message['name'] = 'Please enter your name'; 
		$aria_state['name'] = 'true';
	}

	if(empty($city)) {
		$error_message['city'] = 'Please enter your city';
		$aria_state['city'] =  'true';
	}

	if(empty($state)) {
		$error_message['state'] = 'Please enter your state';
		$aria_state['state'] =  'true';
	}

	if(empty($zip)) {
		$error_message['zip'] = 'Please enter your zip code';
		$aria_state['zip'] =  'true';	
	}

	if(empty($phone)) {
		$error_message['phone'] = 'Please enter your phone number';
		$aria_state['phone'] =  'true';	
	}

	if(empty($email)) {
		$error_message['email'] = 'Please enter your email address';
		$aria_state['email'] =  'true';	
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
			$error_message['email'] = 'Please enter a valid email address';
			$aria_state['email'] = 'true';
	}

	if(empty($story_about_you)) {
		$error_message['story_about_you'] = 'Please select yes if story is about you';
		$aria_state['story_about_you'] =  'true';	
	}

	if(empty($story)) {
		$error_message['story'] = 'Please describe story';
		$aria_state['story'] =  'true';	
	}


	if(count($error_message) == 0 && !get_transient( 'token_' . $token_id )) {
			$success = true;
			set_transient( 'token_' . $token_id, 'dummy-content', 60 );
			$toadmin = get_option( 'admin_email' );
			$mail_subject = 'New triumph submission done by ' . $name;
			$body = "<table>
								<tr>
								 	<th>Name</th>
								 	<td>" . $name . "</td>
								 </tr>
								 <tr>
									<th> Email </th>
									<td>" . $email . "</td>
							  	  </tr>
							  	  <tr>
								 	<th> Story </th>
								 	<td>" . $story . "</td>
								 </tr>
							  </table>
							  ";
			$headers = array('Content-Type: text/html; charset=UTF-8');
			 
			$admin_mail = wp_mail( $toadmin, $mail_subject, $body, $headers );
			$post_title = 'Trimuph By ' . $name; 	

			$new_post = array(
				'post_title' => $post_title,
				'post_status'   => 'pending',          
				'post_type'     => 'triumph_form', 
				);
			

			$pid = wp_insert_post($new_post);

			$attachment = array(
		        'post_mime_type' => $photo['type'],
		        'post_title' => preg_replace('/\.[^.]+$/', '', basename( $photo['file'] ) ),
		        'post_content' => '',
		        'post_author' => '',
		        'post_status' => 'inherit',
		        'post_type' => 'attachment',
		        'post_parent' => $pid,
		        'guid' => $photo['file']
		    );

			$attach_id = wp_insert_attachment($attachment, $photo['file']);
			$attach_data = wp_generate_attachment_metadata( $attach_id, $photo['file'] );

			add_post_meta($pid, 'name', $name, true);
			add_post_meta($pid, 'city', $city, true);
			add_post_meta($pid, 'state', $state, true);
			add_post_meta($pid, 'zip_code', $zip, true);
			add_post_meta($pid, 'phone', $phone, true);
			add_post_meta($pid, 'email', $email, true);
			add_post_meta($pid, 'is_this_story_about_you', $story_about_you, true);
			add_post_meta($pid, 'if_it_is_about_someone_else_what_is_their_name', $someones_name, true);
			add_post_meta($pid, 'describe_your_story', $story, true);
			update_field('photo', $attach_id, $pid);
			// update the attachment metadata
 wp_update_attachment_metadata( $attach_id,  $attach_data );
 
			add_post_meta($pid, 'story_date', $story_date, true);
			add_post_meta($pid, 'permission', $permission, true);

			if($admin_mail == false) {
				$mail_error = "Failed to send your message. Please try later or contact the administrator by another method.";
			}
			$_SESSION['form_submit'] = 'true';			  
		} else {
			$_SESSION['form_submit'] = NULL;
		}

	}	

	$token_id = md5( uniqid( "", true ) );
	if($success && $admin_mail) {
			$output = '<div class="alert alert-success alert-dismissible fade show" role="alert">
	  				Thank you! we will soon contact you.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>';
		$name = $city = $state = $zip = $phone = $email = $story_about_you = $someones_name = $story = $photo = $story_date = $permission = ""; 
	}

	$output .= '<div role="form" class="triumph-frm mb-3">
				<form method="post" action="" enctype="multipart/form-data" novalidate>
					<div class="form-group">
						<label class="" for="uname">Your Name: (required)</label>
						<input type="text" name="uname" id="uname" aria-required="true" aria-invalid="' . $aria_state['name'] . '" aria-describedby="name-error" placeholder="Name *" value="' . $name . '" class="form-control sqr-field" />';

						if($error_message['name']) {
							$output .= '<span role="alert" class="input-error" id="name-error">' . $error_message['name'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="name-error"></span>';	
						}

				$output .=	'</div>

				<div class="form-group">
						<label class="" for="city">Your City: (required)</label>
						<input type="text" name="city" id="city" aria-required="true" aria-invalid="' . $aria_state['city'] . '" aria-describedby="city-error" placeholder="City *" value="' . $city . '" class="form-control sqr-field" />';

						if($error_message['city']) {
							$output .= '<span role="alert" class="input-error" id="city-error">' . $error_message['city'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="city-error"></span>';
						}

				$output .=	'</div>

				<div class="form-group">
						<label class="" for="state">Your State: (required)</label>
						<input type="text" name="state" id="state" aria-required="true" aria-invalid="' . $aria_state['state'] . '" aria-describedby="state-error" placeholder="State *" value="' . $state . '" class="form-control sqr-field" />';

						if($error_message['state']) {
							$output .= '<span role="alert" class="input-error" id="state-error">' . $error_message['state'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="state-error"></span>';
						}

				$output .=	'</div>

				<div class="form-group">
						<label class="" for="zip">Your Zip Code: (required)</label>
						<input type="text" name="zip" id="zip" aria-required="true" aria-invalid="' . $aria_state['zip'] . '" aria-describedby="zip-error" placeholder="Zip Code *" value="' . $zip . '" class="form-control sqr-field" />';

						if($error_message['zip']) {
							$output .= '<span role="alert" class="input-error" id="zip-error">' . $error_message['zip'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="zip-error"></span>';
						}

				$output .=	'</div>

				<div class="form-group">
						<label class="" for="phone">Your Phone Number: (required)</label>
						<input type="text" name="phone" id="phone" aria-required="true" aria-invalid="' . $aria_state['phone'] . '" aria-describedby="phone-error" placeholder="Phone Number *" value="' . $phone . '" class="form-control sqr-field" />';

						if($error_message['phone']) {
							$output .= '<span role="alert" class="input-error" id="phone-error">' . $error_message['phone'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="phone-error"></span>';
						}

				$output .=	'</div>

				<div class="form-group">
						<label class="" for="email">Your Email Address: (required)</label>
						<input type="email" name="email" id="email" aria-required="true" aria-invalid="' . $aria_state['email'] . '" aria-describedby="email-error" placeholder="Email *" value="' . $email . '" class="form-control sqr-field" />';

						if($error_message['email']) {
							$output .= '<span role="alert" class="input-error" id="email-error">' . $error_message['email'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="email-error"></span>';
						}

				$output .=	'</div>


				<div class="form-group">
						<label class="" for="is_this_story_about_you">Is this story about you? (required)</label><br />';

						if($story_about_you == "yes") {
							$option_selected =  'checked'; 
						} else {
							$option_selected =  ''; 
						}
						$output .= '<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="is_this_story_about_you" id="is_this_story_about_you_opt_1" value="yes"' . $option_selected . '>
						  <label class="form-check-label" for="is_this_story_about_you_opt_1">
						    Yes
						  </label>
						</div>';

						if($story_about_you == "no") {
							$option_selected =  'checked'; 
						} else {
							$option_selected =  ''; 
						}
						$output .= '<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="is_this_story_about_you" id="is_this_story_about_you_opt_2" value="no"' . $option_selected . '>
						  <label class="form-check-label" for="is_this_story_about_you_opt_2">
						    No
						  </label>
						</div><div>';

						

						if($error_message['story_about_you']) {
							$output .= '<span role="alert" class="input-error" id="email-error">' . $error_message['story_about_you'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="email-error"></span>';
						}

				$output .=	'</div></div>

				<div class="form-group">
						<label class="" for="if_it_is_about_someone_else_what_is_their_name">If it is about someone else, what is their name?: </label>
						<input type="text" name="if_it_is_about_someone_else_what_is_their_name" id="if_it_is_about_someone_else_what_is_their_name"  placeholder=" " value="' . $someones_name . '" class="form-control sqr-field" />';
				$output .=	'</div>

				<div class="form-group">
						<label for="describe_your_story">Describe your story : (required)</label>
						<textarea name="describe_your_story" rows="10" id="describe_your_story" aria-invalid="' . $aria_state['story'] . '" placeholder="Describe your story *" class="form-control sqr-field">' . $story . '</textarea>';
						if($error_message['story']) {
							$output .= '<span role="alert" class="input-error" id="story-error">' . $error_message['story'] . '</span>';
						} else {
							$output .= '<span role="alert" class="" id="story-error"></span>';
						}

					$output .= '</div>

				<div class="form-group">
						<p>Do you have a photo to share? </p>
						<div class="custom-file">
						  <input type="file" name="photo" class="custom-file-input" id="photo">
						  <label class="custom-file-label" for="photo">Choose file</label>
						</div>
						<small id="" class="form-text text-muted">
 Allowed formats include .jpg, .gif, and .png.
</small>
						';

						

					$output .= '</div>	


				<div class="form-group">
						<label class="" for="story_date">When did this story take place ?</label>
						<input type="date" name="story_date" id="story_date" placeholder="" value="' . $story_date . '" class="form-control sqr-field" />';
				$output .=	'</div>	


				<div class="form-group">';
					if($permission == "1") {
							$option_selected =  'checked'; 
						} else {
							$option_selected =  ''; 
						}


					$output .=	'<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="permission" name="permission" ' . $option_selected . '>
					      <label class="form-check-label" for="permission">
					        I give permission to the Sights for Hope to share my story with others on its website, in email promotions, in other materials, and on other platforms.
					      </label>
						</div>';

					$output .= '</div>	

				<div class="form-group mb-0 mt-5">
					 <input type="hidden" name="token" value="' . $token_id . '" />
						<input type="submit" name="bmg_submit" value="Submit" class="form-btn btn">
					</div>';
						if($mail_error) {
							$output .= '<div role="alert" class="bmg-forms-mail-error">' . $mail_error . '</div>';
						}
					
				$output .= '</form>
	';

	echo $output;

?>
				</div>
				<div class="col-sm-6">

				</div>
			</div>
			

	</div>
</div>
&nbsp;

<?php get_footer();