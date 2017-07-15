<?php do_action( 'main_bottom' ); ?>
<footer class="main-footer">
  <div class="container">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <h3>About Us</h3>
      <img src="./dist/img/logo-white.png" alt="rdl logo-white" style="max-width: 200px">
      <h5>Established in 2014</h5>
      <p>RDL Energy is an onshore oil & gas exploitation & production based in Houston, TX.</p>
      <a href="./about.php" class="learnmore strong">Learn More</a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <h3 class="blue">Contact Us </h3>
      <div class="full-row">
        <table>
          <tbody>
            <tr>
              <td>
                <div class="fa fa-map-marker"></div>
              </td>
              <td>
                2418 N Frazier St, <br> Conroe, TX 77303, USA
              </td>
            </tr>
            <tr>
              <td>
                <div class="fa fa-phone"></div>
              </td>
              <td>
                <a href="tel:+18682329065">+1 (868) 232-9065</a>
              </td>
            </tr>
            <tr>
              <td>
                <div class="fa fa-envelope"></div>
              </td>
              <td>
                <a href="mailto:info@rdlenergy.com" class="green">info@rdlenergy.com</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <h3 class="blue">Follow Us </h3>
      <a href="https://www.linkedin.com/company-beta/15258484/"><div class="fa fa-linkedin big-icon"></div></a> <!--a href="#"><div class="fa fa-twitter big-icon"></div> </a><a href="#"><div class="fa fa-linkedin big-icon"></div></a-->
    </div>
  </div>
  <div class="full-row  secundary-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; <?= date("Y")?> <a href="http://behance.net/magolujo">Luis Marquez</a>.</strong> All rights
      reserved.
    </div>
  </div>
</footer>
</div>
</div><!-- .overflow-container -->

<?php do_action( 'body_bottom' ); ?>

<?php wp_footer(); ?>
<!--? include(WP_CONTENT_URL. '/themes/tmc - founder/style.css');
?-->
<script>
var $ = jQuery.noConflict();

 $('.owl-carousel').owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    touchDrag  : true,
    mouseDrag  : false,
    responsiveClass:true,
    responsive:{
      0:{
        items:1,
        nav: true
      },

      1024: {
        items: 3,
        nav: true
      },
      1200:{
        items:3,
        nav: true
      }
    }
  })


$(".link").mouseenter(function(){
    var post_id = $(this).attr('id');
    var post_attrib = $(this).attr('data-icon');
    $('#thumb-'+post_id)
    .before('<div class="hovericon" id="icon-'+post_id+'"><h3 class="fa fa-'+$(this).attr('data-icon')+' full-row text-center white icon"></h3><h6 class="learnmore full-row text-center white"> Read More </h6></div>')
}).mouseleave(function(){
    var post_id = $(this).attr('id');
    $( "#icon-"+post_id).remove();
});
$('a[href^="#"]').on('click',function (e) {
    e.preventDefault();
    var target = this.hash;
    var dataHash = $(this).attr("data-hash");
    $(this).addClass('current');
    $target = $(target);
    $('html, body').stop().animate({
        'scrollTop':  $target.offset().top
    }, 900, 'swing', function () {
        window.location.hash = target;  
    });
});

  $( window).load(fixheight);
  $( window).resize(fixheight);

  $( window).load(fixheightRatio);
  $( window).resize(fixheightRatio);

  $( window).load(imgResponsive);
  $( window).resize(imgResponsive);

 

  function fixheight(){
    var i=1;
    var numElem = $('.fix-height').size();
    var height_max = 0;
    var height_s = 0;

    for (i; i<= numElem; i=i+1){
      var divID = 'fix-height-'+i;
      height_s = $('#'+divID).outerHeight();
      if (height_s > height_max) {
        height_max = height_s;
      };

    };
    i=0;
    for(i=0; i<= numElem; i=i+1){
      /*if( $(window).width() < 992){
        $('.fix-height-'+i + '.auto').css({'height': 'auto', 'transition' : 'ease 0.3s all'});
      }else{*/
        $('.fix-height-'+i).css({'min-height': height_max+'px',  'transition' : 'ease 0.3s all'});
      /*}*/

    }
  }

  function fixheightRatio(){  
    var windowHeight = $('.ratio16-9.full-cover').height()
    if ($(window).width() > 992){
      $('.fix-height-ratio').css({'height': windowHeight+'px',  'transition' : 'ease 0.3s all'});
    }else{
      $('.fix-height-ratio').css({'height': 'auto',  'transition' : 'ease 0.3s all'});
      $('.ratio16-9.full-cover').addClass('ratio16-9-relative');
    }
  }

  function imgResponsive(){
    var imgWidth = $('.img-responsive').width();
    var imgHeight = $('.img-responsive').height();
    if( imgWidth < imgHeight ){
      if ($(window).width() > 480 && $(window).width() < 1024){
        $('.img-responsive').addClass('img-responsive-height')
        var imgWidth = $('.img-responsive').width();
        $('.flipper .front .widget-user-header').css({'left' : imgWidth})
      }else{
        $('.flipper .front .widget-user-header').css({'left' : '0px'})
        $('.img-responsive').removeClass('img-responsive-height')
      }
    }
  }

jQuery(document).ready(function(e) {
    var load_element = 0;

    //position of element
    var scroll_position_slideInRight = jQuery('#slideInRight').offset().top;

    var scroll_position_slideInUp = jQuery('#slideInUp').offset().top;

    var scroll_position_flash = jQuery('#flash').offset().top;

    var scroll_position_swing = jQuery('#swing').offset().top;
    

    var screen_height = jQuery(window).height();
    var activation_offset = -200;
    var max_scroll_height = jQuery('body').height() + screen_height;
    

    jQuery(window).on('scroll', function(e) {
        var y_scroll_pos = window.pageYOffset;
        
        var has_reached_bottom_of_page = max_scroll_height <= y_scroll_pos && !element_in_view;

        var scroll_activation_point_slideInRight = scroll_position_slideInRight - (screen_height + activation_offset);

        var element_in_view_slideInRight = y_scroll_pos > scroll_activation_point_slideInRight;

        if (element_in_view_slideInRight) {
                $('#slideInRight').addClass('animated slideInRight')
                $('#slideInRight').removeClass('visible-none')
        }

        var scroll_activation_point_slideInUp = scroll_position_slideInUp - (screen_height + activation_offset);

        var element_in_view_slideInUp = y_scroll_pos > scroll_activation_point_slideInUp;

        if (element_in_view_slideInUp) {
                $('#slideInUp').addClass('animated slideInUp')
                $('#slideInUp').removeClass('visible-none')
        }

        var scroll_activation_point_flash = scroll_position_flash - (screen_height + activation_offset);

        var element_in_view_flash = y_scroll_pos > scroll_activation_point_flash;

        if (element_in_view_flash) {
                $('#flash').addClass('animated flash')
                $('#flash').removeClass('visible-none')
        }

        var scroll_activation_point_swing = scroll_position_swing - (screen_height + activation_offset);

        var element_in_view_swing = y_scroll_pos > scroll_activation_point_swing;

        if (element_in_view_swing) {
                $('#swing').addClass('animated swing')
                $('#swing').removeClass('visible-none')
        } 

    });

});

$ = jQuery.noConflict();
 $( window).load(breadcrumbs);
  $( window).resize(breadcrumbs);


  function breadcrumbs(){

     $(window).scroll(function(){
    var top = $(window).scrollTop();
    var headerHeight = $('#main-header').height();

    $("#main-header").addClass("fixed");
    if ( top >1) {
        if($(window).width() > 1024) {
          $('.post-header').css({'position' : 'fixed', 'top' : '32px'})
          $('.post-content').css({'position' : 'relative', 'margin-top' : '70px'})
        }else{
          $('.post-header').css({'position' : 'fixed', 'top' : '50px'})
          $('.post-content').css({'position' : 'relative', 'margin-top' : '55px'})
        }
    } else {
      $("#main-header").removeClass("fixed");
      $('.post-header').css({'position' : 'relative', 'top' : '0px'})
      $('.post-content').css({'position' : 'relative', 'margin-top' : '0px'})
    }
  })  
  }
$('#carouselFade').carousel();

$('.menu-item-has-children').addClass('dropdown')
$('.menu-item-has-children > a').addClass('dropdown-toggle')
$('.menu-item-has-children > a').attr('data-toggle', 'dropdown')
$('.menu-item-has-children > a').attr('aria-expanded', 'false')
$('.menu-item-has-children > a').attr('href', '#')
$('.page_item_has_children').addClass('dropdown')
</script>

</body>
</html>