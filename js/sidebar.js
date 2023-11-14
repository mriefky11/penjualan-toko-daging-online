// admin sidebar
$("#btn-slider").click(function () {
  if ($("#sliders").hasClass("active")) {
    $("#sliders").removeClass("active");
    $("#sliders-background").removeClass("active");
  } else {
    $("#sliders").addClass("active");
    $("#sliders-background").addClass("active");
  }
});

$("#sliders-background").click(function () {
  $("#sliders").removeClass("active");
  $("#sliders-background").removeClass("active");
});
