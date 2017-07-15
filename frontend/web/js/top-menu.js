$("#top-menu").click(function(){
	
	var window_height = $(window).height();
		menu_height = $('.nav-asignaturas').height();
		last = 'none';
		current ='';
		asignatura = $(".asignatura");

	$('.nav-left').css({'height': 'calc('+window_height+'px - 50px)', 'transition':'0.5s ease-in all'});
	$('.nav-right').css({'height': 'calc('+window_height+'px - 50px)', 'transition':'0.5s ease-in all'});
	if (menu_height	== 0){
	$('.nav-asignaturas').css({'height': window_height+'px', 'transition':'0.5s ease-in all', 'background':'white'});
	}
	else
	{	
		$('.nav-asignaturas').css({'height': '0px', 'transition':'0.5s ease-in all','background':'transparent'});
	}
	asignatura.mouseenter(function () {
		current = $(this).attr('menu-filter');
		$('.nav-right').addClass('sub-'+current+'');
		if(last == ''){
			$('.nav-asignaturas .sub-'+current+'').removeClass('opacity-0 hidden');
			$('.nav-asignaturas .sub-'+current+'').addClass('active');
			$('.nav-asignaturas .'+current+'').addClass('color-white sub-'+current+'')
		}
		if (current != last ){
			$('.nav-right').addClass('sub-'+current+'');
			$('.nav-right').removeClass('sub-'+last+'');
			$('.sub-'+last).removeClass('active');
			$('.nav-asignaturas .'+last+'').removeClass('color-white sub-'+last+'');
			$('.nav-asignaturas .sub-'+last+'').addClass('hidden');
			$('.nav-asignaturas .sub-'+current+'').removeClass('opacity-0 hidden');
			$('.nav-asignaturas .sub-'+current+'').addClass('active');
			$('.nav-asignaturas .'+current+'').addClass('color-white sub-'+current+'')
		}
	}).mouseleave(function(){
		last = current;
	});
});






