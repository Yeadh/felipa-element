<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class thegncy_Widget_Counter extends Widget_Base {
 
   public function get_name() {
      return 'counter';
   }
 
   public function get_title() {
      return esc_html__( 'Counter', 'thegncy' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'thegncy-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Counter', 'thegncy' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater->add_control(
         'icon',
         [
            'label' => __( 'Choose Icon', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'counter',
         [
            'label' => __( 'Counter Value', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '445'
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Projects done','thegncy' )
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'counter', 'basic' );
      
      ?>

      <div class="counter-item">
         <img src="<?php echo esc_url($testimonial_single['icon']['url']); ?>" alt="Logo">
         <span class="counter"><?php echo $settings['counter']; ?></span>
         <p><?php echo $settings['title']; ?></p>
      </div>
      
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new thegncy_Widget_Counter );