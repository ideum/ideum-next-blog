<?php
 
/*
  Plugin Name: Ideum Contact Form
  Plugin URI: http://ideum.com
  Description: A very simple contact form plugin
  Version: 1.0
  Author: glass C. @ ideum
  Author URI: http://ideum.com
*/

// create function to hold our form
function html_form_code() {
	echo'
  <div class="inquiry-content">
	  <section id="inquiry-form">
	    <form action="/contact/" autocomplete="on" method="post">
	      <div class="full-box">
	        <div class="half-box">
	          <div class="required fname">
	            <label class="medium" for="first-name">First name <span class="required-note">*</span></label>
	            <input class="full-input" type="text" name="firstname" id="firstname" autofocus="" required="" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["firstname"] ) ? esc_attr( $_POST["firstname"] ) : '' ) . '">
	          </div>
	        </div>
	        <div class="half-box">
	          <div class="required lname">
	            <label class="medium" for="last-name">Last name <span class="required-note">*</span></label>
	            <input class="full-input" type="text" name="lastname" id="lastname" required="" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["lastname"] ) ? esc_attr( $_POST["lastname"] ) : '' ) . '">
	          </div>
	        </div>
	      </div>
	      <div class="required email">
	        <label class="medium" for="email">Email <span class="required-note">*</span></label>
	        <input class="full-input" type="email" name="email" id="email" autocomplete="off" required="" value="' . ( isset( $_POST["email"] ) ? esc_attr( $_POST["email"] ) : '' ) . '">
	      </div>
	      <div class="not-required company">
	        <label class="medium" for="company-name">Company Name</label>
	        <input class="full-input" type="text" name="company" id="company" value="' . ( isset( $_POST["company"] ) ? esc_attr( $_POST["company"] ) : '' ) . '">
	      </div>
	      <div class="not-required contact">
	        <fieldset>
	          <div class="dark faux-label fieldset-label">Contact me by phone</div>
	          <div class="half-box">
	            <input class="left-radio" type="radio" name="yes-by-phone" id="contact-by-phone-yes" onclick="javascript:yesnoCheck();" value="yes" ' . ( isset( $_POST["yes-by-phone"] ) ? 'checked' : '' ) . '>
	            <label class="radio-label right-label" for="contact-by-phone-yes">Yes</label>
	          </div>
	          <div class="half-box">            
	            <input class="left-radio" type="radio" name="no-by-phone" id="contact-by-phone-no" onclick="javascript:yesnoCheck();" value="no" ' . ( isset( $_POST["no-by-phone"] ) ? 'checked' : '' ) . '>
	            <label class="radio-label right-label" for="contact-by-phone-no">No</label>
	          </div>
	          <div id="ifphoneYes" style="display:none;">
	            <hr>
	            <div class="full-box">
	              <label class="dark two-thirds-label left-label" for="phonenumber">What phone number is best for reaching you?</label>
	              <input class="third-input right-input" type="tel" name="phonenumber" id="phonenumber" placeholder="Phone" value="' . ( isset( $_POST["phonenumber"] ) ? esc_attr( $_POST["phonenumber"] ) : '' ) . '">
	            </div>
	            <div class="full-box">
	              <label class="dark two-thirds-label left-label" for="phonetime">What time is best for reaching you?</label>
	              <input class="third-input right-input" type="text" name="phonetime" id="phonetime" placeholder="Time" value="' . ( isset( $_POST["phonetime"] ) ? esc_attr( $_POST["phonetime"] ) : '' ) . '">
	            </div>
	          </div>
	        </fieldset>
	      </div>
	      <div class="not-required products">
	        <fieldset>
	          <div class="dark faux-label fieldset-label">Product or service you are interested in? (Select all that apply)</div>
	          <div class="half-box">
	            <input class="left-checkbox" type="checkbox" name="touch-tables" id="check-touch-tables" value="Touch Tables" ' . ( isset( $_POST["touch-tables"] ) ? 'checked' : '' ) . '>
	            <label class="dark check-label right-label" for="check-touch-tables">Touch Tables</label>
	          </div>
	          <div class="half-box">
	            <input class="left-checkbox" type="checkbox" name="cust-software-dev" id="check-cust-software-dev" value="Custom Software Development" ' . ( isset( $_POST["cust-software-dev"] ) ? 'checked' : '' ) . '>
	            <label class="dark check-label right-label" for="check-cust-software-dev">Custom Software Development</label>
	          </div>
	          <div class="half-box">
	            <input class="left-checkbox" type="checkbox" name="touch-walls" id="check-touch-walls" value="Touch Walls" ' . ( isset( $_POST["touch-walls"] ) ? 'checked' : '' ) . '>
	            <label class="dark check-label right-label" for="check-touch-walls">Touch Walls</label>
						</div>
	          <div class="half-box">
	            <input class="left-checkbox" type="checkbox" name="cust-hardware-dev" id="check-cust-hardware-dev" value="Custom Hardware Development" ' . ( isset( $_POST["cust-hardware-dev"] ) ? 'checked' : '' ) . '>
	            <label class="dark check-label right-label" for="check-cust-hardware-dev">Custom Hardware Development</label>
						</div>
	       		<div class="half-box">
	            <input class="left-checkbox" type="checkbox" name="product-rentals" id="check-product-rentals" value="Product Rentals" ' . ( isset( $_POST["product-rentals"] ) ? 'checked' : '' ) . '>
	            <label class="dark check-label right-label" for="check-product-rentals">Product Rentals (US only)</label>
	          </div>
	        </fieldset>
	      </div>
	      <label for="inquiries-comments">Please include your questions and interest in working with us.</label>
	      <textarea name="comments" id="comments" rows="5" cols="60">' . ( isset( $_POST["comments"] ) ? esc_attr( $_POST["comments"] ) : '' ) . '</textarea>
	      <label for="inquiries-howheard">How did you hear about us?</label>
	      <textarea name="howheard" id="howheard" rows="2" cols="60">' . ( isset( $_POST["howheard"] ) ? esc_attr( $_POST["howheard"] ) : '' ) . '</textarea>
	      <p class="required-note">* - Required</p>
	      <p>Form may take up to a minute to process - please do not resubmit.</dip>
	      <p class="submit-wrap"><input class="button dark active" name="form-submitted" type="submit" value="Submit"></p>
	    </form>
	  </section>
	</div>
	';
}

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['form-submitted'] ) ) {

		// set email address
  	$mailto = "sales@ideum.com";

  	// sanitize form values
    $firstname 		= sanitize_text_field( $_POST['firstname'] );
    $lastname 		= sanitize_text_field( $_POST['lastname'] );
    $email 				= sanitize_email( $_POST['email'] );

    $company 			= sanitize_text_field( $_POST['company'] );
    $phonenumber 	= sanitize_text_field( $_POST['phonenumber'] );
    $phonetime 		= sanitize_text_field( $_POST['phonetime'] );
    $comments 		= esc_textarea( $_POST['comments'] );
    $howheard 		= esc_textarea( $_POST['howheard'] );
    $touchtables 	= $_POST['touch-tables'];
    $touchwalls 	= $_POST['touch-walls'];
    $custhwdev 		=	$_POST['cust-hardware-dev'];
    $custswdev 		= $_POST['cust-software-dev'];
    $prodrentals 	= $_POST['product-rentals'];

    $subject 			= "You have a new inquiry from ".$firstname." ".$lastname."";

    $body = "From:\n\n".$firstname." ".$lastname." <".$email.">";

		if (isset($company)) {
		  $body .= "\n\nCompany: ".$company."";
		}

		if (isset($phonenumber)) {
		  $body .= "\n\nPhone: ".$phonenumber."";
		}
		if (isset($phonetime)) {
		  $body .= "\n\nContact preference: ".$phonetime."";
		}

		$body .= "\n\nInterested in: ";

		if (isset($_POST['touch-tables'])) {
		  $body .= "\n".$_POST['touch-tables']."";
		}

		if (isset($_POST['touch-walls'])) {
		  $body .= "\n".$_POST['touch-walls']."";
		}

		if (isset($_POST['cust-hardware-dev'])) {
		  $body .= "\n".$_POST['cust-hardware-dev']."";
		}

		if (isset($_POST['cust-software-dev'])) {
		  $body .= "\n".$_POST['cust-software-dev']."";
		}

		if (isset($_POST['product-rentals'])) {
		  $body .= "\n".$_POST['product-rentals']."";
		}
		  
		if (isset($_POST['howheard'])) {
		  $body .= "\n\nHow Heard: ".$_POST['howheard']."";
		}

		if (isset($_POST['comments'])) {
		  $body .= "\n\nComments:\n ".$_POST['comments']."";
		}

		$body .= "\r";

		// if email processed, display success message
		if ( wp_mail( $mailto, $subject, $body ) ) {
			echo '<a name="message"></a><div style="background: #006600; color: #fff; font-weight: bold; padding: 10px 2px; margin: 2px 0 20px; text-align: center;">';
      echo '<p>Thanks for contacting us!.<br>';
      echo 'We will be in touch with you shortly.</p>';
      echo '</div>';
      header( "refresh:4;url=http://ideum.com/contact" ) or die(""); 
      exit();
		} else {
			echo '<a name="message"></a><div style="background: #FF6600; color: #fff; font-weight: bold; padding: 10px 2px; margin:2px 0 20px; text-align: center;">An unexpected error occurred.</div>';
		}
	}
}


function cf_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean(); //
}

add_shortcode( 'ideum_contact_form', 'cf_shortcode' );

?>