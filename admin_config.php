<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	header('location:'.e_BASE.'index.php');
	exit;
}

e107::css('inline',"

	img.level-1 { margin:0 5px 0 15px; }
	item-inventory { font-weight: bold }
	#custom-css{ font-family: monospace; }
");

require_once('vstore.class.php');

class vstore_admin extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'vstore_pref_ui',
			'path' 			=> 'inc/admin_config_pref.php',
			'ui' 			=> 'vstore_pref_form_ui',
			'uipath' 		=> 'inc/admin_config_pref.php'
		),
	
		// 'cart'	=> array(
		// 	'controller' 	=> 'vstore_cart_ui',
		// 	'path' 			=> 'inc/admin_config_cart.php',
		// 	'ui' 			=> 'vstore_cart_form_ui',
		// 	'uipath' 		=> 'inc/admin_config_cart.php'
		// ),
		
		'email'	=> array(
			'controller' 	=> 'vstore_email_templates_ui',
			'path' 			=> 'inc/admin_config_email_templates.php',
			'ui' 			=> 'vstore_email_templates_form_ui',
			'uipath' 		=> 'inc/admin_config_email_templates.php'
		),
		
		'gateways'	=> array(
			'controller' 	=> 'vstore_gateways_ui',
			'path' 			=> 'inc/admin_config_gateways.php',
			'ui' 			=> 'vstore_gateways_form_ui',
			'uipath' 		=> 'inc/admin_config_gateways.php'
		),
		
		'orders'	=> array(
			'controller' 	=> 'vstore_order_ui',
			'path' 			=> 'inc/admin_config_orders.php',
			'ui' 			=> 'vstore_order_form_ui',
			'uipath' 		=> 'inc/admin_config_orders.php'
		),
		

		'cat'	=> array(
			'controller' 	=> 'vstore_cat_ui',
			'path' 			=> 'inc/admin_config_cat.php',
			'ui' 			=> 'vstore_cat_form_ui',
			'uipath' 		=> 'inc/admin_config_cat.php'
		),
		

		'products'	=> array(
			'controller' 	=> 'vstore_items_ui',
			'path' 			=> 'inc/admin_config_items.php',
			'ui' 			=> 'vstore_items_form_ui',
			'uipath' 		=> 'inc/admin_config_items.php'
		),

		'vars'	=> array(
			'controller' 	=> 'vstore_items_vars_ui',
			'path' 			=> 'inc/admin_config_item_vars.php',
			'ui' 			=> 'vstore_items_vars_form_ui',
			'uipath' 		=> 'inc/admin_config_item_vars.php'
		),

		'coupons'	=> array(
			'controller' 	=> 'vstore_coupons_ui',
			'path' 			=> 'inc/admin_config_coupons.php',
			'ui' 			=> 'vstore_coupons_form_ui',
			'uipath' 		=> 'inc/admin_config_coupons.php'
		),
		
		'statistics'	=> array(
			'controller' 	=> 'vstore_statistics_ui',
			'path' 			=> 'inc/admin_config_statistics.php',
			'ui' 			=> 'vstore_statistics_form_ui',
			'uipath' 		=> 'inc/admin_config_statistics.php'
		),
		
		
		'customer'	=> array(
			'controller' 	=> 'vstore_customer_ui',
			'path' 			=> 'inc/admin_config_customer.php',
			'ui' 			=> 'vstore_customer_form_ui',
			'uipath' 		=> 'inc/admin_config_customer.php'
		),
		

	);	
	
	
	protected $adminMenu = array(

		'products/list'		=> array('caption'=> "Products", 'perm' => 'P'),
		'products/create'	=> array('caption'=> "Add Product", 'perm' => 'P'),
		'products/div'      => array('divider'=>true),

		'vars/list'			=> array('caption'=> "Product Variations", 'perm' => 'P'),
		'vars/create'		=> array('caption'=> "Add Product Variations", 'perm' => 'P'),
		'vars/div'          => array('divider'=>true),

		'cat/list'			=> array('caption'=> LAN_CATEGORIES, 'perm' => 'P'),
		'cat/create'		=> array('caption'=> LAN_CREATE_CATEGORY, 'perm' => 'P'),
		'cat/div'           => array('divider'=>true),

		'coupons/list'		=> array('caption'=> 'Coupons', 'perm' => 'P'),
		'coupons/create'	=> array('caption'=> 'Add Coupon', 'perm' => 'P'),
		'coupons/div'      	=> array('divider'=>true),

		'orders/list'		=> array('caption'=> "Sales", 'perm' => 'P'),
		// 'cart/list' 		=> array('caption'=> 'Cart', 'perm' => 'P'),
		'orders/div'        => array('divider'=>true),

		'customer/list'		=> array('caption'=> "Customers", 'perm' => 'P'),
	
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),

		'email/prefs' 		=> array('caption'=> 'Email Templates', 'perm' => 'P'),

		'gateways/prefs'	=> array('caption'=> "Payment Gateways", 'perm' => 'P'),

		'statistics/custom'	=> array('caption'=> "Statistics", 'perm' => 'P'),

		// 'main/custom'	=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'products/edit'	=> 'products/list',
		'vars/edit'     => 'vars/list',
		'products/grid' => 'products/list',
		'orders/edit'	=> 'orders/list',
		'coupons/edit'	=> 'coupons/list',
		'statistics/view'	=> 'statistics/custom'
	);	
	
	protected $menuTitle = 'Vstore';

		function init()
		{
			if(deftrue('e_DEBUG'))
			{
		//		$this->adminMenu['products/grid'] = array('caption'=> "Products (Grid)", 'perm' => 'P');
			}

			parent::init();
		}
}

new vstore_admin();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>
