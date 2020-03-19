<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>

<br><br><br><br>
<div id="owl-example" class="owl-carousel">
  <div><img src="//placehold.it/300x300/936/c69/?text=1" alt=""></div>
  <div><img src="//placehold.it/300x300/693/9c6/?text=2" alt=""></div>
  <div><img src="//placehold.it/300x300/369/69c/?text=3" alt=""></div>
  <div><img src="//placehold.it/300x300/c33/f66/?text=4" alt=""></div>
  <div><img src="//placehold.it/300x300/099/3cc/?text=5" alt=""></div>
  <div><img src="//placehold.it/300x300/f93/fc6/?text=6" alt=""></div>
</div>

<style>
.owl-buttons {
  display: none;
}
.owl-carousel:hover .owl-buttons {
  display: block;
}

.owl-item {
  text-align: center;
}

.owl-theme .owl-controls .owl-buttons div {
  background: transparent;
  color: #869791;
  font-size: 40px;
  line-height: 300px;
  margin: 0;
  padding: 0 60px;
  position: absolute;
  top: 0;
}
.owl-theme .owl-controls .owl-buttons .owl-prev {
  left: 0;
  padding-left: 20px;
}
.owl-theme .owl-controls .owl-buttons .owl-next {
  right: 0;
  padding-right: 20px;
}

</style>

<script>
$(document).ready(function() {
 
  $("#owl-example").owlCarousel({
	  autoPlay:3000,
	  stopOnHover:true,
	  loop: true,
	  dots: true,
      itemsDesktop : [1499,4],
      itemsDesktopSmall : [1199,3],
      itemsTablet : [899,2],
      itemsMobile : [599,1],
      navigation : true,	 
      navigationText : ['<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i></span>','<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i></span>'],
  });
 //$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 // $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
});

</script>




<!----------------

http://www.landmarkmlp.com/js-plugin/owl.carousel/
https://codepen.io/glebkema/pen/GqbWYd

google==options and callback functions in owl carousel

https://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html
https://owlcarousel2.github.io/OwlCarousel2/docs/api-classes.html
https://owlcarousel2.github.io/OwlCarousel2/docs/api-events.html
https://stackoverflow.com/questions/57528799/owl-carousel-how-to-use-callback-function-values
https://codepen.io/enovo/pen/hmHal
https://stackoverflow.com/questions/25833834/owl-carousel-2-beta-jump-to-a-specific-slide


http://www.landmarkmlp.com/js-plugin/owl.carousel/
http://www.landmarkmlp.com/js-plugin/owl.carousel/demos/custom.html
http://web.spms.ntu.edu.sg/MakingTinkering/admin/assets/global/plugins/carousel-owl-carousel/
http://web.spms.ntu.edu.sg/MakingTinkering/admin/assets/global/plugins/carousel-owl-carousel/demos/custom.html

google==destroy owl carousel

<script>
		$(document).ready(function() {
			$('.owl-carousel').owlCarousel({
				items: 1,
				loop: true,
				autoplay: true,
				onChanged: function (event) {
				  setTimeout(function(){
				  $('.slider').find('.active').addClass('animate').siblings().removeClass('animate')
				  }, 500);
				}
				
			});
		});
	</script>



--->
