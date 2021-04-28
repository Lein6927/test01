function dodelete(){
    $.ajax({
        type:"POST",
        url:"dodeleteAction.php",
        data:{
            "id":$("input[id=id]:checked").val(),
        },
        success:function(jsonString){
            console.log(jsonString);
            let response=JSON.parse(jsonString);
            let msg=response['status']+":"+response['message'];
            $("#content").html(msg);
           // $("#content").html(response['status']+":"+response['message']);
        },
        error:function(err){
            console.log(err);
        }
    });
console.log("1");
}
export{dodelete};