<?php
/**
 * The template for displaying services page
 *
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper pt-0 service-page" id="main_content" role="main">
	<div class="services-banner">
			
	</div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-sm-7">
				<h1 class="services-block-header mb-3">Client Eligibility</h1>
				<p>
					Whether vision loss is gradual or sudden, it is cause for great stress and anxiety, often leading to physical, emotional, and social concerns. The Sights for Hope does not look at vison loss as a tragic event. Rather, the agency assumes there are solutions to be found to solve problems related to vison loss using a team approach. The agency's program and services are designed to help a person with vision loss accept, adjust, cope and reaffirm living with vision loss. 
				</p>
				<p class="mb-0">
					The level of visual acuity is used to determine whether an individual qualifies to become a customer of the Sights for Hope. These guidelines, listed below, are established by the Pennsylvania Bureau of Blindness and Visual Services (BBVS):
					<ul class="guidelines mb-0">
						<li>A visual acuity of 20/70 or worse in the better eye with best correction</li>
						<li>A visual field of 20 degrees or worse</li>
						<li>Visual functioning level indicating the equivalence of an acuity of 20/70 or worse</li>
					</ul>

				</p>
				<p>
					Call 610.433.6018 in Lehigh and Northampton Counties or 570.992.7787 in Monroe County to contact a caseworker. We will ask for your permission to contact your eye doctor to obtain the results of your eye examination done within the last year. There are no financial guidelines for client eligibility. 
				</p>

				
			</div>
			<div class="col-sm-5">
				<img class="people-working-img" src="<?php echo get_stylesheet_directory_uri();?>/img/people-working.png" alt="" />
			</div>
		</div>
	</div> <!-- End of container -->

	<div class="client-services-block">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-sm-12">
					<h1>Client Services</h1>

					<p class="mt-3">
						Caseworkers assess the needs of the client in their home and work with them to develop a personalized plan to help them adjust to living with vision loss. This may include in-home assistance to write checks to pay bills or make the kitchen safer by putting raised dots on stove controls to mark gradations of temperature. Clients may also be referred to the PA Bureau of Blindness & Visual Services for orientation and mobility training and rehabilitation training with certified professionals.
					</p>

					<p>
						Clients are also encouraged to take advantage of lifeskills education programs on various topics such as home safety, dressing appropriately or learning to cook which are offered to provide training to enchance independence. They may also chose to join agency-sponsored socialization activities or recreational activities such as bowling, the weekly walking program at the Lehigh Valley Mall, annual fishing trips and picnics or trips to cultural events.
					</p>

					<p>
						Each client receives the Activities Bulletin, the quaterly client newsletter in either large print, audio, digital or Braille formats plus the bulletin can also be accessed on our website. Clients are also encouraged to access the various free services offered by the regional Library for the Blind and Physically Handicapped.
					</p>

				</div>
			</div>
		</div>
	</div> <!-- End of client services block -->

	<div class="client-activity-bulletins">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="services-block-header text-center">Client Activity Bulletins</h1>

				</div>
			</div>

			<div class="row justify-content-sm-center">
				<div class="col-sm-8 offset-sm text-center">
					<p class="mt-2">
						These quarterly bulletin list activities available for our visually impaired clients in the Lehigh Valley and in Monroe County. These activities are held at one of the agency's campuses and locations in the community. Select activities are offered for clients of both our Lehigh Valley and Monroe campuses.
					</p>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col-sm-6 col-lg-3 calendar-cont">
					<div class="calendar-block">
						<div class="month">Jan.- March</div>
						<div class="year">2019</div>
						<div class="bulletins">Bulletins</div>
					</div>

					<ul class="bulletin-files-list">
						<li><a href="#">Lehigh Valley Bulletin (.pdf)</a></li>
						<li><a href="#">Monroe Bulletin (.pdf)</a></li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 calendar-cont">
					<div class="calendar-block">
						<div class="month">Oct.- Dec</div>
						<div class="year">2018</div>
						<div class="bulletins">Bulletins</div>
					</div>

					<ul class="bulletin-files-list">
						<li><a href="#">Lehigh Valley Bulletin (.pdf)</a></li>
						<li><a href="#">Monroe Bulletin (.pdf)</a></li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 calendar-cont">
					<div class="calendar-block">
						<div class="month">July.- Sept</div>
						<div class="year">2018</div>
						<div class="bulletins">Bulletins</div>
					</div>

					<ul class="bulletin-files-list">
						<li><a href="#">Lehigh Valley Bulletin (.pdf)</a></li>
						<li><a href="#">Lehigh Valley Bulletin (.docx)</a></li>
						<li><a href="#">Monroe Bulletin (.pdf)</a></li>
						<li><a href="#">Monroe Bulletin (.docx)</a></li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 calendar-cont">
					<div class="calendar-block">
						<div class="month">April.- June</div>
						<div class="year">2018</div>
						<div class="bulletins">Bulletins</div>
					</div>

					<ul class="bulletin-files-list">
						<li><a href="#">Lehigh Valley Bulletin (.pdf)</a></li>
						<li><a href="#">Monroe County Bulletin (.pdf)</a></li>
						<li><a href="#">Composite Bulletin (.docx)</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- End of client activity bulletins block -->


	<div class="donate-now-banner v-center">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-sm-12">
					<a href="#" class="btn btn-lg donate-lg-btn">Donate Now</a>
					
				</div>
			</div>
		</div>
	</div>

	<div class="transport-tech">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-sm-6 pt-5">
					<img class="mt-5 img-fluid" src="<?php echo get_stylesheet_directory_uri();?>/img/street.png" alt="" />
				</div>
				<div class="col-sm-6">
					<h1 class="services-block-header">Escorted Transportation</h1>	
					<p class="mt-3">Many clients take advantage of our door-through-door escorted transportation service. This service, using a sighted guide, is unique in the Lehigh Valley and Monroe County.
					</p>
					<p>
						Clients are allowed three round trip rides per month to essential medical appointments and grocery shopping. A fee of $3 per one-way trip or $6 for a round trip is charged. Tickets are required and must be purchased in advance and then presented to the driver at the time of pick-up. <br />
						Tickets can be purchased by calling:
					</p>
					<p><strong>Lehigh Valley: 610.433.6018</strong></p>

					<p><strong>Monroe County: 570.992.7787</strong></p>

					<p><strong>All rides must be scheduled at least 7 days in advance.</strong> </p>

					<p>Customers may also be transported to client activities and lifeskills trainings in addition to the three essential transports listed above. The fee also applies to these rides.
					</p>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-sm-7 v-center">
					<div>
					<h1 class="services-block-header">Assistive Technology</h1>
					<p class="mt-3">Assistive technology has opened up the world for individuals who live with visual impairment. Magnifiers of varying strengths from simple hand-held
					devices to sophisticated digital ones and table-top CCTVs (closed circuit televisions) provide a way to read print of all kinds. Computers equipped with JAWS (screen reading software) and ZoomText (text enlargement software) provide easy access to email and the internet. iPhones and iPads with various kinds of apps also are available. The agency provides an indtroduction to many of these devices and also sells various kinds of devices in their Vision Aids stores. Sessions to introduce Braille are also conducted periodically.
					</p>
					</div>	
				</div>
				<div class="col-sm-5">
					<img class="mt-5 img-fluid" src="<?php echo get_stylesheet_directory_uri();?>/img/person-working.png" alt="" />
				</div>	
			</div>
		</div>
	</div>

	<div class="counseling-block mt-4">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="services-block-header">Counseling and Support</h1>
					<p class="mt-3">Adjusting to vision loss is vital. The agency sponsors monthly support group meetings led by James Van Horn, Sr., MS, MA, NOMC, a counselor who is also blind, and encourages all clients to attend to share their feelings and concerns with their peers in a safe environment. These sessions are held on the first Thursday of each month in the Lehigh Valley office and on the first Monday of each month in the Monroe County office. Separate support groups for women and for men are also conducted montly in the Lehigh Valley office.
					</p>	
				</div>
			</div>
		</div>
	</div>

	<div class="facing-vision-loss">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="services-block-header">Facing Vision Loss</h1>
					<p class="mt-3">When a person experiences vision loss, everyone from family to friends to co-workers can benefit from remembering that certain adjustments in behavior and expectations are important. When someone can no longer see as well as before, personal interactions and daily activities must be adjusted to take this new reality into account. We hope that you find the following tips helpful.
					</p>
					<p>
						When offering assistance to a blind or visually impaired person, speak directly to that person. Simply ask, "May I be of help?" When guiding a blind or visually impaired person, don't push him or her ahead of you. Touch the individual's forearm with the back of your hand and allow him or her to take your arm just above the elbow. Walk at a normal pace with the individual a half pace behind. Allow the visually impaired person to stop and locate the edge of a curb or stairs before proceeding. These kinds of technique are called "sighted guide."
					</p>
					<p>
						Identify yourself to the person with vision loss. When meeting a person with vision loss, say “hello” first and identify yourself. Depending on their vision loss, many people can’t see your face and to avoid awkwardness for everyone, simply say “Hi, Aunt Mary, it’s Donna.” Keep in mind that depending on the setting, sometimes there is background noise which may keep the visually impaired person from identifying your voice, so make introductions easier by adding your name. Don’t play guessing games such as “Do you know who I am?”
					</p>
					<p>
					Don’t walk away without telling the person that you are leaving the immediate environment. The person may continue to talk and it will be embarrassing to them if they believe they are talking to the air. It can also be frightening to think that you have been left stranded in a location like the middle of a room with no point of reference as to where you are.
					</p>

					<p>
					Talk directly to the person. Sometimes people unconsciously begin speaking differently to people with physical challenges. Don’t ask Uncle Bob’s daughter what he would like to drink. Speak directly to Uncle Bob!
					</p>

					<p>
					It’s fine to use words like “see, read, and look.” These words are part of normal vocabulary and there is no need to be afraid of using them. It can be very unsettling to try to exchange normal words for what you feel is less offensive.
					</p>

					<p>
					Give clear and specific directions. Saying “your glass is over there,” is not helpful when serving a beverage to a visually impaired person, for example. Rather state, “Your glass is at 11:00.” Using the numbers on the clock as a point of reference is very helpful in establishing a location. Also use terms such as left, right, back and front to help with safe movement.
					</p>
					<p>
					Communicate verbally and avoid relying on nonverbal expressions.
					</p>
					<p>
					It is a challenge for many people to learn how to communicate better with expressive, descriptive, detailed words. People with vision loss may not be able to see you make certain gestures, such as shrugging your shoulders, a surprised look, or tearing up. They may not be able to see the “smile on your face” indicating that you are teasing when you make certain comments.
					</p>
					<p>	
					Don’t move anything around without asking. A simple movement of a chair in a living room, for example, may cause a problem because most visually impaired people use stationary objects as landmarks to navigate around. Personal items, trash cans, kitchen utensils, or even medications moved from one place to another will cause confusion and could make an area or activity unsafe for a visually impaired person. Keep corridors and stairs clear of clutter and don’t leave doors ajar at home, school or work.	
					</p>
				</div>
			</div>
		</div>
	</div>	

	<div class="donate-now-banner v-center">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-sm-12">
					<a href="#" class="btn btn-lg donate-lg-btn">Donate Now</a>
					
				</div>
			</div>
		</div>
	</div>

</div> <!-- End of wrapper -->

<?php get_footer();

