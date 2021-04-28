function doinsert(){
    $.ajax({
        type:"POST",
        url:"doInsertAction_try.php",
        data:{
            "id": $("#id").val(),
            "name": $("#name").val(),
            "addr": $("#addr").val(),
            "birth": $("#birth").val(),
        },
        success:function(jsonString){
        //    console.log(jsonString);
            let response = JSON.parse(jsonString);
            $("#content").html(response['status']+":"+response['message']);
        },
        error:function(err){
            console.log(err);
        }
       });
}
export {doinsert};