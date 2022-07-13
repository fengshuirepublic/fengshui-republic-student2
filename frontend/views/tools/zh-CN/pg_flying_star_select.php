<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
		<div class="form-group">
			<label for="house-facing">请选择屋子面对的方向 :</label>
			<select id="house-facing" class="form-control" name="FS[facing]">
				<option value="f1" <?= $facing  == 'f1' ? 'selected' : '' ?>>向丙</option>
				<option value="f2" <?= $facing  == 'f2' ? 'selected' : '' ?>>向午 / 丁</option>
				<option value="f3" <?= $facing  == 'f3' ? 'selected' : '' ?>>向未</option>
				<option value="f4" <?= $facing  == 'f4' ? 'selected' : '' ?>>向坤 / 申</option>
				<option value="f5" <?= $facing  == 'f5' ? 'selected' : '' ?>>向庚</option>
				<option value="f6" <?= $facing  == 'f6' ? 'selected' : '' ?>>向酉 / 辛</option>
				<option value="f7" <?= $facing  == 'f7' ? 'selected' : '' ?>>向戌</option>
				<option value="f8" <?= $facing  == 'f8' ? 'selected' : '' ?>>向乾 / 亥</option>
				<option value="f9" <?= $facing  == 'f9' ? 'selected' : '' ?>>向壬</option>
				<option value="f10" <?= $facing == 'f10' ? 'selected' : '' ?>>向子 / 癸</option>
				<option value="f11" <?= $facing == 'f11' ? 'selected' : '' ?>>向丑</option>
				<option value="f12" <?= $facing == 'f12' ? 'selected' : '' ?>>向艮 / 寅</option>
				<option value="f13" <?= $facing == 'f13' ? 'selected' : '' ?>>向甲</option>
				<option value="f14" <?= $facing == 'f14' ? 'selected' : '' ?>>向卯 / 乙</option>
				<option value="f15" <?= $facing == 'f15' ? 'selected' : '' ?>>向辰</option>
				<option value="f16" <?= $facing == 'f16' ? 'selected' : '' ?>>向巽 / 巳</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
		<div class="form-group">
			<label for="house-period">请选择屋子的元运 :</label>
			<select id="house-period" class="form-control" name="FS[period]">
				<option value="p1" <?= $period == 'p1' ? 'selected' : '' ?>>元运一</option>
				<option value="p2" <?= $period == 'p2' ? 'selected' : '' ?>>元运二</option>
				<option value="p3" <?= $period == 'p3' ? 'selected' : '' ?>>元运三</option>
				<option value="p4" <?= $period == 'p4' ? 'selected' : '' ?>>元运四</option>
				<option value="p5" <?= $period == 'p5' ? 'selected' : '' ?>>元运五</option>
				<option value="p6" <?= $period == 'p6' ? 'selected' : '' ?>>元运六</option>
				<option value="p7" <?= $period == 'p7' ? 'selected' : '' ?>>元运七</option>
				<option value="p8" <?= $period == 'p8' ? 'selected' : '' ?>>元运八</option>
				<option value="p9" <?= $period == 'p9' ? 'selected' : '' ?>>元运九</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
		<div class="form-group">
			<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Check') ?></button>
		</div>
	</div>
</div>