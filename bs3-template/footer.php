<?if($APPLICATION->GetCurPage(false) == "/"):?>
			</div>
		</div>
	</div>
</div>
<?else:?>
			</div>
		</div>
	</div>
</div>
<?endif?>

<div class="wrap-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="copyright">
					<span>© 2015</span> <img src="<?=$APPLICATION->GetTemplatePath('img/copyright.png');?>" alt="">
				</div>
			</div>
			<div class="col-sm-3">
				<form role="form">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Поиск по сайту">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div> <!-- end wrapper -->
</body>
</html>