<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class felipa_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner_pop';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'felipa' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'felipa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_pop_section',
         [
            'label' => esc_html__( 'Banner with popup video', 'felipa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Creative business agency make big deals','felipa')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are usually use. Replace your text bare usuallly use in these section. So i used here. replace your text','felipa')
         ]
      );
      

      $button = new \Elementor\Repeater();

      $button->add_control(
         'btn_text', [
            'label' => __( 'Text', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Learn More','felipa')
         ]
      );

      $button->add_control(
         'btn_url', [
            'label' => __( 'URL', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'button_list',
         [
            'label' => __( 'Buttons', 'felipa' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $button->get_controls(),
            'default' => [
               [
                  'btn_text' => 'Contact Us',
                  'btn_url' => '#',                  
               ],
               [
                  'btn_text' => 'Learn more ',
                  'btn_url' => '#',
               ]
            ],
            'feature' => '{{{ button_list }}}',
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'description', 'basic' );
      $this->add_inline_editing_attributes( 'button_list', 'basic' );
      ?>

      <section id="banner" class="banner-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 d-none d-xl-block">
                    <div class="banner-3-content">
                      <h1><?php echo esc_html($settings['title']); ?></h1>
                      <p><?php echo esc_html($settings['description']); ?></p>
                      <div class="bnr-btn">
                        <ul class="list-inline">
                          <?php foreach (  $settings['button_list'] as $key => $button_item ) { ?>
                             <li class="list-inline-item"><a href="<?php echo esc_url( $button_item['btn_url'] ); ?>"><?php echo esc_attr( $button_item['btn_text'] ); ?></a></li>
                           <?php } ?>
                        </ul>
                      </div>
                    </div>
                </div>
                <div class="col-lg-12 d-block d-lg-block d-sm-block d-xl-none">
                    <div class="banner-3-content">
                      <h1><?php echo esc_html($settings['title']); ?></h1>
                      <p><?php echo esc_html($settings['description']); ?></p>
                      <div class="bnr-btn">
                        <ul class="list-inline">
                          <?php foreach (  $settings['button_list'] as $key => $button_item ) { ?>
                             <li class="list-inline-item"><a href="<?php echo esc_url( $button_item['btn_url'] ); ?>"><?php echo esc_attr( $button_item['btn_text'] ); ?></a></li>
                           <?php } ?>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new felipa_Widget_Banner );