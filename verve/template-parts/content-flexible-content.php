<?php

// check if the flexible content field has rows of data
if( have_rows('create_layout') ):
     // loop through the rows of data
    while ( have_rows('create_layout') ) : the_row();
        if( get_row_layout() == 'callout' ):
        	echo '
	        	<section class="callout large-padding text-center '.get_sub_field('section_colour').'">
		            <div class="container">
		                '.get_sub_field('content').'
		            </div>
		        </section>
	        ';
        elseif( get_row_layout() == 'full_width' ): 
        	echo '
	        	<section class="'.get_sub_field('section_colour').'">
		            <div class="container">
		                '.get_sub_field('content').'
		            </div>
		        </section>
	        ';
	    elseif( get_row_layout() == 'full_width' ): 
        	echo '
	        	<section class="'.get_sub_field('section_colour').' large-padding">
		            <div class="container">
		                '.get_sub_field('content').'
		            </div>
		        </section>
	        ';
	    elseif( get_row_layout() == 'two_columns' ): 
        	echo '
	        	<section class="'.get_sub_field('section_colour').'">
		            <div class="container">
		            	<div class="row">
		            		<div class="columns six">'.get_sub_field('left_content').'</div>
			                <div class="columns six">'.get_sub_field('right_content').'</div>
			            </div>
		            </div>
		        </section>
	        ';

	    elseif( get_row_layout() == 'button_section' ): 
        	echo '
	        	<section class="blue-border">
		            <div class="container">
		                <h2>Find out more about our Equality act guidance and services</h2>
		                <div class="row">
		                    <button class="four columns">Equalities impact assessments</button>
		                    <button class="four columns">Engaging communities</button>
		                    <button class="four columns">Consultation equalities duty</button>
		                </div>
		            </div>
		        </section>
	        ';

	    elseif( get_row_layout() == 'video_section' ): 
        	echo '
	        	<section class="large-padding">
			            <div class="container">
			                <div class="videoWrapper">
			                    '.get_sub_field('video_embed').'
			                </div>
			            </div>
			        </section>
	        ';

        endif;
    endwhile;
endif;

?>