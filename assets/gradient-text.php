<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit;


class GradientText extends Widget_Base{

  public function get_name(){
    return 'gradient-text';
  }

  public function get_title(){
    return 'Gradient Text';
  }

  public function get_icon(){
    return 'fas fa-palette';
  }

  public function get_categories(){
    return ['general'];
  }

  protected function _register_controls() {

      $this->start_controls_section(
        'section_content',
        [
          'label' => 'Settings',
        ]
      );
  
      $this->add_control(
        'content',
        [
          'label' => 'Content',
          'type' => \Elementor\Controls_Manager::WYSIWYG,
          'default' => 'Some example content. Start Editing Here.'
        ]
      );
  
      $this->end_controls_section();
    }
    
  
    protected function render(){
      $settings = $this->get_settings_for_display();
  
      $this->add_inline_editing_attributes('label_heading', 'basic');
      $this->add_render_attribute(
        'label_heading',
        [
          'class' => ['elementor-gradient-text'],
        ]
      );
  
      ?>
      <div class="elementor-gradient-text-wrapper">
        <div class="elementor-gradient-text-content" <?php echo $this->get_render_attribute_string('content'); ?>>
            <?php echo $settings['content'] ?>
          </div>
        </div>
      </div>
      <?php
    }
  
    protected function _content_template(){
      ?>
      <#
          view.addInlineEditingAttributes( 'label_heading', 'basic' );
      view.addRenderAttribute(
          'label_heading',
          {
              'class': [ 'advertisement__label-heading' ],
          }
      );
          #>
      <div class="elementor-gradient-text-wrapper">
        <div class="elementor-gradient-text-content">
          {{{ settings.content }}}
        </div>
      </div>
          <?php
    }
}