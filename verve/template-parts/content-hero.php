<?php 
	$hero_image = get_field('hero_image');
	$hero_captions = get_field('hero_captions');
	$hero_placement = get_field('captions_placement');
	$hero_color = get_field('bg_colour');
?>
<div class="hero" style="background-image: url('<?php echo $hero_image; ?>'); background-color:<?php echo $hero_color; ?>;">
    <div class="hero-inner">
        <div class="captions <?php echo $hero_placement; ?>">
            <?php echo $hero_captions; ?>
        </div>
    </div>
</div>