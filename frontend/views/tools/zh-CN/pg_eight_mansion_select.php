<div class="form-row justify-content-center">
	<div class="col-12 text-center">
		<label for="house-facing">请选择屋子面对的方向 :</label>
	</div>
	<div class="col-auto">
		<select id="house-facing" class="form-control" name="EM[facing]">
			<option value="east" <?= $facing      == 'east' ? 'selected' : '' ?>>向东</option>
			<option value="southwest" <?= $facing == 'southwest' ? 'selected' : '' ?>>向西南</option>
			<option value="northeast" <?= $facing == 'northeast' ? 'selected' : '' ?>>向东北</option>
			<option value="southeast" <?= $facing == 'southeast' ? 'selected' : '' ?>>向东南</option>
			<option value="south" <?= $facing     == 'south' ? 'selected' : '' ?>>向南</option>
			<option value="north" <?= $facing     == 'north' ? 'selected' : '' ?>>向北</option>
			<option value="northwest" <?= $facing == 'northwest' ? 'selected' : '' ?>>向西北</option>
			<option value="west" <?= $facing      == 'west' ? 'selected' : '' ?>>向西</option>
		</select>
	</div>
	<div class="col-auto">
		<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Check') ?></button>
	</div>
</div>