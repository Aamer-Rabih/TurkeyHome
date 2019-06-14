// The following code for to appear the name of file in select
$(".imageField").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".imageFieldLabel").addClass("selected").css("direction", "rtl").html(fileName).append('<i class="fa fa-upload pull-left" aria-hidden="true" style="margin-top:3px;"></i>');
});

// Ajax dropdown 
jQuery(document).ready(function ()
    {
            jQuery('select[name="linkable_type"]').on('change',function(){
               var type = jQuery(this).val();
               if(type)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getdata/' +type,
                     type : "GET",
                     dataType : "json",
                     data: type,
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[linkable_id=""]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="linkable_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="linkable_id"]').empty();
               }
            });
    });

