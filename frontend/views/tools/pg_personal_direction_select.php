<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<div class="offset-md-3 col-md-9 px-sm-1">
						<label for="">Please choose your date of birth :</label>
					</div>
				</div>
			</div>
</div>
<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
		<div class="form-group row">
			<div class="offset-md-3 col-md-2 px-sm-1 mb-2">
				<select id="en-year" class="form-control" name="PD[year]">
					<?php for ($i=2025; $i>1920; $i--): ?>
						<option value="<?= $i ?>" <?= $year == $i ? 'selected' : '' ?>><?= $i ?> year</option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-month" class="form-control" name="PD[month]">
					<option value="1" <?= $month == '1' ? 'selected' : '' ?>>January</option>
					<option value="2" <?= $month == '2' ? 'selected' : '' ?>>February</option>
					<option value="3" <?= $month == '3' ? 'selected' : '' ?>>March</option>
					<option value="4" <?= $month == '4' ? 'selected' : '' ?>>April</option>
					<option value="5" <?= $month == '5' ? 'selected' : '' ?>>May</option>
					<option value="6" <?= $month == '6' ? 'selected' : '' ?>>June</option>
					<option value="7" <?= $month == '7' ? 'selected' : '' ?>>July</option>
					<option value="8" <?= $month == '8' ? 'selected' : '' ?>>August</option>
					<option value="9" <?= $month == '9' ? 'selected' : '' ?>>September</option>
					<option value="10" <?= $month == '10' ? 'selected' : '' ?>>October</option>
					<option value="11" <?= $month == '11' ? 'selected' : '' ?>>November</option>
					<option value="12" <?= $month == '12' ? 'selected' : '' ?>>December</option>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-day" class="form-control" name="PD[day]">
					<?php for ($i=1; $i<32; $i++): ?>
						<?php 
							if (!in_array(($i % 100), array(11,12,13))) {
								$n = $i;
								switch ($n % 10) {
									// Handle 1st, 2nd, 3rd
									case 1:  $n = $n.'st';break;
									case 2:  $n = $n.'nd';break;
									case 3:  $n = $n.'rd';break;
									default: $n = $n.'th';break;
								}
							} else {
								$n = $i;
								$n = $n.'th';
							}
						?>
						<option value="<?= $i ?>" <?= $day == $i ? 'selected' : '' ?>><?= $n ?></option>
					<?php endfor; ?>
				</select>
			</div>
		</div>
	</div>
</div>
<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
		<div class="form-group row">
			<div class="offset-md-3 col-md-9 px-sm-1">
				<label for="">Please choose your gender :</label>
			</div>
		</div>
	</div>
</div>
<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
		<div class="form-group row">
			<div class="offset-md-3 col-md-9 px-sm-1">
				<div class="form-check form-check-inline" style="width: 80px;">
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" name="PD[gender]" id="pd-male" value="0" required>
						<label class="custom-control-label" for="pd-male"><?= Yii::t('app', 'Male') ?></label>
					</div>
				</div>
				<div class="form-check form-check-inline">
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" name="PD[gender]" id="pd-female" value="1" required>
						<label class="custom-control-label" for="pd-female"><?= Yii::t('app', 'Female') ?></label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
		<div class="form-group row">
			<div class="offset-md-3 col-md-9 px-sm-1">
				<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Check') ?></button>
			</div>
		</div>
	</div>
</div>