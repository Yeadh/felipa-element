<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// contact item
class thegncy_Widget_Contact extends Widget_Base {
 
   public function get_name() {
      return 'Contact item';
   }
 
   public function get_title() {
      return esc_html__( 'Contact Item', 'thegncy' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'thegncy-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'contact_section',
         [
            'label' => esc_html__( 'Contact Item', 'thegncy' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Call us','thegncy'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG
         ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'icon', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>
 
      <div class="contact-item">
         <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
         <h5><?php echo esc_html($settings['title']); ?></h5>
         <p><?php echo $settings['text'] ?></p>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new thegncy_Widget_Contact );