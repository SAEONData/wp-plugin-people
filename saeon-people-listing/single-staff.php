<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>
xxx
<section class="sn-post-header">
    <div class="news-widget-heading">
    <!-- Image START  -->
    <div  href="<?php the_permalink(); ?>" class="sn-post-image" 
			<?php if (has_post_thumbnail()) { ?>
				style="background-image:url(<?php the_post_thumbnail_url(); ?>)"
           <?php } else { ?>

			<?php } ?>
			
			>

		   </div>
    <!-- Image START  -->   
        <h1 class="news-heading-title"><?php the_title(); ?></h1>
    </div>
    <small class="post-meta">
        <span class="post-date"><?php echo get_the_date(); ?></span> | 
        <span class="post-cat"><?php 
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
        }
        ?></span> <?php
        $posttags = get_the_tags();
        if ($posttags) {
          foreach($posttags as $tag) {
            echo $tag->name . ' '; 
          }
        }
        ?>
    </small>
</section>
  
     <?php the_content(); ?>
     <?php comments_template( $file, $separate_comments ); ?>


<?php
get_footer();
