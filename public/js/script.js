// The following code for to appear the name of file in select
$("#imageField").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings("#uploadLabel").addClass("selected").css("direction", "rtl").html(fileName).append('<i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>');
});