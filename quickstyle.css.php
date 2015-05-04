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
			'send_header'=>true,
			'custom'=>null
		);
	
	}
	
	if( isset( $config['send_header'] ) && $config['send_header'] && !headers_sent() )
	{
		header('Content-type: text/css');
	}
	
	$colors = array(
		'black',
		'red'=>array('dark','indian','mediumviolet','orange','paleviolet'),
		'green'=>array('dark','light','forest','yellow','lawn','lime','pale','darkolive','sea','darksea','lightsea','mediumsea','spring','mediumspring'),
		'blue'=>array('alice','cadet','cornflower','dark','darkslate','deepsky','dodge','light','lightsky','lightsteel','medium','mediumslate','midnight','powder','royal','sky','slate','steel'),
		'white'
	);
	
	$sizes=array(
		'em'=>array(0.3,0.5,1,1.25,1.3,2,2.5,3,3.3,3.5,4),
		'px'=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,12.5,13,14,15,16,17,17.5,18,19,20),
		'mm'=>range(0,9),
		'cm'=>range(0,9),
		'%'=>array(0,1,2,3,4,5,6,7,8,9,10,12.5,15,20,25,30,33.3,35,40,45,50,55,60,62.5,65,66.6,65,70,75,80,85,90,95,99,100)
	);
	
	$styles=array(
		'border'=>array('none','doted','dashed','solid'),
		'text'=>array('none','underline')
	);
	
	$important = ( isset($config['force']) && $config['force'] ? '!important' : '' );
	$class = ( !isset($config['class']) || $config['class'] === null ? '.color' : ( $config['class'] == false ? '' : '.'.$config['class'] ) );
	
	foreach($colors as $color_name=>$color)
	{
		if( is_array($color) )
		{
			foreach( $color as $sub_color )
			{				
				if( isset($config['text']) && $config['text'] )
				{
					echo $class, '.', $color_name, '-', $sub_color, '-text{color:', $sub_color, $color_name, $important, ';}';
				}
				
				if( isset($config['border']) && $config['border'] )
				{
					echo $class, '.', $color_name, '-', $sub_color, '-border{border-color:', $sub_color, $color_name, $important, ';}';
				}
				
				if( isset($config['back']) && $config['back'] )
				{
					echo $class, '.', $color_name, '-', $sub_color, '-back{background-color:', $sub_color, $color_name, $important, ';}';
					echo $class, '.', $color_name, '-', $sub_color, '-background{background-color:', $sub_color, $color_name, $important, ';}';
				}
				
				if( isset($config['shadow']) && $config['shadow'] )
				{
					echo $class, '.', $color_name, '-', $sub_color, '-shadow{text-shadow-color:', $sub_color, $color_name, $important, ';box-shadow-color:', $sub_color, $important, ';}';
				}
				
				if( isset($config['outline']) && $config['outline'] )
				{
					echo $class, '.', $color_name, '-', $sub_color, '-outline{outline-color:', $sub_color, $color_name, $important, ';}';
				}
			}
		}
		else
		{
			
			if( isset($config['text']) && $config['text'] )
			{
				echo $class, '.', $color, '-text{color:', $color, $important, ';}';
			}
			
			if( isset($config['border']) && $config['border'] )
			{
				echo $class, '.', $color, '-border{border-color:', $color, $important, ';}';
			}
			
			if( isset($config['back']) && $config['back'] )
			{
				echo $class, '.', $color, '-back{background-color:', $color, $important, ';}';
				echo $class, '.', $color, '-background{background-color:', $color, $important, ';}';
			}
			
			if( isset($config['shadow']) && $config['shadow'] )
			{
				echo $class, '.', $color, '-shadow{text-shadow-color:', $color, $important, ';box-shadow-color:', $color, $important, ';}';
			}
			
			if( isset($config['outline']) && $config['outline'] )
			{
				echo $class, '.', $color, '-outline{outline-color:', $color, $important, ';}';
			}
		}
	}
	unset($color,$color_name,$sub_color,$sub_color_name);
	
	if( isset($config['custom']) )
	{
		foreach( $config['custom'] as $color=>$hex )
		{
			if( isset($config['text']) && $config['text'] )
			{
				echo $class, '.custom-', $color, '-text{color:', $color, $important, ';}';
			}
			
			if( isset($config['border']) && $config['border'] )
			{
				echo $class, '.custom-', $color, '-border{border-color:', $color, $important, ';}';
			}
			
			if( isset($config['back']) && $config['back'] )
			{
				echo $class, '.custom-', $color, '-back{background-color:', $color, $important, ';}';
				echo $class, '.custom-', $color, '-background{background-color:', $color, $important, ';}';
			}
			
			if( isset($config['shadow']) && $config['shadow'] )
			{
				echo $class, '.custom-', $color, '-shadow{text-shadow-color:', $color, $important, ';box-shadow-color:', $color, $important, ';}';
			}
			
			if( isset($config['outline']) && $config['outline'] )
			{
				echo $class, '.custom-', $color, '-outline{outline-color:', $color, $important, ';}';
			}
		}
	}
	
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
