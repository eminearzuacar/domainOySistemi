function strrep(obj,cmd,val) {
    if (obj.value==obj.defaultValue || obj.value=='') { 
        if(cmd=='show') { 
            obj.value=''; 
        } if(cmd=='clear') { 
            obj.value=obj.defaultValue; 
        } 
    }  
}