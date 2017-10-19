<?php
/**
 * Hatch Theme: Home page for site or blog
 * @package WordPress
 * @subpackage Hatch Theme
 * @since 1.0
 */

$detect = new Mobile_Detect;
 
 	// Include framework options
 	$hgr_options = get_option( 'redux_options' );
 
 	// Get metaboxes values from database
 	$this_page_id 			=	esc_attr( get_option('page_for_posts') );
 	$hgr_page_color_scheme	=	esc_attr( get_post_meta( $this_page_id, '_hgr_page_color_scheme', true ) );

	get_header();
 ?>

<?php if( is_home() ) : ?>

		<?php if (get_header_image() != '') : ?>
        <!-- Header Image -->
        <div class="header_image_container"> <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="header image" class="header_image" />
          <div class="headerWelcome">
            <h1>
              <?php bloginfo('name'); ?>
            </h1>
            <h2><a href="#" class="readTheBlogBtn"><?php esc_attr( 'Read the blog', 'hatch' );?></a></h2>
          </div>
        </div>
        <!-- Header Image End -->
        <?php endif;?>

        <!-- blog content front-page.php -->
        <div class="row blogPosts <?php echo esc_attr( (isset($hgr_options['blog_color_scheme']) ? $hgr_options['blog_color_scheme'] : '') );?>" id="blogPosts">
          <div class="container"> 
            <!-- posts -->
            <div class="vc_col-md-9 vc_col-sm-12 vc_col-xs-12">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php 
                $format = get_post_format();
              ?>
              <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                <?php 
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('full', array('class' => 'img-responsive'));
                    } 
                 ?>
                <?php if($format != 'aside') : ?>
                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_html_e('Permanent Link to', 'hatch');?> <?php the_title_attribute(); ?>">
                  <?php the_title(); ?>
                  </a></h1>
                <?php endif;?>
                <small> <span class="highlight"><i class="icon blog-date"></i>
                <?php the_time('F jS, Y') ?>
                </span> <span class="highlight"><i class="icon blog-user"></i>
                <?php esc_html_e('Posted by ', 'hatch');?>
                <?php the_author_posts_link() ?>
                </span> <span class="highlight"><i class="icon blog-category"></i>
                <?php the_category(', '); ?>
                </span> <span class="highlight"><i class="icon blog-comments"></i>
                <?php
                    $comments_number = get_comments_number();
                    if ( 1 === $comments_number ) {
                        /* translators: %s: post title */
                        printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'hatch' ), get_the_title() );
                    } else {
                        printf(
                            /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '%1$s thought on &ldquo;%2$s&rdquo;',
                                '%1$s thoughts on &ldquo;%2$s&rdquo;',
                                $comments_number,
                                'comments title',
                                'hatch'
                            ),
                            number_format_i18n( $comments_number ),
                            get_the_title()
                        );
                    }
                ?>
                </span> </small>
                <div class="entry">
                  <?php if(has_excerpt()) : ?>
                  <?php the_excerpt(); ?>
                  <?php else : ?>
                  <?php the_content(); ?>
                  <?php endif;?>
                </div>
                <div class="entry-meta">
                  <?php the_tags(); ?>
                </div>
              </div>
              <?php endwhile; ?>
              
              	<?php
					$prev_link = get_previous_posts_link( esc_html__('&larr; Previous', 'hatch') );
					$next_link = get_next_posts_link( esc_html__('Next &rarr;', 'hatch') );
					if ($prev_link || $next_link) : ?>
					  <div class="navigation">
						<div class="alignleft">
						  <?php echo( !empty($prev_link) ? $prev_link : '' ); ?>
						</div>
						<div class="alignright">
						  <?php echo ( !empty($next_link) ? $next_link : ''); ?>
						</div>
					  </div>
				<?php endif;?>
      

       
              
              <?php else: ?>
              <p>
                <?php esc_html_e('Sorry, no posts matched your criteria.', 'hatch'); ?>
              </p>
              <?php endif; ?>
              <?php wp_reset_postdata();?>
            </div>
            <!-- / posts --> 
            
            <!-- sidebar -->
            <div class="vc_col-md-3 vc_col-sm-12 vc_col-xs-12">
              <?php 
                get_sidebar();
             ?>
            </div>
            <!-- / sidebar --> 
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- blog content end -->

<?php else : ?>

<!-- Site home page -->

<?php while ( have_posts() ) : the_post(); ?>

<?php
// Get metaboxes values from database
	$hgr_page_bgcolor			=	get_post_meta( get_the_ID(), '_hgr_page_bgcolor', true );
	$hgr_page_top_padding		=	get_post_meta( get_the_ID(), '_hgr_page_top_padding', true );
	$hgr_page_btm_padding		=	get_post_meta( get_the_ID(), '_hgr_page_btm_padding', true );
	$hgr_page_color_scheme		=	get_post_meta( get_the_ID(), '_hgr_page_color_scheme', true );
	$hgr_page_height			=	get_post_meta( get_the_ID(), '_hgr_page_height', true );
	
	$page_offset			= ( isset($hgr_options['page_top_offset']['height']) && ( !$detect->isMobile() ) ? $hgr_options['page_top_offset']['height'] : '0');
	
	
	// Does this page have a featured image to be used as row background with paralax?!
 	$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( 5600,1000 ), false, '' );

 	if( !empty($src[0]) ) {
		$parallaxImageUrl =	" background-image:url('".$src[0]."'); ";
		$parallaxClass		=	' parallax ';
		$backgroundColor	=	'';
	} elseif( !empty($hgr_page_bgcolor) ) {
		$parallaxImageUrl =	'';
		$parallaxClass		=	' ';
		$backgroundColor	=	' background-color:'.$hgr_page_bgcolor.'!important; ';
	}else {
		$parallaxImageUrl =	'';
		$parallaxClass		=	'';
		$backgroundColor	=	'';
	}
 ?>
 <video autoplay loop muted><source type="video/mp4" src="/wp-content/assets/video/fantasy.mp4"></source></video>
 <div class="pagesection row <?php echo esc_attr($parallaxClass);?> <?php echo esc_attr($hgr_page_color_scheme);?>"  style=" <?php echo esc_attr($parallaxImageUrl);?> <?php echo esc_attr($backgroundColor);?> <?php echo ( !empty($hgr_page_height) ? ' height:'.esc_attr($hgr_page_height).'px!important; ' : '');?> <?php echo ( !empty($hgr_page_top_padding) ? ' padding-top:'.esc_attr($hgr_page_top_padding).'px!important;' : '' );?> <?php echo ( !empty($hgr_page_btm_padding) ? ' padding-bottom:'.esc_attr($hgr_page_btm_padding).'px!important;' : '' );?> ">
  <div class="vc_col-md-12" <?php echo ( isset($page_offset) && $page_offset	!= 0 && $hgr_options['header_floating'] == '6' ? 'style="margin-top:'.$page_offset	.';"' : '');?> >
    <div class="">
      <div class="slideContent gu12">
        <?php the_content(); ?>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
</div>
<?php endwhile; ?>





<?php endif;?>
<?php 
 	get_footer();
 ?>
