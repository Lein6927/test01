import {doinsert}from './doinsert.js';
function showinsertPage(){
    
        let str = `學號：<input type="text" id="id"><br>`;
        str += `姓名：<input type="text" id="name"><br>`;
        str += `住址：<input type="text" id="addr"><br>`;
        str += `生日：<input type="text" id="birth"><br>`;
        str += `<button id="doinsert">新增</button>`;
        $("#content").html(str);
        $("#doinsert").click(function(){
            doinsert();
        });

}export {showinsertPage};