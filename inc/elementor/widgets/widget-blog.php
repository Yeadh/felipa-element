<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class thegncy_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'thegncy' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'thegncy-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'thegncy' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'thegncy' ),
               'DESC' => __( 'Descending', 'thegncy' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>

      <div class="container">
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post();
               ?>
               <!-- blog -->
               <div class="col-lg-4 col-sm-6">
                  <div class="blog-item">
                     <div class="blog-item-img">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'thegncy-360-200'); ?>" alt="<?php the_title() ?>">
                     </div>
                     
                     <div class="blog-item-content">
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <i class="icon_profile"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="link"><?php the_author(); ?></a>
                           </li>
                           <li class="list-inline-item">
                              <i class="icon_folder-open_alt"></i><?php the_category( ',' ) ?>
                           </li>
                        </ul>
                        <a href="<?php the_permalink() ?>"><h5><?php echo wp_trim_words( get_the_title(), 8, '...' );?></h5></a>
                        <p><?php echo felipa_excerpt(10) ?></p>
                        <a class="felipa-btn" href="<?php the_permalink(); ?>"><?php echo esc_html( 'Read More' ); ?></a>
                     </div>
                  </div>
               </div>
               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new thegncy_Widget_Blog );