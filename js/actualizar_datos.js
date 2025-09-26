    $(document).ready(function(){

 function update_data(cedula, column_name, value)
  {
   $.ajax({
    url:"update_datos.php",
    method:"POST",
    data:{cedula:cedula, column_name:column_name, value:value},
    success:function(data)
    {
    toastr.success('Actualizado', {
                    "timeOut": "2000",
                    "closeButton": true
                })
     
    }
   });
   
  }

  $(document).on('blur', '.update1', function(){
   var cedula = $("#cedCliente").val();
   var column_name = $(this).data("column");
   var value = $(this).val();
  
    update_data(cedula, column_name ,value);

  });
  });