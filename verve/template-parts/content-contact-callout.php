<section class="green-panel">
    <div class="container callout text-center">
        <h2 class="section-title">Get in touch</h2>
        <p>We'd love to hear from you</p>
        <?php 
        	if(have_rows('socials', 'options')){
        		while (have_rows('socials', 'options')) {
        			the_row();
        			echo '
	        			<a href="'.get_sub_field("link").'" class="social" style="background-image: url( '.get_sub_field("image").');"></a>
	        		';
        		}
        	}
        ?>
        <!-- <a href="javascript:void(0);" class="social" style="background-image: url('img/facebook.png');"></a>
        <a href="javascript:void(0);" class="social" style="background-image: url('img/twitter.png');"></a>
        <a href="javascript:void(0);" class="social" style="background-image: url('img/linkedin.png');"></a> -->
    </div>
</section>