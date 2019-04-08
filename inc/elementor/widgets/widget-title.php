<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class felipa_Widget_Title extends Widget_Base {
 
   public function get_name() {
      return 'title';
   }
 
   public function get_title() {
      return esc_html__( 'Title', 'felipa' );
   }
 
   public function get_icon() { 
        return 'eicon-site-title';
   }
 
   public function get_categories() {
      return [ 'felipa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Title', 'felipa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'align',
         [
            'label' => __( 'Align', 'felipa' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'left',
            'options' => [
               'center'  => __( 'Center', 'felipa' ),
               'left' => __( 'Left', 'felipa' ),
               'right' => __( 'Right', 'felipa' )
            ],
         ]
      );
      

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Sub Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Works','felipa')
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Latest portfolio','felipa')
         ]
      );

      $this->add_control(
         'border',
         [
            'label' => __( 'Border Bottom', 'felipa' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'felipa' ),
            'label_off' => __( 'Off', 'felipa' ),
            'return_value' => 'yes',
            'default' => 'no',
   
         ]
      );

      $this->add_control(
         'white-color',
         [
            'label' => __( 'Enable if Background is Colored', 'felipa' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'felipa' ),
            'label_off' => __( 'Off', 'felipa' ),
            'return_value' => 'yes',
            'default' => 'no',
   
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'align', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'sub-title', 'basic' );
      $this->add_inline_editing_attributes( 'white-color', 'basic' );
      $this->add_inline_editing_attributes( 'border', 'basic' );
      
      ?>
      <div class="section-title <?php if('yes' === $settings['white-color']){echo 'white';}else{echo 'color';} ?>" style="text-align: <?php echo esc_attr($settings['align']); ?>">
           <span <?php echo $this->get_render_attribute_string( 'sub-title' ); ?>><?php echo esc_html($settings['sub-title']); ?></span>
           <h1 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo esc_html($settings['title']); ?></h1>

           <?php if('yes' === $settings['border']){?>
              <?php if('yes' === $settings['white-color']){?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/dot-white.png" alt="img">
              <?php }else{?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/dot-bluecolor.png" alt="img">
              <?php } ?>
           <?php } ?>
      </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new felipa_Widget_Title );