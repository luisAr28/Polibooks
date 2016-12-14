
   /*  $(function()
    {
      $("#libro").autocomplete({
       // source: "Main_controller/get_Libro" // path to the get_birds method
          	minLength: 1,
            source: function(req, add)
            {
                $.ajax({
                    url: 'Main_controller/get_Libro', //Controller where search is performed
                    dataType: 'json',
                    type: 'POST',
                    data: req,
                    success: function(data)
                    {
                        if(data.response =='true'){
                           add(data.message);
                        }
                    }
                });
            }
      });
    });
      $(function(){
$("#birds").autocomplete({
source: "get_birds" // name of controller AND the search function
});
});*/

     
     $(function(){
  $("#birds").autocomplete({
    source: '<php echo site_url('Birds/get_birds');?>' // path to the get_birds method
     //source: "get_birds"
  });
});

