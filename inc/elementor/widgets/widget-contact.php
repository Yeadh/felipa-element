<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// contact item
class thegncy_Widget_Contact extends Widget_Base {
 
   public function get_name() {
      return 'Contact item';
   }
 
   public function get_title() {
      return esc_html__( 'contact Item', 'thegncy' );
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
            'type' => \Elementor\Controls_Manager::MEDIA
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'thegncy' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Design','thegncy'),
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
      $this->add_inline_editing_attributes( 'style', 'basic' );
      ?>
 
      <div class="contact-item">
         <?php echo wp_get_attachment_image( $settings['icon']['id'], 'full' ); ?>
         <h5><?php echo esc_html($settings['title']); ?></h5>
         <p><?php echo esc_html($settings['text']); ?></p>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new thegncy_Widget_Contact );