($ => {
  $(document).ready(() => {
    const textArea = $('.grunion-field-textarea-wrap textarea');

    // hide label
    textArea.focusin(function(){
      $(this).siblings('label').fadeOut(0);
    });
    // show label, if teaxtarea is empty
    textArea.focusout(function(){
      if ( '' === $(this).val().trim() ) {
        $(this).siblings('label').fadeIn(200);
      }
    });

  });
})(jQuery);
