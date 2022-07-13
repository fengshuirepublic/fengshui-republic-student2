<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
		<div class="form-group">
			<label for="house-facing">Please choose your house facing direction :</label>
			<select id="house-facing" class="form-control" name="FS[facing]">
				<option value="f1" <?= $facing  == 'f1' ? 'selected' : '' ?>>Facing S1</option>
				<option value="f2" <?= $facing  == 'f2' ? 'selected' : '' ?>>Facing S2 / S3</option>
				<option value="f3" <?= $facing  == 'f3' ? 'selected' : '' ?>>Facing SW1</option>
				<option value="f4" <?= $facing  == 'f4' ? 'selected' : '' ?>>Facing SW2 / SW3</option>
				<option value="f5" <?= $facing  == 'f5' ? 'selected' : '' ?>>Facing W1</option>
				<option value="f6" <?= $facing  == 'f6' ? 'selected' : '' ?>>Facing W2 /W3</option>
				<option value="f7" <?= $facing  == 'f7' ? 'selected' : '' ?>>Facing NW1</option>
				<option value="f8" <?= $facing  == 'f8' ? 'selected' : '' ?>>Facing NW2 / NW3</option>
				<option value="f9" <?= $facing  == 'f9' ? 'selected' : '' ?>>Facing N1</option>
				<option value="f10" <?= $facing == 'f10' ? 'selected' : '' ?>>Facing N2 / N3</option>
				<option value="f11" <?= $facing == 'f11' ? 'selected' : '' ?>>Facing NE1</option>
				<option value="f12" <?= $facing == 'f12' ? 'selected' : '' ?>>Facing NE2 / NE3</option>
				<option value="f13" <?= $facing == 'f13' ? 'selected' : '' ?>>Facing E1</option>
				<option value="f14" <?= $facing == 'f14' ? 'selected' : '' ?>>Facing E2 / E3</option>
				<option value="f15" <?= $facing == 'f15' ? 'selected' : '' ?>>Facing SE1</option>
				<option value="f16" <?= $facing == 'f16' ? 'selected' : '' ?>>Facing SE2 / SE3</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
		<div class="form-group">
			<label for="house-period">Please choose your house period :</label>
			<select id="house-period" class="form-control" name="FS[period]">
				<option value="p1" <?= $period == 'p1' ? 'selected' : '' ?>>Period 1</option>
				<option value="p2" <?= $period == 'p2' ? 'selected' : '' ?>>Period 2</option>
				<option value="p3" <?= $period == 'p3' ? 'selected' : '' ?>>Period 3</option>
				<option value="p4" <?= $period == 'p4' ? 'selected' : '' ?>>Period 4</option>
				<option value="p5" <?= $period == 'p5' ? 'selected' : '' ?>>Period 5</option>
				<option value="p6" <?= $period == 'p6' ? 'selected' : '' ?>>Period 6</option>
				<option value="p7" <?= $period == 'p7' ? 'selected' : '' ?>>Period 7</option>
				<option value="p8" <?= $period == 'p8' ? 'selected' : '' ?>>Period 8</option>
				<option value="p9" <?= $period == 'p9' ? 'selected' : '' ?>>Period 9</option>
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