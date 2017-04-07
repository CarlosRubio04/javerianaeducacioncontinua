/*---------------------------------------------
 Autor: Esteban Vera
 Twitter : @kiokotzu
 Github : https://github.com/kiokotzu/styleSelect
 Correo : esteban.vg@outlook.com
 Name Plugin: styleSelect.js
 version : 1.0.2
 ---------------------------------------------*/

 $(function(){
	jQuery.fn.styleSelect = function(settings){

		var settingsDefault = jQuery.extend({
			classSelect : 'select',
			classArrow  : 'arrow'
		}, settings);

		this.each(function(){
			var el =  $(this);

			el.wrap(function() {
			  return "<div class='" + settingsDefault.classSelect + "'></div>";
			});

			el.parent('.' + settingsDefault.classSelect).append("<div class='" + settingsDefault.classArrow + "'></div>");

			var textSelect = el.parent('.' + settingsDefault.classSelect).find('option:selected').text();
			el.parent('.' + settingsDefault.classSelect).find('.arrow').text(textSelect);
			var id_arrow='Arrow'+el.attr('id');
			el.parent().children('.arrow').attr('id',id_arrow);
			function select(q){
				value = q.find('option:selected').text();
				q.parent().children('.arrow').text( value.substring(0, 25) );
			}

			el.on('change',function(){
		      select(el);
			});
		});
	}
});
