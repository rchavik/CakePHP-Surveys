var Surveys = {}

Surveys.modals = function() {
  $(".survey-view").on("click", function() {
    var el= $(this)
    var modal = $('#survey-modal');
    $('#survey-modal')
      .find('.modal-header h3').html(el.data("title")).end()
      .find('.modal-body').html('<pre>' + el.data('content') + '</pre>').end()
      .modal('toggle');
    return false;
  });
}

$(function() {
  Surveys.modals()
})
