/*********************************************
**											**
**			Select-Nesting v 0.b 			**
**											**
**********************************************/
									
$(document).ready(function () {
	/**
	<select 
		name="data[Inscription][network_id]" 
		id="modality" 
		required="required" 
		class="input-xlarge"

		data-html-helper='nesting-select'
		data-next-select='#specialty'
		data-url="/autocomplete/specialist"

	>
		<option value="">(Seleccione uno)</option>
	</select>

	**/

	$("select[data-html-helper='nesting-select']").on('change', function () {
		id = $(this).val();
		nextSelect = $(this).data('next-select');

		if(parseInt(id) > 0){
			$.ajax({
				url: $(this).data('url'),
				type: 'POST',
				data: {id: id},
				datatype: 'json',
				beforeSend: function () {
						$(nextSelect).html('<option>Cargando...</option>');
				},
				complete: function () {
					//$('#specialty_list').html('<option>Completo...</option>');
				},
				error: function () {
					$(nextSelect).html('<option>Error...</option>');
				},
				success: function (data) {
					$(nextSelect).html('');
					
					html_opt = '<option>(Seleccione)</option>';

					for (var i = data.length - 1; i >= 0; i--) {
						
						html_opt += "<option value='" +data[i].id +"'>"+ data[i].name+'</option>';
					};
		 			
					$(nextSelect).html(html_opt).removeAttr('disabled');
				}
			});
		}else{
			$(nextSelect).html('<option>(Seleccione)</option>').attr('disabled', 'disabled');
		}
	});
});

