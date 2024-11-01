<?php

return array(
// menus
    'Related Post Setting' => array(
        // shortcodes collection in this menu
        'elements' => array(
            // shortcode with attribute
            'acb1' => array(
                'title' => __('Virkut Shortcode Settings', 'qualia_td'),
                'code' => '[virkut]',
                'attributes' => array(
                    //Post per Page                    
                    array(
                        'type' => 'select',
                        'name' => 'vkrcp_post_per_row',
                        'label' => __('Post Per Row', 'vkrcp_textdomain'),
                        'items' => array(
                            array(
                                'value' => '1',
                                'label' => __('1', 'vkrcp_textdomain'),
                            ),
                            array(
                                'value' => '2',
                                'label' => __('2', 'vkrcp_textdomain'),
                            ),
                            array(
                                'value' => '3',
                                'label' => __('3', 'vkrcp_textdomain'),
                            ),
                            array(
                                'value' => '4',
                                'label' => __('4', 'vkrcp_textdomain'),
                            ),
                            array(
                                'value' => '6',
                                'label' => __('6', 'vkrcp_textdomain'),
                            ),
                        ),
                        'default' => array(
                            '3',
                        )),
                    //Title Font Color
                    array(
                        'type' => 'color',
                        'name' => 'vkrcp_title_color',
                        'label' => __('Post Title Text Color', 'vkrcp_textdomain'),
                        'default' => '#454545',
                    ),
                    //Title Font Size
                    array(
                        'type' => 'slider',
                        'name' => 'vkrcp_title_font_size',
                        'label' => __('Post Title Font Size', 'vkrcp_textdomain'),
                        'min' => '10',
                        'max' => '30',
                        'step' => '1',
                        'default' => '16',
                    ),
                ),
            ),
        // ... more elements
        ),
    ),
// ... more menus
);
?>