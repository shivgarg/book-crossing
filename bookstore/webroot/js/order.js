$(function() {
				var BookName = $('input#SaleBookname').attr('value');
				//$('input[type=submit]').attr('disabled', 'disabled').css('opacity','0.5');

				$('input#SaleBookname').live('keyup', function() {
						item = $(this);
						clearTimeout();
						setTimeout(getBookList, 1000);
					});

				getBookList = function() {
						
						if(BookName === $('input#SaleBookname').attr('value')) {
							return false;
						}
						BookName = $('input#SaleBookname').attr('value');
						linkToPost = $('a#getBookListAnchor').attr('href');
						console.time('book list retrieval');
						   $.post(linkToPost, {data: BookName}, function(response) {
								bookList = "<div id='booklist'>" + response + "</div>";
									removeBookList();
									$('div#booklist a').live('click', function(eV) {
											item = $(this);
											eV.preventDefault();
											$('div#booklist').load($(item).attr('href'));
										});
									
								$(bookList).insertAfter($('input#SaleBookname'));
									$('div#booklist a[rel=addToCart]').bind('click', function(eV) {
											item =$(this);
											eV.preventDefault();
												if(!$('table#bookSaved').length) {
													tableBookSaved = '<h2>Sales Cart</h2><table id="bookSaved"></table>';
													$(tableBookSaved).insertAfter($('input#SaleBookname'));
												}

											$('table#bookSaved').append($(item).parents('tr:first'));
											$('input#SaleBookname').attr('value', 'Type name of the book').focus().select();
											$('input[type=submit]').removeAttr('disabled').css('opacity','1');
											$.post($('a#addToCart').attr('href'), {data: $(item).attr('id') }, function(response) {});
										});
							});
						console.timeEnd('book list retrieval');
					}
				removeBookList = function() {
					if($('div#booklist').length) {
						$('div#booklist').remove();					
					}
					return;
				}
			});
