<script type="text/javascript">
	$(function() {

		$.getJSON("/sisconeel/reportes/citas_reg_11_json", function(data) {
			console.log(data);

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

			// jqPlot //

			$.jqplot.config.enablePlugins = true;
	        var s1 = [2, 6, 7, 10];
	        var ticks = ['ENE', 'FEB', 'MAR', 'ABR'];
	         
	        plot1 = $.jqplot('chart1', [data], {
	            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
	            animate: !$.jqplot.use_excanvas,
	            seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true }
	            },
	            axes: {
	                xaxis: {
	                    renderer: $.jqplot.CategoryAxisRenderer
	                    //,ticks: ticks
	                }
	            },
	            highlighter: { show: false }
	        });
	     
	        $('#chart1').bind('jqplotDataClick', 
	            function (ev, seriesIndex, pointIndex, data) {
	                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
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
				<div id="placeholder" class="demo-placeholder" ></div>
			</div>
			<div class="graphics-container">
				<div id="chart1"></div>
			</div>
			<footer class="graphics-footer">
				GRAFICO No 1: Grafico del Reporte Anual de Ateniones por mes del Puesto de Salud Conduriri I-3
			</footer>
		</div>
	</div>
</div>
