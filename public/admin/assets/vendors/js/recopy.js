(function($) {
	$.fn.relCopy = function(options) {
		var settings = jQuery.extend({
			excludeSelector: ".exclude",
			emptySelector: ".empty",
			copyClass: "copy",
			append: '',
			clearInputs: true,
			limit: 0 // 0 = unlimited
		}, options);

		settings.limit = parseInt(settings.limit);

		// loop each element
		this.each(function() {

			// set click action
			$(this).on('click',function(e) {
				e.preventDefault();
				var rel = $(this).attr('rel'); // rel in jquery selector format
				var counter = $(rel).length;

				// stop limit
				if (settings.limit != 0 && counter >= settings.limit){
					return false;
				};

				var master = $(rel+":first");
				var parent = $(master).parent();
				//var masterSelect = master.find("select[class*='select2-hidden-accessible']").not(".hidden").select2("destroy");
				var clone = $(master).clone(true).addClass(settings.copyClass+counter).append(settings.append);

				//Remove Elements with excludeSelector
				if (settings.excludeSelector){
					$(clone).find(settings.excludeSelector).remove();
				};

				//Empty Elements with emptySelector
				if (settings.emptySelector){
					$(clone).find(settings.emptySelector).empty();
				};

				// Increment Clone IDs
				if ( $(clone).attr('id') ){
					var newid = $(clone).attr('id') + counter;
					$(clone).attr('id', newid);
				};

				
// Increment Clone Names
				// if ( $(clone).attr('name') ){
				// 	var newid = $(clone).attr('name') + counter;
				// 	$(clone).attr('name', newid);
				// };
				// Increment Clone Children IDs
				$(clone).find('[id]').each(function(){
					var newid = $(this).attr('id') + counter;
					$(this).attr('id', newid);
				});

				// Increment Clone Children Names
				$(clone).find('[name]').each(function(){
 					var newid = $(this).attr('name').split('[]')[0]+ "[" + counter + "]";
					// var newid = $(this).attr('name').split('[]')[0]+  counter ;
					$(this).attr('name', newid);
				});

				$(clone).find("td[class*='remove']").html('');
				// Increment Clone Serial
				$(clone).find("[class*='remove']").each(function(){
					if( $(clone).hasClass("sale") ){
						var removeLink = '<a class="remove text-danger" href="#" onclick="$(this).parent().slideUp(function(){ $(this).parent().remove(); calculatSaleAmount(); checkCustomerAmount(); }); return false"><span class="far fa-2x fa-times-circle"></span></a>';
					}else{
						var removeLink = '<a class="remove text-danger" href="#" onclick="$(this).parent().slideUp(function(){ $(this).parent().remove() }); return false"><span class="far fa-2x fa-times-circle"></span></a>';
					}
					$(this).append(removeLink);
				});

				//Clear Inputs/Textarea
				if (settings.clearInputs){
					$(clone).find(':input').each(function(){
						var type = $(this).attr('type');
						switch(type){
							case "button":
								break;
							case "reset":
								break;
							case "submit":
								break;
							case "hidden":
								$(this).val("");
								break;
							case "text":
								$(this).val("");
								break;
							case "number":
								$(this).val("");
								break;
							case "date":
								$(this).val("");
								break;
							case "file":
								$(this).val("");
								break;
							case "checkbox":
								$(this).attr('checked', '');
								break;
							default:
							  //$(this).val("");
						}
					});
					/*$(clone).find("select.select2 option:selected").each(function(){
						$(this).removeAttr('selected');
					});*/
				};
				$(parent).find(rel+':last').after(clone);

				// Bind Select2
				/*$(clone).find("select[class*='select2']").each(function(){
					
					$(this).not(".hidden").select2({width:"100%"});
					masterSelect.select2({width:"100%",
					tokenSeparators: [",", " "]
				});
				});*/
				
				//image folder link
				// Bind Select2
				$(clone).find("[id*='imagecopy']").each(function(){
				    var newid = $(this).attr('id');
				    if(newid != 'imagecopy'){
				      $("#"+newid).hide();  
				    }
				});

				return false;
			}); // end click action
		}); //end each loop
		return this; // return to jQuery
	};
})(jQuery);