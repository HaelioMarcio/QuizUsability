type = ['','info','success','warning','danger'];


dashboard = {
    showNotification: function(msg, from, align){
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "pe-7s-bell",
            message: msg

        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
    }
}