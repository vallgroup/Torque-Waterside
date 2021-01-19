($ => {
  $(document).ready(() => {
    const modalCTA = $(".download-all-fps-wrapper");
    const modal = $("#waterside-modal");
    const modalClose = $("#waterside-modal-close");
    const modalForm = $("#ws-floorplan-cta-form");
    const modalBodyCopy = $(".ws-floorplan-cta-form--copy");

    modalCTA.click(function(e) {
      e.preventDefault();
      modal.fadeIn('fast');
      // log event
      (spectra && spectra.logEvent('download_all_floorplans_clicked'));
    })

    modalClose.click(function(e) {
      e.preventDefault();
      modal.fadeOut('fast');
    })

    modalForm.on('submit', function(e) {
      e.preventDefault();

      var _btn = $(this).find('button');
      var _name = $(this).find('#name');
      var _email = $(this).find('#email');

      var nameVal = _name.val();
      var emailVal = _email.val();

      if ('' === nameVal || '' === emailVal) {
        alert('Name or Email cannot be empty');
        return;
      }

      _btn.prop('disabled', true);

      // log event
      (spectra && spectra.logEvent('download_all_floorplans_email_sent'));

      fetch('/wp-json/waterside/v1/email?name='+nameVal+'&email='+emailVal)
      .then(resp => (resp.json()))
      .then(json => {
        modalForm.remove();
        if (false === json.success) {
          modalBodyCopy.html('<p>Sorry, it looks like we are having trouble sending your email. Please try again later.</p>')
        } else {
          modalBodyCopy.html('<p>Thank you! Your email was sent. Check your inbox.</p>')
        }
      });

    })

  });
})(jQuery);
