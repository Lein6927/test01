import {dodelete}from './dodelete.js';
function showdeleteList(){
    //console.log("1");
    $.ajax({
        type:"GET",
        url:"doselectAction.php",
        success:function(jsonString){
            console.log(jsonString);
            let response=JSON.parse(jsonString);
            switch(response['status']){
                case 200:
                    let rows = response['result'];
                    let str = `<table>`;
                    rows.forEach(element => {
                        str +=`<tr>`;
                        str +=`<td>`+`<input type="radio" id="id" name="id" value="`+element["id"]+`"></td>`;
                        str +=`<td>`+element['name']+`</td>`;
                        str +=`<td>`+element['addr']+`</td>`;
                        str +=`<td>`+element['birth']+`</td>`;
                        str +=`</tr>`;
                    });
                    str+=`</table>`;
                    str+=`<button id="dodelete">刪除</button>`;
                    $("#content").html(str);
                    $("#dodelete").click(function(){
                        dodelete();
                    });
                    break;
                case 400:
                    $("#content").html(response['message']);
                    break;
                default:
                    $("#content").html(response['message']);
                    break;
            }
        },
        error:function(err){
            $("#content").html(err)
        }
    });
}

export{showdeleteList};