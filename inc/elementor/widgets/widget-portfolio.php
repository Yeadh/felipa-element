<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// portfolio
class thegncy_Widget_Portfolio extends Widget_Base {
 
   public function get_name() {
      return 'portfolio';
   }
 
   public function get_title() {
      return esc_html__( 'Portfolio', 'thegncy' );
   }
 
   public function get_icon() { 
        return 'eicon-gallery-masonry';
   }
 
   public function get_categories() {
      return [ 'thegncy-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'portfolio_section',
         [
            'label' => esc_html__( 'Portfolio', 'thegncy' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Style', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'slider',
            'options' => [
               'slider'  => __( 'Slider', 'thegncy' ),
               'masonry' => __( 'Masonry', 'thegncy' )
            ],
         ]
      );

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Title', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'CASE STUDIES',
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Latest portfolios',
         ]
      );

      $this->add_control(
         'deacription',
         [
            'label' => __( 'Deacription', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incidid ut labore et dolore',
         ]
      );

      $this->add_control(
         'ppp',
         [
            'label' => __( 'Number of Portfolio', 'thegncy' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
               'no' => [
                  'min' => 0,
                  'max' => 100,
                  'step' => 1,
               ],
            ],
            'default' => [
               'size' => 5,
            ]
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      $this->add_inline_editing_attributes( 'sub-title', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'deacription', 'basic' );
      ?>

      <section class="portfolio-sec">
         <div class="portfolio">
         <?php
         $portfolio = new \WP_Query( array(
         'post_type' => 'portfolio',
         'posts_per_page' => $settings['ppp']['size']
         ));
         /* Start the Loop */
         while ( $portfolio->have_posts() ) : $portfolio->the_post();
         $portfolio_terms = get_the_terms( get_the_ID() , 'portfolio_category' );
         ?>

         <div class="portfolio-item">
             <?php the_post_thumbnail( 'felipa-475-540' ) ?>
             <span><?php foreach ($portfolio_terms as $portfolio_term) { echo esc_attr( $portfolio_term->name ); } ?></span>
             <a href="<?php the_permalink(); ?>"><h5><?php echo wp_trim_words( get_the_title(), 3, '...' );?></h5></a>
         </div>

         <?php endwhile; wp_reset_postdata(); ?>
                     
         </div>
      </section>

      <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new thegncy_Widget_Portfolio );