($ => {
  $(document).ready(() => {
    const viewMoreBtn = $(".col-two-read-more");

    // show col two when view more is clicked
    viewMoreBtn.click(function() {
      // find sibling col-two
      const colTwo = $(this).prev('.two-cols-container').find('.col-two');

      // remove the btn
      $(this).fadeOut(250, function() {
        $(this).remove();
        // then show col two
        colTwo.addClass('show');
      });
    });

  });
})(jQuery);
