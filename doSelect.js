function doSelect(){
//console.log("a");  
    $.ajax({
        type: "GET",
        url: "doselectAction.php",        
        success: function(jsonString){
            let response = JSON.parse(jsonString);//將 JSON 字串解析成 JavaScript 物件 
            switch(response['status']){
                case 200:                    
                    let rows = response['result']; 

                    let str = `<table>`;
                    rows.forEach(element => {
                        //console.log("d");
                        str += "<tr>";
                        str += "<td>" + element['id'] + "</td>";
                        str += "<td>" + element['name'] + "</td>";
                        str += "<td>" + element['addr'] + "</td>";
                        str += "<td>" + element['birth'] + "</td>";
                        str += "</tr>";
                    });
                    str += `</table>`;   
                    //console.log(str);                                  
                    $("#content").html(str);  //選取所有 id 為 content 的元素 
                    console.log(str);               
                    break;

                case 400:
                    $("#content").html(response['message']);                   
                    break;
                default:
                    $("#content").html(response['message']);                   
                    break;
            }
        },
        error: function(err){
            $("#content").html(err);
        }
    });
}//success
export{doSelect};