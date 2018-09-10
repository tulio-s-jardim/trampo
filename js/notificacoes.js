type = ['','info','success','warning','danger'];
typeIcon = ['','info_outline','check','warning','error_outline'];
intType = 3;

function showNotification(from, align, stringType, textMessage){
    /*  Parâmetros (
            from: bottom | top,
            align: left | center | right,
            stringType: info | success | warning | danger,
            textMessage: Texto a ser inserido
        )
     */
    for(i=1;i<5;i++) {
        if(type[i]===stringType) {
            intType = i;
            break;
        }
    }
    $.notify({
        icon: typeIcon[intType],
        message: textMessage

    },{
        type: type[intType],
        timer: 3000,
        placement: {
            from: from,
            align: align
        }
    });
}