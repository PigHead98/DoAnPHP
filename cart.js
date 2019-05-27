$('#cartdetail').on('click','.update_qty',function(e){
	//e.preventDefault();
	var btn=$(this); //lay nut update_qty
	var row=btn.closest('.row');
	var txtQty=row.find('.qty');
	var txtId = row.find('.update_id');
	var qty=txtQty.val();
	var id=txtId.val();
	 console.log(qty+id);
	//$(document).ready(function(){})
	load_ajax(id,qty);
})
function load_ajax(id,qty){
            	
                $.ajax({
                    url : "Update.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         qty : qty,
                         id : id
                    },
                    success : function (){
                       alert("thành công");
                    }
                });
            }

