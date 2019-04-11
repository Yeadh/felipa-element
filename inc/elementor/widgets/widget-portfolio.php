<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// portfolio
class felipa_Widget_Portfolio extends Widget_Base {
 
   public function get_name() {
      return 'portfolio';
   }
 
   public function get_title() {
      return esc_html__( 'Portfolio', 'felipa' );
   }
 
   public function get_icon() { 
        return 'eicon-gallery-masonry';
   }
 
   public function get_categories() {
      return [ 'felipa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'portfolio_section',
         [
            'label' => esc_html__( 'Portfolio', 'felipa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Style', 'felipa' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'one',
            'options' => [
               'one'  => __( 'One', 'felipa' ),
               'two' => __( 'Two', 'felipa' )
            ],
         ]
      );

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Projects',
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Check our portfolios',
         ]
      );

      $this->add_control(
         'deacription',
         [
            'label' => __( 'Deacription', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incidid ut labore et dolore',
         ]
      );

      $this->add_control(
         'ppp',
         [
            'label' => __( 'Number of Portfolio', 'felipa' ),
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

      $this->add_control(
         'view-all-url',
         [
            'label' => __( 'View all url', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
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
      <?php if ($settings['style']  == 'one') { ?>
      <div class="container-fluid" style="padding: 0; overflow: hidden;">
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
      </div>

      <?php } elseif ($settings['style']  == 'two') {?>

         
      <div class="portfolio-container">
         <?php if ('two' == $settings['style']  ): ?>
         <div class="row swiper-title">
            <div class="col-md-3">
               <div class="section-title color" style="text-align: left">
                 <span><?php echo esc_html( $settings['sub-title'] ); ?></span>
                 <h1><?php echo esc_html( $settings['title'] ); ?></h1>
              </div>
            </div>
            <div class="col-md-4">
               <div class="swiper-pagination"></div>
            </div>
            <div class="col-md-2">
               <div class="felipa-btn">
                  <a href="<?php echo esc_url( $settings['view-all-url'] ); ?>">View gallery</a>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <div class="portfolio-2 swiper-wrapper">
            <?php
            $portfolio = new \WP_Query( array(
            'post_type' => 'portfolio',
            'posts_per_page' => $settings['ppp']['size']
            ));
            /* Start the Loop */
            while ( $portfolio->have_posts() ) : $portfolio->the_post();
            $portfolio_terms = get_the_terms( get_the_ID() , 'portfolio_category' );
            ?>

            <div class="portfolio-item-2 swiper-slide">
               <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('felipa-470-375'); ?>
                  <h5><?php echo wp_trim_words( get_the_title(), 3, '...' );?></h5>
               </a>
            </div>

            <?php endwhile; wp_reset_postdata(); ?> 
         </div>
      </div>
     <?php } ?>

   
      <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new felipa_Widget_Portfolio );