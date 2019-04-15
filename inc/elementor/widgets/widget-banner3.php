<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class felipa_Widget_Banner3 extends Widget_Base {
 
   public function get_name() {
      return 'banner3';
   }
 
   public function get_title() {
      return esc_html__( 'Banner 3', 'felipa' );
   }
 
   public function get_icon() { 
        return 'eicon-fb-feed';
   }
 
   public function get_categories() {
      return [ 'felipa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_3',
         [
            'label' => esc_html__( 'Banner 3', 'felipa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Choose banner background image', 'felipa' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
      'banner_vector',
        [
          'label' => __( 'Choose banner vector', 'felipa' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Turn your ideas into real!','felipa')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are usually used in print and website industry. Lorem ipsum dummy','felipa')
         ]
      );
      

      $this->add_control(
         'btn_text', [
            'label' => __( 'Text', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Learn More','felipa')
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'URL', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      ?>


    <section class="banner-3" style="background-image: url(<?php echo $settings['banner_image'][url] ?>);">
      <span class="moving_circle circle1"></span>
      <span class="moving_circle circle2"></span>
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 col-lg-6 col-sm-12">
                      <div class="banner-content">
                          <h1><?php echo esc_html($settings['title']); ?></h1>
                          <p><?php echo esc_html($settings['description']); ?></p>
                          <div class="bnr-btn">
                              <ul class="list-inline">
                                  <li class="list-inline-item"><a href="<?php echo esc_url( $settings['btn_url'] ); ?>"><?php echo esc_attr( $settings['btn_text'] ); ?></a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-lg-6 col-sm-12">
                      <div class="banner-images">
                          <img src="<?php echo $settings['banner_vector'][url] ?>" alt="vector">
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new felipa_Widget_Banner3 );