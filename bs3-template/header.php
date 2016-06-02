<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?$APPLICATION->ShowTitle();?></title>
	<?$APPLICATION->SetAdditionalCSS( SITE_TEMPLATE_PATH."/bs3/css/bootstrap.min.css" );?>
	<?$APPLICATION->SetAdditionalCSS( SITE_TEMPLATE_PATH."/slick/slick.css" );?>
	<?$APPLICATION->SetAdditionalCSS( SITE_TEMPLATE_PATH."/slick/slick-theme.css" );?>
	<?$APPLICATION->SetAdditionalCSS( SITE_TEMPLATE_PATH."/fancybox/jquery.fancybox.css" );?>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<?$APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH."/js/jquery.min.js" );?>
	<?$APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH."/bs3/js/bootstrap.min.js" );?>
	<?$APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH."/slick/slick.min.js" );?>
	<?$APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH."/fancybox/jquery.fancybox.pack.js" );?>
	<?$APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH."/js/scripts.js" );?>
	<?$APPLICATION->ShowHead();?>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div class="wrapper<?if($APPLICATION->GetCurPage(false) == "/"):?> wrap-main<?else:?> wrap-page<?endif?>">

<div class="wrap-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="h-logo">
					<a href="/"><img class="img-responsive" src="https://api.fnkr.net/testimg/100x50/AAA/FFF/?text=logo+img"></a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="h-contacts">
					<div class="row">
						<div class="col-sm-4">
							<select class="form-control">
								<option>Абакан</option>
								<option>Не абакан</option>
							</select>
						</div>
						<div class="col-sm-8">
							<div class="h-phone">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => $APPLICATION->GetTemplatePath("include_areas/h-phone.html"),
	"EDIT_TEMPLATE" => ""
	)
);?>
							</div>
							<div class="h-callback"><a href="">Заказать обратный звонок</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="h-question">
					<a href="#ask-question-form" class="btn btn-h-question ask-question-link">Задать вопрос</a>
					<div class="ask-question-form" id="ask-question-form">
						<form action="" method="POST" role="form">
							<legend>Form title</legend>
						
							<div class="form-group">
								<label for="">label</label>
								<input type="text" class="form-control" id="" placeholder="Input field">
							</div>
						
							
						
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Title</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"main-menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "main-menu"
	),
	false
);?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
<div class="wrap-main-slider">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="main-slider">
					<div class="main-slider-item">
						<img class="img-responsive" src="https://api.fnkr.net/testimg/1280x200/00CED1/FFF/?text=slider+img">
					</div>
					<div class="main-slider-item">
						<img class="img-responsive" src="https://api.fnkr.net/testimg/1280x200/008e2f/FFF/?text=slider+img">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?if($APPLICATION->GetCurPage(false) == "/"):?>
<div class="wrap-main-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
<?else:?>
<div class="wrap-page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
<?endif?>