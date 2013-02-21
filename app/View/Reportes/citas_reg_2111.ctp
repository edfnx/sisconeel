<script type="text/javascript">

	$(function() {

		// jqPlot //

		$.jqplot.config.enablePlugins = true;
        var s1 = [2, 6, 7, 10];
        var ticks = ['ENE', 'FEB', 'MAR', 'ABR'];


        data = <?php echo utf8_decode(json_encode($data)); ?>
         
        plot1 = $.jqplot('chart1', [data], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    //ticks: ticks
                }
            },
            highlighter: { show: false }
        });
     
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );

	});
</script>
	

<div class="row-fluid">
	<div class="span12">
		<div class="graphics">
			<div class="page-header">
				<h4>					
				<?php echo "REPORTE ANUAL DE ATENCIONES DEL PUESTO DE SALUD CONDURIRI I-3\nPERIODO ENERO A DICIEMBRE DEL ".$fecha ; ?>
				</h4>
			</div>
			<header class="graphics-header">
				<?php echo "En el Periodo de Enero a Diciembre del ".$fecha." las atenciones se dieron de la siguiente manera como puede apreciarse en el Grafico de Barras que se muestra continuacion."; ?>
			</header>
			
			<div class="graphics-container">
				<div id="chart1"></div>
			</div>

			<article>
				
			</article>

			<footer class="graphics-footer">
				GRAFICO No 1: Grafico del Reporte Anual de Ateniones por mes del Puesto de Salud Conduriri I-3
			</footer>
			<!--<p><label><input id="enableTooltip" type="checkbox">Enable tooltip</label></p>-->
		</div>
	</div>
</div>

<?php 
	/* jquery.jqplot */
	echo $this->Html->script('/plugins/jqplot/jquery.jqplot');
	echo $this->Html->css('/plugins/jqplot/jquery.jqplot');
	
	echo $this->Html->script('/plugins/jqplot/jqplot.barRenderer.min');
	echo $this->Html->script('/plugins/jqplot/jqplot.categoryAxisRenderer.min');
	echo $this->Html->script('/plugins/jqplot/jqplot.pointLabels.min');
?>
