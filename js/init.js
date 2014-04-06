// JavaScript Document





function make_maskes(){
	$.mask.definitions['~'] = "[+-]";
	$('[type="date"],[rel="date"]').mask("99/99/9999",{completed:function(){ }});
	/*$("#phone").mask("(999) 999-9999");
	$("#phoneExt").mask("(999) 999-9999? x99999");
	$("#iphone").mask("+33 999 999 999");
	$("#tin").mask("99-9999999");
	$("#ssn").mask("999-99-9999");
	$("#product").mask("a*-999-a999", { placeholder: " " });
	$("#eyescript").mask("~9.99 ~9.99 999");
	$("#po").mask("PO: aaa-999-***");
	$("#pct").mask("99%");
	*/
	$("input").blur(function() {
		//$("#info").html("Unmasked value: " + $(this).mask());
	}).dblclick(function() {
		$(this).unmask();
	});
	$( "label i[title]" ).tooltip();

	$.each($( '[type="date"],[rel="date"]' ),function(){
		var tar = $(this);
		var dateRange={yearRange: ((new Date().getFullYear())-5)+':'+((new Date().getFullYear())+5)};
		
		if(tar.is($('input#dob'))){
			var orgage=$('input#age').val();
			dateRange={
				yearRange: '1920:'+((new Date().getFullYear())-15),
				onSelect: function(value, ui) {
					var today = new Date(),
						dob = new Date(value),
						age = new Date(today - dob).getFullYear() - 1970;
					$('input#age').val(age);
				}
			};
		}
		
		var options = $.extend({ changeMonth: true,changeYear: true }, dateRange);
		
		tar.datepicker(options);
		if(tar.is($('input#dob'))){$('input#age').val(orgage);}
	});
	
}




$(document).ready(function() {
	make_maskes();
	
	if($('.datagrid').length){
		$.each($('.datagrid'),function(){
			var datatable = $(this)
			var table = datatable.dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
		});
	}
	var uitabs = $( ".uitabs" ).tabs();
	var uiaccordions = $( ".accordions" ).accordion({active:false ,collapsible: true,heightStyle: "content",
	beforeActivate:function( event, ui ){

		}
	});
	var uibuttons = $( ".buttons" ).button();
	
	$('.deleteRecord').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		var trig=$(this);
		var tar=$(this).closest('h3');
		if(tar.next('div').find('.remove').val()>0){
			trig.find('span').text('[x]');
			tar.removeClass('removing');
			tar.css('opacity','1.0');
			tar.next('div').css('opacity','1.0').find('.remove').val('');
		}else{
			trig.find('span').text('[-]');
			tar.addClass('removing');
			tar.css('opacity','.85');
			tar.next('div').css('opacity','.15').find('.remove').val('1');
		}
	});
	
	$('[name="action_type"]').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		var trig=$(this);
		var value=trig.val();
		trig.closest('#action_choice').hide();
		$('#'+value+'.fieldset').show().removeClass('notused');
		
		
		
	});
	
	$('select').on('change',function(){
		var value= $(this).val();
		var possibleOther = $(this).closest('label').next('.other');
		if(possibleOther.length){
			if(value.toLowerCase()=="other"){
				possibleOther.show();
			}else{
				possibleOther.find('input').val('');
				possibleOther.hide();
			}
		}
	});
	
	$('input[type="checkbox"],input[type="radio"]').on('change',function(){
		var value= $(this).val();
		var possibleOther = $(this).closest('label').next('.other');
		if(possibleOther.length){
			if(value.toLowerCase()=="other" && $(this).is(':checked')){
				possibleOther.show();
			}else{
				possibleOther.hide();
				possibleOther.find('input').val('');
			}
		}
	});
	
	$('.veiw_record').on('click',function(){
		var tar = $(this).next('.hidden_inline_record').find('.inline_record');
		tar.dialog({
			autoOpen: true,
			maxWidth: $(window).width() * 0.8,
			minWidth: 450,
			draggable: false,
			modal: true,
			close:function(){
				tar.dialog( "destroy" );
			}
			
		});
	});
	
	
	
	
});