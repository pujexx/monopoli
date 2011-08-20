$(document).ready(function(){

    $('.load_more').live("click",function() {//If user clicks on hyperlink with class name = load_more
        
        $('a.load_more').html('<img src="'+base_url+'/public/template/images/loading2.gif" />');//Loading image during the Ajax Request

    });
    $("#newroom").fancybox();
    $("#room-form").validate();
    $(".room p a").click(function(){
        id = $(this).attr("id");
        $.fancybox({
            'href'          : "#confirm-del",
            'onStart'       : function(){
                $(".delete").attr("id",id);
            }
        });
    });
    $(".delete").click(function(){
        id=  $(this).attr("id");
        
        delete_room =({
            'id_room':id
        });
        $.ajax({
            type : "post",
            url : site_url+'/member/dashboard/deleteroom',
            data : delete_room,
            success : function(html){
                $("#room"+id).hide("slow");
                $.fancybox.close();
            }
        });
       
    });
  
    
});