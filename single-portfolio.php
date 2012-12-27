<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="eightcol first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						    <header class="article-header">
							
							    <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
							
						    </header> <!-- end article header -->
					
						    <section class="entry-content clearfix">
							
							    <?php
							    	if (has_post_thumbnail()) {
							    		$pimg = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
							    		$purl = (get_post_meta(get_the_ID(), 'url', true)) ? get_post_meta(get_the_ID(), 'url', true) : false;
							    		echo ($purl) ? '<a href="'.$purl.'"><img src="'.$pimg[0].'" class="attachment-medium wp-post-image float-right" /></a>' : '<img src="'.$pimg[0].'" class="attachment-medium wp-post-image float-right" />';
							    	}
							    ?>
							    
							    <?php the_content(); ?>
					
						    </section> <!-- end article section -->
						
						    <footer class="article-header">
			
							    <p class="byline vcard"><?php _e("Posted", "bonestheme"); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <span class="author"><?php the_author_posts_link(); ?></span> <span class="amp">&amp;</span> <?php _e("filed under", "bonestheme"); ?> <?php echo get_the_term_list( get_the_ID(), 'portfolio_tag', "", ", " ) ?>.</p>
						
						    </footer> <!-- end article footer -->
						
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>
					
					    <?php else : ?>
					
        					<article id="post-not-found" class="hentry clearfix">
        						<header class="article-header">
        							<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
        						</header>
        						<section class="entry-content">
        							<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
        						</section>
        						<footer class="article-footer">
        						    <p><?php _e("This is the error message in the single-custom_type.php template.", "bonestheme"); ?></p>
        						</footer>
        					</article>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>