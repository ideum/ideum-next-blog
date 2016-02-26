<?php
 
/*
  Plugin Name: Insightly Contact Form
  Plugin URI: http://ideum.com
  Description: A very simple insightly contact form plugin
  Version: 1.0
  Author: glass C. @ ideum
  Author URI: http://ideum.com
*/

 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// create function to hold our form
function insightly_form_code() {
	if($_GET['m'] == "thanks") {
	echo'<a name="message"></a><div style="background:#006600;color:#fff;font-weight:bold;padding:10px 2px;margin:20px 0 20px;text-align:center;""><p>Thanks for contacting us!.<br>We will be in touch with you shortly.</p></div>';
	header( "refresh:4;url=http://".$_SERVER['SERVER_NAME']."/contact" ); 
	}

	echo'
  <div class="inquiry-content">
	  <section id="inquiry-form">
	  	<form action="https://googleapps.insight.ly/WebToContact/Create" name="insightly_web_to_contact" method="post">
				<input type="hidden" name="formId" value="MpB0vVjf7OV7GjWOz1k2Gw=="/><!-- formId value comes from web-to-contact form on Insightly -->
				<div class="full-box">
				  <div class="half-box">
				    <div class="required fname">
				      <label class="medium" for="insightly_firstName">First name <span class="required-note">*</span></label>
				      <input autofocus="" class="full-input" id="insightly_firstName" name="FirstName" required="" type="text">
				    </div>
				  </div>
				  <div class="half-box">
				    <div class="required lname">
				      <label class="medium" for="insightly_lastName">Last name <span class="required-note">*</span></label>
				      <input class="full-input" id="insightly_lastName" name="LastName" required="" type="text">
				    </div>
				  </div>
				</div>
				<div class="required email">
					<input type="hidden" name="emails[0].Label" value="Work"/>
				  <label class="medium" for="emails[0]_Value">Email (work)<span class="required-note">*</span></label>
				  <input autocomplete="off" class="full-input" id="emails[0]_Value"  name="emails[0].Value" required="" type="email" >
				</div>
				<div class="not-required company">
				  <label class="medium" for="insightly_organization">Company Name</label>
				  <input class="full-input" id="insightly_organization" name="Organization" type="text">
				</div>
				<div class="not-required contact">
				  <fieldset>
				    <div class="dark faux-label fieldset-label">Contact me by phone</div>
				    <div class="half-box">
				    	<input type="hidden" name="phones[0].Label" value="Work"/>
				      <input class="left-radio" id="contact-by-phone-yes" name="contact-by-phone" onclick="javascript:yesnoCheck();" type="radio" value="yes">
				      <label class="radio-label right-label" for="contact-by-phone-yes">Yes</label>
				    </div>
				    <div class="half-box">            
				      <input class="left-radio" id="contact-by-phone-no" name="contact-by-phone" onclick="javascript:yesnoCheck();" type="radio" value="no">
				      <label class="radio-label right-label" for="contact-by-phone-no">No</label>
				    </div>
				    <div id="ifphoneYes" style="display:none;">
				      <hr>
				      <div class="full-box">
				      	<input type="hidden" name="phones[0].Label" value="Work"/>
				        <label class="dark two-thirds-label left-label" for="phones[0]_Value">What phone number is best for reaching you?</label>
				        <input class="third-input right-input" id="phones[0]_Value" name="phones[0].Value" type="tel">
				      </div>
				      <div class="full-box">
				        <label class="dark two-thirds-label left-label" for="phonetime">What time is best for reaching you?</label>
				        <input class="third-input right-input" id="phonetime" name="preferred-time" type="text">
				      </div>
				    </div>
				  </fieldset>
				</div>
				<div class="not-required products">
				  <fieldset>
				    <div class="dark faux-label fieldset-label">Product or service you are interested in? (Select all that apply)</div>
				    <div class="half-box">
				      <input class="left-checkbox" type="checkbox" name="multitouch-tables" id="check-touch-tables" value="yes">
				      <label class="dark check-label right-label" for="check-touch-tables">Touch Tables</label>
				    </div>
				    <div class="half-box">
				      <input class="left-checkbox" id="check-cust-software-dev" name="custom-software-development" type="checkbox" value="yes">
				      <label class="dark check-label right-label" for="check-cust-software-dev">Custom Software Development</label>
				    </div>
				    <div class="half-box">
				      <input class="left-checkbox" id="check-touch-walls" name="touch-walls" type="checkbox" value="yes">
				      <label class="dark check-label right-label" for="check-touch-walls">Touch Walls</label>
						</div>
				    <div class="half-box">
				      <input class="left-checkbox" type="checkbox" name="custom-hardware-devlopment" id="check-cust-hardware-dev" value="yes">
				      <label class="dark check-label right-label" for="check-cust-hardware-dev">Custom Hardware Development</label>
						</div>
				 		<div class="half-box">
				      <input class="left-checkbox" id="check-product-rentals" name="product-rentals" type="checkbox" value="yes">
				      <label class="dark check-label right-label" for="check-product-rentals">Product Rentals (US only)</label>
				    </div>
				  </fieldset>
				</div>
				<label for="insightly_background">Please include your questions and interest in working with us.</label>
				<textarea id="insightly_background" name="background" rows="5" cols="60"></textarea>
				<label for="inquiries-howheard">How did you hear about us?</label>
				<textarea name="how-heard" id="how-heard" rows="2" cols="60"></textarea>
				<p class="required-note">* - indicates a required fields</p>
				<p style="color:#999;">Caution: the form may take some time to process - please do not resubmit.</dip>
				<p class="submit-wrap"><input class="button dark active" type="submit" value="Submit"></p>
			</form>
	  </section>
	</div>
	';
}


//shortcode
function iform_shortcode() {
	ob_start();
	insightly_form_code();

	return ob_get_clean(); //
}

add_shortcode( 'contact_form', 'iform_shortcode' );

?>