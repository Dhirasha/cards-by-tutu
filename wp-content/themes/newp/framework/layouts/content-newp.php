<?php
/**
 * @package Newp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-sm-4 newp'); ?>>
	<div class="newp-wrapper">	
		<div class="featured-thumb">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('newp-pop-thumb',array('alt' => trim(strip_tags( $post->post_title )))); ?></a>
            <?php else: ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
            <?php endif; ?>		</div><!--.featured-thumb-->

		<div class="out-thumb">
			<header class="entry-header">
				<h3 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<span class="entry-excerpt"><?php the_excerpt(); ?></span>
			</header><!-- .entry-header -->
		</div><!--.out-thumb-->		
	</div>	
		
</article><!-- #post-## -->