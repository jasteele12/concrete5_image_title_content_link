(function(){
	
	var takeCallback = function(name, fn){
			var orig = window[name];
			fn.releaseCallback = orig;
			window[name] = fn;		
		},
		releaseCallback = function(name){
			window[name] = window[name].releaseCallback;
		};
	
	
	$.fn.ccmImageTitleContentLinkBlockEditor = function(options){
		var $editor = $(this);
		if($.fn.typeahead){
			$editor.find('[name=css_class]').typeahead({source: options.cssClassHints});
		}
		console.log(options);
	
		function showTab(pane){
			pane = pane.replace(/^#/, '');
			$editor.find('.ccm-dialog-tabs li').removeClass('ccm-nav-active').filter(':has(a[href="#'+pane+'"])').addClass('ccm-nav-active');
			$editor.children('div').hide().removeClass('ccm-nav-active');
			$editor.children('div#'+pane).show().addClass('ccm-nav-active');
		}
		$editor.on('click', '.ccm-dialog-tabs a[href^="#"]', function(evt){
			evt.preventDefault();
			showTab(this.hash);
		});
		$editor.find('.ccm-dialog-tabs a:first').click();
	
		return this;
	};
	
	

}).call(this);