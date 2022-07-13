<div class="form-row justify-content-center">
	<div class="col-12 text-center">
		<label for="house-facing">Please choose your house facing direction :</label>
	</div>
	<div class="col-auto">
		<select id="house-facing" class="form-control" name="EM[facing]">
			<option value="east" <?= $facing      == 'east' ? 'selected' : '' ?>>Facing East</option>
			<option value="southwest" <?= $facing == 'southwest' ? 'selected' : '' ?>>Facing Southwest</option>
			<option value="northeast" <?= $facing == 'northeast' ? 'selected' : '' ?>>Facing Northeast</option>
			<option value="southeast" <?= $facing == 'southeast' ? 'selected' : '' ?>>Facing Southeast</option>
			<option value="south" <?= $facing     == 'south' ? 'selected' : '' ?>>Facing South</option>
			<option value="north" <?= $facing     == 'north' ? 'selected' : '' ?>>Facing North</option>
			<option value="northwest" <?= $facing == 'northwest' ? 'selected' : '' ?>>Facing Northwest</option>
			<option value="west" <?= $facing      == 'west' ? 'selected' : '' ?>>Facing West</option>
		</select>
	</div>
	<div class="col-auto">
		<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Check') ?></button>
	</div>
</div>