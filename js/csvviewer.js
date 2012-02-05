var oTable = undefined;
var asInitVals = new Array();

function resize_view() {
	var ciHeight = $(window).height() - 40 - 48 - 18 - 37;
		/* head, tabs, paginate, offset */
	var ciAmount = Math.ceil((ciHeight - 180) / 35);
		/* height - 100 / lineheight */

	if (ciAmount < 1) ciAmount = 1;

	/* send tabs to bottom */
	$('.tab-content').css('height', ciHeight);

	oTable.fnSettings()._iDisplayLength = ciAmount;
	oTable.fnDraw();
}

$(document).ready(function(){
    oTable = $('#dt_cvstable').dataTable({
		"bLengthChange": false,
		"sPaginationType": "full_numbers",
		"fnDrawCallback": function() {
			$('.dataTables_paginate a').addClass('btn');
			$('.dataTables_paginate .paginate_active').addClass('btn-success');
			$('.dataTables_paginate .first').addClass('btn-primary');
			$('.dataTables_paginate .last').addClass('btn-primary');
			$('.dataTables_paginate .next').addClass('btn-primary');
			$('.dataTables_paginate .previous').addClass('btn-primary');
	    }
	});
	$("thead input").keyup( function () {
		oTable.fnFilter( this.value, $("thead input").index(this) );
	} );
	
	$("thead input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("thead input").focus( function () {
		if ( this.className == "search_init" )
		{
			this.className = "";
			this.value = "";
		}
	} );
	
	$("thead input").blur( function (i) {
		if ( this.value == "" )
		{
			this.className = "search_init";
			this.value = asInitVals[$("thead input").index(this)];
		}
	} );
	$('.dataTables_filter').hide();

	resize_view();
});
$(window).resize(function() {
	resize_view();
});
