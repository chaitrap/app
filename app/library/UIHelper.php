<?php

/**
 * Class and Function List:
 * Function list:
 * - getDeploymentStatus()
 * Classes list:
 * - UIHelper
 */
class UIHelper
{
	public static function getLabel($status)
	{
		
		/*
		 * Default	<span class="label">Default</span>
Success	<span class="label label-success">Success</span>
Warning	<span class="label label-warning">Warning</span>
Important	<span class="label label-important">Important</span>
Info	<span class="label label-info">Info</span>
Inverse	<span class="label label-inverse">Inverse</span>
		 */
		switch($status)
		{
			case 'running' :
			case 'Completed' 	: return '<span class="label label-success">'.$status.'</span>'; break;
			case 'In Progress'  : 
			case 'start' 		: 
			case 'started' 		: return '<span class="label label-info">'.$status.'</span>'; break;
			case 'stop' 		: return '<span class="label label-warning">'.$status.'</span>'; break;
			case 'failed' 		: return '<span class="label label-danger">'.$status.'</span>'; break;
			default:			  return '<span class="label label-danger">'.$status.'</span>'; break;
								
		}
		
	}
	
	public static function getBadge($status)
	{
		
		/*
		 * Default	<span class="label">Default</span>
Success	<span class="label label-success">Success</span>
Warning	<span class="label label-warning">Warning</span>
Important	<span class="label label-important">Important</span>
Info	<span class="label label-info">Info</span>
Inverse	<span class="label label-inverse">Inverse</span>
		 */
		switch($status)
		{
			case 'running' 	: return '<span class="badge alert-success">'.$status.'</span>'; break;
			
			case 'start' 		: 
			case 'started' 		: return '<span class="badge alert-info">'.$status.'</span>'; break;
			
			case 'stop' 		: 
			case 'stopped' 		: return '<span class="badge alert-warning">'.$status.'</span>'; break;
			
			case 'terminated' 		: 
			case 'error' 		: 
			case 'failed' 		: return '<span class="badge alert-danger">'.$status.'</span>'; break;
			
			default:			  return '<span class="badge alert-danger">'.$status.'</span>'; break;
								
		}
		
	}

	public static function getDataOrganized($params)
	{
			//Array ( [config] => Array ( [currency] => USD [unit] => perhr ) [regions] => 
			//Array ( [0] => Array ( [region] => us-east-1 [instanceTypes] 
			//=> Array ( [0] => Array ( [type] => m1.small [os] => linux [price] => 0.06 ) ) ) ) )
			$data = EC2InstancePrices::OnDemand($params);
			$input = json_decode($params);
			$instanceType = $data['regions'][0]['instanceTypes'];
			$obj = json_decode(json_encode($data));
			
			$image = self::getImage($input->instanceAmi);
			
			return '<div class="table-responsive">  <table class="table table-bordered"> '.
              		' <thead> ' .
                		'<th>Ondemand</th>'.
	                    	'<th>Region</th> '.
	                    	'<th>Instance Type</th>'.
	                    	'<th>OS Flavor</th>'.
	                    	'<th>Price</th>'.
                	'</thead>'.
              		'<tr>'.
	              		'<td align="center"><span class="glyphicon glyphicon-ok"></span></td>'.
	              		'<td><span class="glyphicon glyphicon-flag"></span>'.$obj->regions[0]->region.'</td>'.
	              		'<td>'.$input->instanceType.'</td>'.
	              		'<td>'.$image.'</td>'.
	              		'<td>'.self::getPrice($data).'</td>'.
					'</tr>'.
					'</table></div>';
			
	}	

	private static function getImage($instanceAMI)
	{
		$images = Config::get('images');
		foreach($images as $providers)
		{
			foreach($providers as $confImages)
			{
				foreach($confImages as $cImage)
				{
					$arr = explode (':', $cImage);
					if(!empty($arr[1]) && $arr[1] == $instanceAMI)
						return $cImage;
					else
					{
						return $instanceAMI;
					}
				}
			}
		}
	}
	
	private static function getPrice($data)
	{
		$sym = '';
		switch ($data['config']['currency'])
		{
			case 'USD' : $sym = '$ '; break;
		}
		
		if(!empty($data['regions'][0]['instanceTypes'][0]['price']))
		{
			$price = $data['regions'][0]['instanceTypes'][0]['price'];
			$perHr = $sym . $price.' '. $data['config']['unit'];
			$s30hr = $sym .floatval($price) * 730 . '<br/>'. Lang::get('deployment/deployment.monthly');;
			return $perHr .'<br/>'. $s30hr;
		}
		else return 'NA';
	}

}
