jQuery(function ($) {
  'use strict';

  var $container = $('#inquiry-form'),
      $form = $container.find('form');

  $form.on('submit', function (event) {
    event.preventDefault();

    var valid = true;

    $form.find('[required]').each(function () {
      var $field = $(this),
          $label = $form.find('label[for='+$field.attr('id')+']');

      if ($field.val() === '') {
        valid = false;
        $label.addClass('error');
      } else {
        $label.removeClass('error');
      }
    });

    if (valid) {
      var data = $form.serializeArray();
      data.push({
        name: 'action',
        value: IDEUM_INQUIRIES.action
      });

      $.post(IDEUM_INQUIRIES.baseUrl, data, function (html) {
        $container.html(html);
      });
    }
  });
});
