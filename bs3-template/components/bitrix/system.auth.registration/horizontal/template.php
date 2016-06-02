<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="bx-auth">
	<?
	ShowMessage($arParams["~AUTH_RESULT"]);
	?>
	<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y" && is_array($arParams["AUTH_RESULT"]) &&  $arParams["AUTH_RESULT"]["TYPE"] === "OK"):?>
	<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
	<?else:?>

	<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
		<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
	<?endif?>
	<noindex>
	<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" class="form-horizontal">
	<?
	if(strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<?endif?>
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="REGISTRATION" />
		
		<h3><?=GetMessage("AUTH_REGISTER")?></h3>

		<div class="form-group">
			<label for="userName" class="col-sm-4 control-label"><?=GetMessage("AUTH_NAME")?></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="userName" placeholder="Name" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>">
			</div>
		</div>
		<div class="form-group">
			<label for="userLastName" class="col-sm-4 control-label"><?=GetMessage("AUTH_LAST_NAME")?></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="userLastName" placeholder="Last Name" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>">
			</div>
		</div>
		<div class="form-group">
			<label for="userLogin" class="col-sm-4 control-label"><span class="starrequired">*</span><?=GetMessage("AUTH_LOGIN_MIN")?></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="userLogin" placeholder="Login" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>">
			</div>
		</div>
		<div class="form-group">
			<label for="userPassword" class="col-sm-4 control-label"><span class="starrequired">*</span><?=GetMessage("AUTH_PASSWORD_REQ")?></label>
			<div class="col-sm-8">
				<input type="password" class="form-control" id="userPassword" placeholder="Password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" autocomplete="off">
				<?if($arResult["SECURE_AUTH"]):?>
					<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
						<div class="bx-auth-secure-icon"></div>
					</span>
					<noscript>
					<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
						<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
					</span>
					</noscript>
					<script type="text/javascript">
					document.getElementById('bx_auth_secure').style.display = 'inline-block';
					</script>
				<?endif?>
			</div>
		</div>
		<div class="form-group">
			<label for="userPassConfirm" class="col-sm-4 control-label"><span class="starrequired">*</span><?=GetMessage("AUTH_CONFIRM")?></label>
			<div class="col-sm-8">
				<input type="password" class="form-control" id="userPassConfirm" placeholder="Password confirm" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" autocomplete="off">
			</div>
		</div>
		<div class="form-group">
			<label for="userEmail" class="col-sm-4 control-label"><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?><?=GetMessage("AUTH_EMAIL")?></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="userEmail" placeholder="E-mail" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>">
			</div>
		</div>
		<!-- 
		<div class="form-group">
			<label for="qwe">qwe</label>
			<input type="text" class="form-control" id="qwe" placeholder="qwe" name="qwe" maxlength="50" value="qwe">
		</div>
		 -->
		<!-- //////////////////////////////// -->

		<?// ********************* User properties ***************************************************?>
		<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
		<table>
			<tr>
				<td colspan="2"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></td>
			</tr>
			<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
			<tr>
				<td><?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?><?=$arUserField["EDIT_FORM_LABEL"]?>:</td>
				<td>
					<?$APPLICATION->IncludeComponent(
						"bitrix:system.field.edit",
						$arUserField["USER_TYPE"]["USER_TYPE_ID"],
						array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS"=>"Y"));?>
				</td>
			</tr>
			<?endforeach;?>
		</table>
		<?endif;?>
		<?// ******************** /User properties ***************************************************

		/* CAPTCHA */
		if ($arResult["USE_CAPTCHA"] == "Y"):?>
		<div class="form-group">
			<label for="userCaptcha" class="col-sm-4 control-label"><span class="starrequired">*</span><?=GetMessage("CAPTCHA_REGF_TITLE")?></label>
			<div class="col-sm-8">
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<div class="row">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="userCaptcha" placeholder="Captcha code" name="captcha_word" maxlength="50" value="">
				</div>
				<div class="img-captcha col-sm-6">
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				</div>
				</div>
			</div>
		</div>
		<?endif;
		/* CAPTCHA */?>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<input type="submit" class="btn btn-default" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" />
			</div>
		</div>

		<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
		<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>
		<p><a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_AUTH")?></a></p>

	</form>
	</noindex>
	<script type="text/javascript">
	document.bform.USER_NAME.focus();
	</script>

	<?endif?>
</div>