//Main document ready
$(document).ready(function()
{

    Dialogload('#class_delete_dialog','.delete',400,'delete_input_id');
    Dialogload('#room_insert_dialog','.insert_room',400,'room_hidden_input_id');
    Dialogload('#class_modify_dialog','.modify_class',400)
    form_submit('#table_form','del_class');
    form_submit('#class_insert_form','ins_class');
    form_submit('#room_insert_form','ins_room');
    
});
// Open dialog function
function Dialogload(dest,butt,Dwidth,hidden_element)
{
    $( dest ).dialog( { autoOpen: false, draggable: false,
                        modal: true, resizable: false,
                        show: { effect: 'drop', direction: "up" } ,
                        width: Dwidth } );

     $(butt).click(function(){
     var element=document.getElementById(hidden_element);
     element.value=this.id;   
     $(dest).dialog('open');
      return false;
  });
}
function form_submit(submit_form,submit_dest)
{
    
     $(submit_form).submit(function()
{
    $.post("http://localhost/alaqsa/home_controller/" + submit_dest,
    $(submit_form).serialize(),
    function(data){
   document.location.replace("http://localhost/alaqsa");
});
    return false;
})
    
}