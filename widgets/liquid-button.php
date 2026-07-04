<?php
class Liquid_Widgets_Button extends \Elementor\Widget_Base {

    public function get_name(): string {
        return 'liquid_button';
    }

    public function get_title(): string {
        return esc_html__('Liquid Button', 'elementor-addon');
    }

    public function get_icon(): string {
        return 'eicon-code';
    }

    public function get_categories(): array {
        return ['basic'];
    }

    public function get_keywords(): array {
        return ['liquid', 'glass', 'button', 'کلید', 'دکمه'];
    }

    public function get_style_depends(): array {
        return ['liquid-button'];
    }

    protected function register_controls(): void {
        //Title Settings
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();
        
        //URL Settings
        $this->start_controls_section(
            'section_url',
            [
                'label' => esc_html__('Button URL', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('Button URL', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->end_controls_section();
    }

    public function render(): void {
        $settings = $this->get_settings_for_display();
        $this->add_link_attributes( 'button_link', $settings['url'] );

        if (empty($settings['title'])) {
            return;
        }
        ?>
        <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="liquid-widgets-button"><?php echo esc_html($settings['title']); ?></a>
        <?php
    }

    public function content_template() : void {
        ?>
        <a href="{{settings.url.url}}" class="liquid-widgets-button">{{settings.title}}</a>
        <?php
    }
}