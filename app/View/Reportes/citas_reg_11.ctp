<script type="text/javascript">
	$(function() {

		$.getJSON("/sisconeel/reportes/citas_reg_11_json", function(data) {
						
			$.plot("#placeholder", [ data ], {
				series: {
					bars: {
						show: true,
						barWidth: 0.8,
						align: "center"
					}
				},
				xaxis: {
					mode: "categories",
					tickLength: 0
				}
			});
		});
	});
</script>

<div class="row-fluid">
	<div class="span12">
		<div class="graphics">
			<div class="page-header">
				<h4>
					
				<?php echo "REPORTE ANUAL DE REGITRO DE CITAS DE ESSALUD EN LINEA - RAJUL\nPERIODO ENERO A DICIEMBRE DEL ".$anio;  ?>
				</h4>
			</div>
			<header class="graphics-header">
				<?php echo "En el Periodo de Enero a Diciembre del ".$anio." el registro de citas se dio de la siguiente manera como puede apreciarse en el Grafico de Barras que se muestra continuacion."; ?>
			</header>
			<div class="graphics-container">
				<div id="placeholder" class="demo-placeholder"></div>
			</div>
			<footer class="graphics-footer">
				GRAFICO No 1: Grafico del Reporte Anual de Ateniones por mes del Puesto de Salud Conduriri I-3
			</footer>
		</div>
	</div>
</div>


    

<style type="text/css">
	.demo-placeholder {
		width: 100%;
		height: 100%;
		font-size: 14px;
		line-height: 14px;
	}
	.graphics{
		margin-bottom: 30px;

	}
	.graphics > .page-header{
		padding-bottom: 0px;
		margin-bottom: 15px;
	}
	.graphics > .page-header h2{
		text-align: center;
		line-height: 1.2em;
	}
	.graphics-container
	{	
		box-sizing: border-box;
		width: 600px;
		height: 300px;
		padding: 20px 15px 15px 15px;
		margin: 15px auto 15px auto;
		border: 1px solid rgb(221, 221, 221);
		
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
		-o-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
		-ms-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
		-moz-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
		-webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
	}

	header.graphics-header{
		text-align: center;
	}
	footer.graphics-footer{
		font-size: 0.9em;
		text-align: center;
		font-style: italic;	
	}
</style>