jQuery(document).ready(function(){
    show();
    jQuery(document).on("click", ".btn-edit", function(){
        var id=jQuery(this).val();
        $.ajax({
            url:"/product/edit/"+id,
            type:"get",
            dataType:"json",
            success:function(response){
                jQuery("#bus_name").val(response.data.bus_name);
                jQuery("#coach").val(response.data.coach);
                jQuery("#from").val(response.data.from);
                jQuery("#to").val(response.data.to);
                jQuery("#price").val(response.data.price);
                jQuery("#time").val(response.data.time);
                jQuery("#type").val(response.data.type);
                jQuery("#counter_point").val(response.data.counter_point);
                jQuery(".edit").val(response.data.id);
            }
        })
    })
    jQuery(document).on("click",".edit",function(){
        var id=jQuery(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var bus_name        =jQuery("#bus_name").val();
        var coach           =jQuery("#coach").val();
        var from            =jQuery("#from").val();
        var to              =jQuery("#to").val();
        var price           =jQuery("#price ").val();
        var time            =jQuery("#time").val();
        var type            =jQuery("#type").val();
        var counter_point   =jQuery("#counter_point").val();
        $.ajax({
            url:"/product/update/"+id,
            type:"POST",
            dataType:"JSON",
            data:{
                bus_name:bus_name,
                coach:coach,
                from:from,
                to:to,
                price:price,
                time:time,
                type:type,
                counter_point:counter_point
            },
            success:function(response){
                if(response.status=="success"){
                    show();
                    jQuery(".msg").show().text("Product Updated");
                    jQuery("#edit").modal("hide");
                    jQuery("#bus_name").val("");
                    jQuery("#coach").val("");
                    jQuery("#from").val("");
                    jQuery("#to").val("");
                    jQuery("#price").val("");
                    jQuery("#time").val("");
                    jQuery("#type").val("");
                    jQuery("#counter_point").val("");
                    jQuery(".msg").fadeOut(1000);
                   }
            }

        })
    })
    jQuery(document).on("click", ".btn-delete", function(e){
        var id=jQuery(this).val();
        jQuery(".delete").val(id);
    });
    jQuery(document).on("click",".delete",function(){
        var id=jQuery(this).val();
        $.ajax({
            url:"/product/destroy/"+id,
            type:"get",
            dataType:"json",
            success:function(response){
                if(response.status !="success"){
                    show();
                    jQuery(".msg").show().text("Product Not Deleted");
                    jQuery(".msg").fadeOut(1000);
                    jQuery("#delete").modal("hide");
                }
                else{
                    show();
                    jQuery(".msg").show().text("Product Deleted");
                    jQuery(".msg").fadeOut(1000);
                    jQuery("#delete").modal("hide");
                }
            }
        })
    })
    function show(){
        $.ajax({
            url:"/product/show",
            type:"GET",
            dataType:"JSON",
            success:function(response){
                var data="";
                var sl=1;
                if(response.status=="success"){
                    $.each(response.alldata, function(key,item){
                        data +='<tr>\
                        <td>'+sl+'</td>\
                        <td>'+item.bus_name+'</td>\
                        <td>'+item.coach+'</td>\
                        <td>'+item.from+'</td>\
                        <td>'+item.to+'</td>\
                        <td>'+item.price+'</td>\
                        <td>'+item.time+'</td>\
                        <td>'+item.type+'</td>\
                        <td>'+item.counter_point+'</td>\
                        <td>\
                            <button data-toggle="modal" data-target="#edit" value="'+item.id+'" class="btn-edit btn btn-info btn-sm"><i class="fa fa-edit"></i></button>\
                            <button data-toggle="modal" data-target="#delete" value="'+item.id+'" class="btn-delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>\
                        </td>\
                    </tr>';
                        sl++;
                    });
                    jQuery(".data").html(data);
                }
                else{

                }
            }
        })
    }    

    jQuery(".btn-add").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var bus_name       =jQuery(".bus_name").val();
        var coach          =jQuery(".coach").val();
        var from           =jQuery(".from").val();
        var to             =jQuery(".to").val();
        var price          =jQuery(".price").val();
        var time           =jQuery(".time").val();
        var type           =jQuery(".type").val();
        var counter_point  =jQuery(".counter_point").val();
        $.ajax({
            url:"/product/store",
            type:"POST",
            dataType:"JSON",
            data:{
                bus_name:bus_name,
                coach:coach,
                from:from,
                to:to,
                price:price,
                time:time,
                type:type,
                counter_point:counter_point,
            },
            success:function(response){
                if(response.status=="faild"){
                    jQuery(".error_bus_name").text(response.errors.bus_name);
                    jQuery(".error_coach").text(response.errors.coach);
                    jQuery(".error_from").text(response.errors.from);
                    jQuery(".error_to").text(response.errors.to);
                    jQuery(".error_price").text(response.errors.price);
                    jQuery(".error_time").text(response.errors.time);
                    jQuery(".error_type").text(response.errors.type);
                    jQuery(".error_counter_point").text(response.errors.counter_point);
                }
                else{
                    show();
                    jQuery(".msg").show().text("Product Added");
                    jQuery(".error_bus_name").text("");
                    jQuery(".error_coach").text("");
                    jQuery(".error_from").text("");
                    jQuery(".error_to").text("");
                    jQuery(".error_price").text("");
                    jQuery(".error_time").text("");
                    jQuery(".error_type").text("");
                    jQuery(".error_counter_point").text("");
                    jQuery(".bus_name").val("");
                    jQuery(".coach").val("");
                    jQuery(".from").val("");
                    jQuery(".to").val("");
                    jQuery(".price").val("");
                    jQuery(".time").val("");
                    jQuery(".type").val("");
                    jQuery(".counter_point").val("");
                    jQuery(".msg").fadeOut(1000);
                }
            }

        })
    })


});