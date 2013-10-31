
<?php get_header(); ?>
<div id="main_container">
    	<p class="work">LATEST WORK</p>
    	<hr />
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<div class="story_summary">
			<h2 class="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<div class="summary">
				<?php the_excerpt(); ?>
			</div>

			<footer class="story_footer">
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
				Posted in <?php the_category(', ') ?> | 
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
			</footer>
           </div> 
            <div class="teaser">
	<?php
		if ( has_post_thumbnail() ) {
		the_post_thumbnail();
		} else {
	}
?>
</div>
		</article>
        
	<?php endwhile; ?>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?>
    
<hr class="invisible" />
<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>
<hr />
<?php get_footer(); ?>
