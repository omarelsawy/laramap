$(document).ready(function(){
   $("#district").click(function () {
       var distval = $("#district").val();
       $.post('/api/searchCity' , {distval:distval} , function (match) {
           $("#city").html(match);
       });

   });
});
