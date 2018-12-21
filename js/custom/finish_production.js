
    $(document).ready(function(){
        function duplicate_item_no_check(ITEM_NO,UNIT_NO){
            var is_duplicate = 0;
            $(".edit_list").each(function(){
                var CHK_ITEM_NO = $(this).attr("ITEM_NO");
                var CHK_UNIT_NO = $(this).attr("UNIT_NO");
                var is_edit = $(this).attr("is_edit");
                if(isNaN(is_edit)){
                    is_edit = 0;
                }
                if(CHK_ITEM_NO == ITEM_NO && CHK_UNIT_NO == UNIT_NO && is_edit == 0)
                    is_duplicate = 1;
            });
            return is_duplicate;
        }

        function remove_set_edit(){
            $(".set_edit").each(function(){
                $(this).removeAttr("class");
            });
        }

        $("#addItem").on("click",function(){
            var ITEM_NAME = $("#ITEM_NO option:selected").text();
            var ITEM_NO = $("#ITEM_NO").val();
            var QUANTITY = $("#QUANTITY").val();
            var UNIT_NO = $("#UNIT_NO").val();
            var UNIT_NAME = $("#UNIT_NO option:selected").text();
            var is_duplicate = duplicate_item_no_check(ITEM_NO,UNIT_NO);
            if(is_duplicate == 0){
                var html = "";
                var innerHtml = "";
                html+="<tr>";
                innerHtml+="<td>"+ITEM_NAME+"</td>";
                innerHtml+="<td>"+QUANTITY+"</td>";
                innerHtml+="<td>"+UNIT_NAME+"</td>";
                innerHtml+="<td><a class='btn btn-danger remove_list'>Rmove</a><a class='btn btn-success edit_list' ITEM_NAME = '"+ITEM_NAME+"' ITEM_NO = '"+ITEM_NO+"' QUANTITY = '"+QUANTITY+"' UNIT_NO = '"+UNIT_NO+"' UNIT_NAME = '"+UNIT_NAME+"'>Edit</a></td>";
                html+=innerHtml;
                html+="</tr>";
                if($(this).val() == "Add"){
                    $("#item_details").append(html);
                }else{
                    $(this).val("Add");
                    $("#item_details tr.set_edit").html(innerHtml);
                }
            }else{
                alert("Duplicate Record Found");
            }
        });
        $(document).on("click",".remove_list",function(){
            var con = confirm("Are you Sure to Remove?");
            if(con){
                $(this).parents('tr').remove();
            }
        });
        $(document).on("click",".edit_list",function(){
            remove_set_edit();
            $(this).parents('tr').attr("class","set_edit");
            $(this).attr("is_edit",1);
            var ITEM_NO = $(this).attr("ITEM_NO");
            var QUANTITY = $(this).attr("QUANTITY");
            var UNIT_NO = $(this).attr("UNIT_NO");
            $("#ITEM_NO").val(ITEM_NO);
            $("#QUANTITY").val(QUANTITY);
            $("#UNIT_NO").val(UNIT_NO);
            $("#addItem").val("Update");
        });
    });

