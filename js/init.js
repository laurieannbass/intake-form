// JavaScript Document





function make_maskes(){
        $.mask.definitions['~'] = "[+-]";
        $('[type="date"]').mask("99/99/9999",{completed:function(){ }});
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
		$( '[type="date"]' ).datepicker();
}
make_maskes();