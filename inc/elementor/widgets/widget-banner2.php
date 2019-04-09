<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class felipa_Widget_Banner2 extends Widget_Base {
 
   public function get_name() {
      return 'banner2';
   }
 
   public function get_title() {
      return esc_html__( 'Banner 2', 'felipa' );
   }
 
   public function get_icon() { 
        return 'eicon-fb-feed';
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

      $this->add_control(
          'image-1',
          [
            'label' => __( 'Choose Image', 'felipa' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ]
      );


      $this->add_control(
         'title-1',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Creative minds','felipa'),
         ]
      );
      $this->add_control(
         'text-1',
         [
            'label' => __( 'Text', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text used on thins industry are usually used. So replace your text','felipa'),
         ]
      );

      $this->add_control(
          'image-2',
          [
            'label' => __( 'Choose Image', 'felipa' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ]
      );


      $this->add_control(
         'title-2',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Excellent support','felipa'),
         ]
      );
      $this->add_control(
         'text-2',
         [
            'label' => __( 'Text', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text used on thins industry are usually used. So replace your text','felipa'),
         ]
      );

      $this->add_control(
          'image-3',
          [
            'label' => __( 'Choose Image', 'felipa' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ]
      );


      $this->add_control(
         'title-3',
         [
            'label' => __( 'Title', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Creative minds','felipa'),
         ]
      );
      $this->add_control(
         'text-3',
         [
            'label' => __( 'Text', 'felipa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text used on thins industry are usually used. So replace your text','felipa'),
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
      $this->add_inline_editing_attributes( 'image-1', 'basic' );
      $this->add_inline_editing_attributes( 'title-1', 'basic' );
      $this->add_inline_editing_attributes( 'text-1', 'basic' );
      $this->add_inline_editing_attributes( 'image-2', 'basic' );
      $this->add_inline_editing_attributes( 'title-2', 'basic' );
      $this->add_inline_editing_attributes( 'text-2', 'basic' );
      $this->add_inline_editing_attributes( 'image-3', 'basic' );
      $this->add_inline_editing_attributes( 'title-3', 'basic' );
      $this->add_inline_editing_attributes( 'text-3', 'basic' );
      ?>

      <section id="banner" class="banner-4 bnr-height-long">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-3-content">
                      <h1><?php echo esc_html($settings['title']); ?></h1>
                      <p><?php echo esc_html($settings['description']); ?></p>
                      <a class="bnr-btn-2" href="<?php echo esc_url( $settings['btn_url'] ); ?>"><?php echo esc_attr( $settings['btn_text'] ); ?></a>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <div class="service-banner-shape">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="banner-service">
                <img src="<?php echo esc_url($settings['image-1']['url']); ?>" alt="img">
                <h3><?php echo esc_html($settings['title-1']); ?></h3>
                <p><?php echo esc_html($settings['text-1']); ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="banner-service">
                <img src="<?php echo esc_url($settings['image-2']['url']); ?>" alt="img">
                <h3><?php echo esc_html($settings['title-2']); ?></h3>
                <p><?php echo esc_html($settings['text-2']); ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="banner-service">
                <img src="<?php echo esc_url($settings['image-3']['url']); ?>" alt="img">
                <h3><?php echo esc_html($settings['title-3']); ?></h3>
                <p><?php echo esc_html($settings['text-3']); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new felipa_Widget_Banner2 );