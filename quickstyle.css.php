<?php

	if( @is_file($file = basename(__FILE__, '.css.php') . '-config.php' ) )
	{
		$config = (array)include( $file );
	}
	else
	{
	
		$config = array(
			'class'=>'color',
			'force'=>true,
			'text'=>true,
			'border'=>true,
			'back'=>true,
			'shadow'=>true,
			'sizes'=>true,
			'styles'=>true,
			'send_header'=>true
		);
	
	}
	
	if( isset( $config['send_header'] ) && $config['send_header'] && !headers_sent() )
	{
		header('Content-type: text/css');
	}
	
	$colors = array(
		'black'=>'000000',
		'red'=>array('FF0000','dark'=>'8B0000'),
		'green'=>array(
			0=>'00FF00',
			'dark'=>'006400',
			'light'=>'90EE90',
			'forest'=>'228B22',
			'yellow'=>'ADFF2F',
			'lawn'=>'7CFC00',
			'lime'=>'32CD32',
			'pale'=>'98FB98',
			'oliver-dark'=>'556B2F',
			'sea'=>'2E8B57',
			'sea-dark'=>'8FBC8F',
			'sea-light'=>'8FBC8F',
			'sea-medium'=>'3CB371',
			'spring'=>'00FF7F',
			'spring-medium'=>'00FA9A'
		),
		'white'=>'FFFFFF'
	);
	
	$sizes=array(
		'em'=>array(0.3,0.5,1,1.3,2,2.5,3),
		'px'=>array(0,1,2,3,4,5,6,7,8,9,10,12,15,16,17,20),
		'mm'=>range(0,9),
		'cm'=>range(0,9),
		'%'=>array(0,1,2,3,4,5,10,15,20,25,30,33.3,45,50,55,60,66.6,65,70,75,80,85,90,95,99,100)
	);
	
	$styles=array(
		'border'=>array('none','doted','dashed','solid'),
		'text'=>array('none','underline')
	);
	
	$important = ( isset($config['force']) && $config['force'] ? '!important' : '' );
	$class = ( !isset($config['class']) || $config['class'] === null ? '.color' : ( $config['class'] == false ? '' : '.'.$config['class'] ) );
	
	foreach($colors as $color_name=>$color)
	{
		if(is_array($color))
		{
			foreach($color as $sub_color_name=>$sub_color)
			{
				$sub_color_name = $sub_color_name=='0' ? $color_name : $color_name . '-' . $sub_color_name;
				
				if( isset($config['text']) && $config['text'] )
				{
					echo $class, '.', $sub_color_name, '-text{color:#', $sub_color, $important, ';}';
				}
				
				if( isset($config['border']) && $config['border'] )
				{
					echo $class, '.', $sub_color_name, '-border{border-color:#', $sub_color, $important, ';}';
				}
				
				if( isset($config['back']) && $config['back'] )
				{
					echo $class, '.', $sub_color_name, '-back{background-color:#', $sub_color, $important, ';}';
					echo $class, '.', $sub_color_name, '-background{background-color:#', $sub_color, $important, ';}';
				}
				
				if( isset($config['shadow']) && $config['shadow'] )
				{
					echo $class, '.', $sub_color_name, '-shadow{text-shadow-color:#', $sub_color, $important, ';box-shadow-color:#', $sub_color, $important, ';}';
				}
				
				if( isset($config['outline']) && $config['outline'] )
				{
					echo $class, '.', $sub_color_name, '-outline{outline-color:#', $sub_color, $important, ';}';
				}
			}
		}
		else
		{
			
			if( isset($config['text']) && $config['text'] )
			{
				echo $class, '.', $color_name, '-text{color:#', $color, $important, ';}';
			}
			
			if( isset($config['border']) && $config['border'] )
			{
				echo $class, '.', $color_name, '-border{border-color:#', $color, $important, ';}';
			}
			
			if( isset($config['back']) && $config['back'] )
			{
				echo $class, '.', $color_name, '-back{background-color:#', $color, $important, ';}';
				echo $class, '.', $color_name, '-background{background-color:#', $color, $important, ';}';
			}
			
			if( isset($config['shadow']) && $config['shadow'] )
			{
				echo $class, '.', $color_name, '-shadow{text-shadow-color:#', $color, $important, ';box-shadow-color:#', $color, $important, ';}';
			}
			
			if( isset($config['outline']) && $config['outline'] )
			{
				echo $class, '.', $color_name, '-outline{outline-color:#', $color, $important, ';}';
			}
		}
	}
	unset($color,$color_name,$sub_color,$sub_color_name);
	
	if( isset($config['sizes']) && $config['sizes'])
	{
		foreach($sizes as $size_name=>$size_list)
		{
			foreach($size_list as $size_value)
			{
				if( isset($config['text']) && $config['text'] )
				{
					echo '.text-', str_replace('.', '_', $size_value), $size_name, '{font-size:', $size_value, $size_name, $important, ';}';
				}
				if( isset($config['border']) && $config['border'] )
				{
					echo '.border-', str_replace('.', '_', $size_value), $size_name, '{border-width:', $size_value, $size_name, $important, ';}';
				}
			}
		}
	}
	unset($size_name,$size_list,$size_value);
	
	if( isset($config['styles']) && $config['styles'])
	{
		if( isset($config['text']) && $config['text'] )
		{
			foreach($styles['text'] as $style)
			{
				echo '.text-',$style,'{text-decoration:',$style,$important,';}';
			}
		}
		if( isset($config['border']) && $config['border'] )
		{
			foreach($styles['border'] as $style)
			{
				echo '.border-',$style,'{border-style:',$style,$important,';}';
			}
		}
	}
	unset($style);
	
//.border-1px{border-width:1px;}
//[class*=" border"].solid{border-style:solid;}
