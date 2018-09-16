
;(function($) {

	$('.viktor-tab-nav a').on('click',function (e) {
		e.preventDefault();
		$(this).addClass('active').siblings().removeClass('active');
	});

	$('.viktor-tab-nav .begin').on('click',function (e) {		
		$('.viktor-tab-wrapper .begin').addClass('show').siblings().removeClass('show');
	});	
	$('.viktor-tab-nav .actions, .viktor-tab .actions').on('click',function (e) {		
		e.preventDefault();
		$('.viktor-tab-wrapper .actions').addClass('show').siblings().removeClass('show');

		$('.viktor-tab-nav a.actions').addClass('active').siblings().removeClass('active');

	});	
	$('.viktor-tab-nav .support').on('click',function (e) {		
		$('.viktor-tab-wrapper .support').addClass('show').siblings().removeClass('show');
	});	
	$('.viktor-tab-nav .table').on('click',function (e) {		
		$('.viktor-tab-wrapper .table').addClass('show').siblings().removeClass('show');
	});	


	$('.viktor-tab-wrapper .install-now').on('click',function (e) {	
		$(this).replaceWith('<p style="color:#23d423;font-style:italic;font-size:14px;">Plugin installed and active!</p>');
	});	
	$('.viktor-tab-wrapper .install-now.importer-install').on('click',function (e) {	
		$('.importer-button').show();
	});	


})(jQuery);
