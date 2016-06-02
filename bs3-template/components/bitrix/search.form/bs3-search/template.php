<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<div class="bs3-search-form">
<form action="<?=$arResult["FORM_ACTION"]?>">
	<div class="input-group">
		<?if($arParams["USE_SUGGEST"] === "Y"):?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:search.suggest.input",
				"",
				array(
					"NAME" => "q",
					"VALUE" => "",
					"INPUT_SIZE" => 15,
					"DROPDOWN_SIZE" => 10,
				),
				$component, array("HIDE_ICONS" => "Y")
			);?>
		<?else:?>
			<input type="text" name="q" class="form-control" placeholder="Поиск по сайту">
		<?endif;?>
		<span class="input-group-btn">
			<button class="btn btn-default" name="s" type="submit" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>"><span class="glyphicon glyphicon-search"></span></button>
		</span>
	</div>
</form>
</div>