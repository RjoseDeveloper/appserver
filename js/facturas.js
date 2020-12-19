		$(document).ready(function(){
			load(1);
			
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_facturas.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Carregando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					$('[data-toggle="tooltip"]').tooltip({html:true}); 
					
				}
			})
		}

        function reload_factura(_id_factura){
            $.ajax({
                url:'editar_factura.php?id_factura='+_id_factura,
                beforeSend: function(objeto){
                    $('#loader').html('<img src="./img/ajax-loader.gif"> Carregando...');
                },

                success:function(data){
                    $("#resultados").load("ajax/editar_facturacion.php");
                }

            })
        }

	
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseja eliminar esta factura")){
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_facturas.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensagem: Carregando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
		function imprimir_factura(id_factura){
			VentanaCentrada('./pdf/documentos/ver_factura.php?id_factura='+id_factura,'Factura','','1024','768','true');
		}
