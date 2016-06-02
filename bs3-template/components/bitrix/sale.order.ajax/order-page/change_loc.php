<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$IBLOCK_ID_CITY = 6;
$arCity = array();
$price_id = $APPLICATION->get_cookie("USER_PRICE");
$price_id = intval($price_id);
if ($price_id != "" && isset($price_id)){

	if(CModule::IncludeModule("iblock")) {

		$res = CIBlockElement::GetList(
			array("SORT"=>"ASC"),
			array("IBLOCK_ID"=>$IBLOCK_ID_CITY, "ACTIVE"=>"Y", "PROPERTY_PRICE_ID"=>$price_id),
			false,
			false,
			array("ID", "IBLOCK_ID", "NAME", "PROPERTY_CITY_ID")
		);
		while($ob = $res->GetNextElement()){
			$arCity = $ob->GetFields();
		}

	} else ShowError('Не получилось подключить модуль «iblock»');

}
$cit = $arCity["PROPERTY_CITY_ID_VALUE"];
?>
<?if(!empty($arCity)):?>
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('input[name="ORDER_PROP_5"]').val(<?=$cit?>);
		submitForm();
	});
})(jQuery)
</script>
<?endif;?>