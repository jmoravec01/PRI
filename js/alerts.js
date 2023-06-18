$(".close").click(function () {
  $(this).parent().fadeOut();
});
$(document).ready(function () {
  function autoClose() {
    $(".close").parent().fadeOut();
  }

  var duration = 1500;

  setTimeout(autoClose, duration);
});
