<!DOCTYPE html>
 <head>
	 <meta charset="utf-8">
	 <title><?=(isset($title)) ? implode(' - ',$title): $this->config->item('site_title')?></title>
	 <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset.css" /> 
	 
	 <?if(isset($this->data['is_admin'])&&$this->data['is_admin'] == true):?>
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/admin.css" media="screen" /> 
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/start/jquery-ui-1.10.2.custom.css" media="screen" /> 
	 <?else:?>
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style.css" media="screen" /> 
	<?endif;?>
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	 <script src="<?=base_url()?>js/jquery-1.9.1.js"></script>
	 <?if(isset($this->data['is_admin'])&&$this->data['is_admin'] == true):?>
		<script src="<?=base_url()?>js/admin.js"></script>
		<script src="<?=base_url()?>js/jquery-ui-1.10.2.custom.js"></script>
	 <?else:?>
		<script src="<?=base_url()?>js/main.js"></script>
	 <?endif;?>
 </head>
 <body>
	 <?if(isset($system_message)&&$system_message!==false):?>
		<p class="system-message <?=$system_message['class']?>"><?=$system_message['text']?></p>
	<?endif;?>
	 <div id="outer">
		<header>
			<h1><a href="<?=base_url()?>" title="Home"><?=$this->config->item('site_title')?></a></h1>
			<?if(isset($this->data['is_admin'])&&$this->data['is_admin'] == true):?>
				<h2>Administration</h2>
			<?endif;?>
		</header>
		<?if(isset($this->data['is_admin'])&&$this->data['is_admin'] == true):?>
			<?$this->load->view('admin/menu/menu')?>
		<?endif;?>
		<section>
