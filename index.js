//index.js

import {doSelect} from './doSelect.js';
import {showinsertPage } from './showInsertPage.js';
import {showdeleteList} from './showdeleteList.js';


$(document).ready(function(){
    $("#insert").click(function(){//對應button id=insert
        showinsertPage();
    });
    
    $("#delete").click(function(){
        showdeleteList();
    })
    
    
    $("#select").click(function(){
        //console.log("b");
        doSelect();
    })

});