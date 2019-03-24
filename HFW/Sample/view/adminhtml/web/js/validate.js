require([
    "jquery"
], function ($) {
	rulePattern = {
		'alphanum': /^[a-zA-Z0-9]*$/,
		'alpha': /^[a-zA-Z]*$/,
		'number': /^\s*-?\d*(\.\d*)?\s*$/,
		'numberInt': /^\d+$/,
		'numberFloat': /^\d+(\.\d{1,2})?$/,
		'email': /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/,
		'phone': /[0|\+][0-9]+/,
		'postalCode': /[0-9]{2}[\-][0-9]{3}/,
		'accountNumber': /[A-Za-z0-9]{6}/,
		'invoiceNumber': /^[^-\s][\w\s-]+$/,
		'invoiceAmount': /^[0-9]+\.?[0-9]*$/,
		'validateNull': /[\D\p{L}]+$/,
		'address': /[\s\p{L}]*$/,
		'date': /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/
	};
    window.hafuwitSampleValidate = function(formId, message, callback){
		showMessage = function(type){
			clearMessage();
			$('#container').prepend('<div id="messages"><div class="messages"><div class="message message-'+type+' '+type+'"><div data-ui-id="messages-message-'+type+'">'+message+'</div></div></div></div>');
		};
		clearMessage = function(){
			$('#messages').remove();
		};
		makeBorderRed = function(element){
			element.addClass('admin__field-error').css({background: "none"});
        };
        clearBorderRed = function(element){
			element.removeClass('admin__field-error');
		}
		clearBorderRedAll = function(){
			$('.admin__field-error').removeClass('admin__field-error');
		}
		$(formId).submit(function(){
			error = 0;
			errorElement = [];
			clearBorderRedAll();
			$(formId).find('input, select, textarea').each(function(){
				element = $(this);
				dataValidate = element.attr('data-validate');
				idElement = element.attr('id');
				if(typeof dataValidate !== 'undefined'){
					dataValidate = dataValidate.replace(/'/g, '"');
					objectValidate = JSON.parse(dataValidate);
					$.each(objectValidate, function(key, value){
						v = element.val();
						if(v.length > v.trim().length){
							error++;
							makeBorderRed(element);
							errorElement.push(idElement);
						}
						switch(key){
							case "required":
								if(typeof value === 'boolean' && value == true && v == ''){
									error++;
									makeBorderRed(element);
									errorElement.push(idElement);
								}
							break;
							case "validate-pattern":
								if(typeof value === 'string' && value != ''){
									re = new RegExp(value);
									if(!re.test(v)){
										error++;
										makeBorderRed(element);
										errorElement.push(idElement);
									}
								}
							break;
							case "validate-rule":
								if(typeof value === 'string' && value != ''){
									if(!rulePattern[value].test(v)){
										error++;
										makeBorderRed(element);
										errorElement.push(idElement);
									}
								}
							break;
							case "required-if-specified":
								if(typeof value === 'string' && value != ''){
									if($(value).val().length > 0){
										error++;
										makeBorderRed(element);
										errorElement.push(idElement);
									}
								}
							break;
							case "validate-min-max":
								if(typeof value === 'string' && value != ''){
									numberMinMax = value.split("-");
									v = parseFloat(v);
									if(v > numberMinMax[1] || v < numberMinMax[0]){
										error++;
										makeBorderRed(element);
										errorElement.push(idElement);
									}
								}
							break;
						}
					});
				}
            });
			if(typeof callback === 'function'){
				onlyUnique = function (value, index, self) {
					return self.indexOf(value) === index;
				}
				callback(error, errorElement.filter( onlyUnique ));
			}
			if(!error){
				clearMessage();
				return true;
			}
			showMessage('error');
			return false;
        });
    }
});
