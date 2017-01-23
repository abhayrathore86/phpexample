jQuery(document).ready(function(){
  //var response='';
jQuery.ajax({
            url: "http://192.168.200.53/jqueryDemo/getdata.php",
            type: 'GET',
            dataType: 'json',
            success:function(resp){
              //alert(resp);
              
              console.log(resp.length);
              var out = '<ul class="slider" id="slide">';
              for (var i = 0; i < resp.length; i++) {
                console.log(resp[i]);
                out += "<li><img src='uploads/"+resp[i]+"' /></li>";
                }
              out += "</ul>";
              jQuery('#slide').html(out);
             // console.log(resp);
    
      }
              });

});