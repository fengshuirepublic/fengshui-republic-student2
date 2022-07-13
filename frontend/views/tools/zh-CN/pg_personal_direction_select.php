<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<div class="offset-md-3 col-md-9 px-sm-1">
						<label for="">请选择生日 :</label>
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
						<option value="<?= $i ?>" <?= $year == $i ? 'selected' : '' ?>><?= $i ?> 年</option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-month" class="form-control" name="PD[month]">
					<option value="1" <?= $month == '1' ? 'selected' : '' ?>>1月</option>
					<option value="2" <?= $month == '2' ? 'selected' : '' ?>>2月</option>
					<option value="3" <?= $month == '3' ? 'selected' : '' ?>>3月</option>
					<option value="4" <?= $month == '4' ? 'selected' : '' ?>>4月</option>
					<option value="5" <?= $month == '5' ? 'selected' : '' ?>>5月</option>
					<option value="6" <?= $month == '6' ? 'selected' : '' ?>>6月</option>
					<option value="7" <?= $month == '7' ? 'selected' : '' ?>>7月</option>
					<option value="8" <?= $month == '8' ? 'selected' : '' ?>>8月</option>
					<option value="9" <?= $month == '9' ? 'selected' : '' ?>>9月</option>
					<option value="10" <?= $month == '10' ? 'selected' : '' ?>>10月</option>
					<option value="11" <?= $month == '11' ? 'selected' : '' ?>>11月</option>
					<option value="12" <?= $month == '12' ? 'selected' : '' ?>>12月</option>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-day" class="form-control" name="PD[day]">
					<?php for ($i=1; $i<32; $i++): ?>
						<option value="<?= $i ?>" <?= $day == $i ? 'selected' : '' ?>><?= $i ?>日</option>
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
				<label for="">请选择性别 :</label>
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