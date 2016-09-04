$(function() {
	var getParams = function() {
		var SearchParams = {
				"CustomerName" : $("input#CartCustomerName").attr('value'),
				"Date" : $("input#CartInvoiceDate").attr('value'),
				"Salesman" : $("select#CartUserId").attr('value'),
				"Amount" : $("input#CartAmount").attr('value'),
				"Discount" : $("input#CartDiscount").attr('value')
			};		
		return $.toJSON(SearchParams);
	}
	var search = function() {
		$.post($('a#SearchLink').attr('href'), {data: getParams()}, function(response) {
			$('div#SearchResult').html(response);
		});		
	}
	
	$('input#CartInvoiceDate').datepicker();
	search();
	
	$('input[type=text], select').bind('change', function() {
			search();
		});
	$('input[type=submit]').bind('click', function(ev) {
			ev.preventDefault();
			search();
		});
	
	
});