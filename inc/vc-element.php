<?php


function banner_sec(){

	vc_map( array(
		'name' => __( 'Top Header', 'ion' ),
		'description' => __( 'Top Header Info', 'ion' ),
		'base' => 'topheaderion',
		'icon' => 'fa fa-facebook',
		'show_settings_on_create' => true,
		'category' => __( 'ion', 'ion'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'admin_label' => true,
				'heading' => __( 'Site Name', 'ion' ),
				'param_name' => 'site_name',
				'value' => 'fa fa-google',
				'description' => __( 'This is a site Name', 'ion' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Choose Menu', 'ion' ),
				'param_name' => 'nav_menu',
				'value' => ion_get_menus_array(),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
		)
	) );

vc_map(array(

      'name' => __('Banner section','ion'),
      'description' => 'This is Banner Section',
      'base' => 'banner_section',
      'category' => 'ion',
      'icon' => 'fa fa-map',
      'params' => array(
		array(
            'param_name' => 'banner_image',
            'type' => 'attach_image',
            'heading'=> 'Title',
            'value' => ''
        ),        
		array(
            'param_name' => 'banner_title',
            'type' => 'textfield',
            'heading'=> 'Title',
            'value' => ''
        ),
        array(
            'param_name' => 'banner_des',
            'type' => 'textarea',
            'heading'=> 'Description',
            'value' => ''
        ),
		array(
			'type' => 'textfield',
			'heading' => __( 'Button1', 'js_composer' ),
			'param_name' => 'btn1_name',
			// fully compatible to btn1 and btn2
			'value' => __( 'Text on the button', 'js_composer' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'js_composer' ),
			'param_name' => 'link1',
			'description' => __( 'Add link to button.', 'js_composer' ),
			// compatible with btn2 and converted from href{btn1}
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Button2', 'js_composer' ),
			'param_name' => 'btn2_name',
			// fully compatible to btn1 and btn2
			'value' => __( 'Text on the button', 'js_composer' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'js_composer' ),
			'param_name' => 'link2',
			'description' => __( 'Add link to button.', 'js_composer' ),
			// compatible with btn2 and converted from href{btn1}
		)
	)
  ));


  //Section Two

  vc_map(array(

      'name' => __('Section Two','ion'),
      'description' => 'This is a Section Two',
      'base' => 'section_two',
      'category' => 'ion',
      'icon' => 'fa fa-map',
      'params' => array(

        array(

            'param_name' => 'header_title',
            'type' => 'textfield',
            'heading'=> 'the banner section',
            'value' => ''
        ),

        array(

            'param_name' => 'header_des',
            'type' => 'textarea',
            'heading'=> 'the banner description',
            'value' => ''
        ),

        array(

                'type' => 'param_group',
                'heading' => 'Group Cards',
                'param_name' => 'card_section_two_group',
                'params' => array(

                    
                    array(
        
                        'param_name' => 'icon',
                        'type' => 'iconpicker',
                        'heading' => 'icon section'
                       
                    ),
        
        
                    array(
        
                        'param_name' => 'title',
                        'type' => 'textfield',
                        'heading' => 'Title',
                        'value' => '',
                 
                    ),
        
                    array(
        
                        'param_name' => 'description',
                        'type' => 'textarea',
                        'heading' => 'Description',
                        'value' => '',
                    ),

                )
            ),


      )

  ));


//Section Three With Parallex


vc_map(array(

      'name' => __('Section Three','ion'),
      'description' => 'This is a Section Three',
      'base' => 'section_three',
      'category' => 'ion',
      'icon' => 'fa fa-map',
      'params' => array(

        array(

            'param_name' => 'title',
            'type' => 'textfield',
            'heading'=> 'Title',
            'value' => ''
        ),

        array(

            'param_name' => 'description',
            'type' => 'textarea',
            'heading'=> 'Description',
            'value' => ''
        ),
		array(
			"type" => "dropdown",
			"heading" => __( "category", "ion" ),
			"param_name" => "category",
			"value" => ir_posts_category_vc(),
			"description" => __( "Select category", "ion" )
		),
      )

  ));


  //Testimonials : Section Four


  vc_map(array(

      'name' => __('Section Four','ion'),
      'description' => 'This is a Section Four',
      'base' => 'section_four',
      'category' => 'ion',
      'icon' => 'fa fa-map',
      'params' => array(
        array(
            'param_name' => 'title',
            'type' => 'textfield',
            'heading'=> 'Title',
            'value' => ''
        ),
		array(
            'param_name' => 'sec_4_img',
            'type' => 'attach_image',
            'heading'=> 'Title',
            'value' => ''
        ), 
        array(
            'param_name' => 'description',
            'type' => 'textarea',
            'heading'=> 'Description',
            'value' => ''
        ),
		array(
			"type" => "dropdown",
			"heading" => __( "category", "ion" ),
			"param_name" => "category",
			"value" => ir_posts_category_vc(),
			"description" => __( "Select category", "ion" )
		),
		array(
            'param_name' => 'title_2',
            'type' => 'textfield',
            'heading'=> 'Title',
            'value' => ''
        ),
		array(
            'param_name' => 'post_per',
            'type' => 'textfield',
            'heading'=> 'Title',
            'value' => 4
        ),
      )
  ));

 }
add_action("vc_before_init","banner_sec");



?>