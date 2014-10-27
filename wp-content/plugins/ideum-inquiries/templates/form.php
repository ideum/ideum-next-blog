<div class="inquiry-content">

  <section id="inquiry-form">

    <form autocomplete="on" novalidate>
      
      <div class="full-box">

        <div class="half-box">
          <div class="required fname">
            <label class="light" for="first-name">Full name <span class="requiredNote">*</span></label>
            <input class="full-input" type="text" name="inquiries[first-name]" id="first-name" autofocus required>
          </div>
        </div>

        <div class="half-box">
          <div class="required lname">
            <label class="light" for="last-name">Last name <span class="requiredNote">*</span></label>
            <input class="full-input" type="text" name="inquiries[last-name]" id="last-name" required>
          </div>
        </div>

      </div>

      <div class="required email">
        <label class="light" for="email">Email <span class="requiredNote">*</span></label>
        <input class="full-input" type="email" name="inquiries[email]" id="email" autocomplete="off" required>
      </div>

      <div class="not-required company">
        <label class="light" for="company-name">Company Name</label>
        <input class="full-input" type="text" name="inquiries[company]" id="company-name">
      </div>

      <div class="not-required contact">
        <fieldset>
          <div class="dark faux-label fieldset-label">Contact me by phone</div>
          <div class="half-box">
            <input class="left-radio" type="radio" name="inquiries[contact-by-phone]" id="contact-by-phone-yes" value="yes" checked />
            <label class="radio-label right-label" for="contact-by-phone-yes">Yes</label>
          </div>
          <div class="half-box">            
            <input class="left-radio" type="radio" name="inquiries[contact-by-phone]" id="contact-by-phone-no" value="no" />
            <label class="radio-label right-label" for="contact-by-phone-no">No</label>
          </div>

          <hr>

          <div class="full-box">
            <label class="dark two-thirds-label left-label" for="phone-number">What phone number is best for reaching you?</label>
            <input class="third-input right-input" type="tel" name="inquiries[phone]" id="phone-number" placeholder="Phone">
          </div>
          <div class="full-box">
            <label class="dark two-thirds-label left-label" for="phone-time">What time is best for reaching you?</label>
            <input class="third-input right-input" type="text" name="inquiries[time]" id="phone-time" placeholder="Time">
          </div>
        </fieldset>
      </div>

      <div class="not-required products">
        <fieldset>
          <div class="dark faux-label fieldset-label">Product or service you are interested in? (Select all that apply)</div>
          <div class="half-box">
            <input class="left-checkbox" type="checkbox" name="inquiries[service][app-web-dev]" id="check-app-web-dev" value="App / Web Development" />
            <label class="dark check-label right-label" for="check-app-web-dev">App / Web development</label>
          </div>
          <div class="half-box">
            <input class="left-checkbox" type="checkbox" name="inquiries[service][touch-tables]" id="check-touch-tables" value="Touch Tables" />
            <label class="dark check-label right-label" for="check-touch-tables">Touch Tables</label>
          </div>
          <div class="half-box">
            <input class="left-checkbox" type="checkbox" name="inquiries[service][touch-walls]" id="check-touch-walls" value="Touch Walls" />
            <label class="dark check-label right-label" for="check-touch-walls">Touch Walls</label>
          </div>
          <div class="half-box">
            <input class="left-checkbox" type="checkbox" name="inquiries[service][cust-exhibit-dev]" id="check-cust-exhibit-dev" value="Custom Exhibit Development" />
            <label class="dark check-label right-label" for="check-cust-exhibit-dev">Custom exhibit development</label>
          </div>
        </fieldset>
      </div>

      <label for="inquiries-comments">Please include your questions and interest in working with us.</label>
      <textarea name="inquiries[comments]" id="inquiries-comments" rows="5" cols="60"></textarea>

      <p class="required-note">* - Required</p>

      <p class="submit-wrap"><input class="button active" type="submit" value="Submit"></p>

    </form>

  </section>

</div>