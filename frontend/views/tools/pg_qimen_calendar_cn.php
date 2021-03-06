<div class="form-row">
	<div class="col-12 col-lg-2 mb-2">
		<select class="form-control" name="Qimen[cn][year]">
			<?php for ($i=2025; $i>1910; $i--): ?>
				<option value="<?= $i ?>"><?= $i ?> 年</option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select class="form-control" name="Qimen[cn][month]">
			<option value="1">正月</option>
			<option value="2">二月</option>
			<option value="3">三月</option>
			<option value="4">四月</option>
			<option value="5">五月</option>
			<option value="6">六月</option>
			<option value="7">七月</option>
			<option value="8">八月</option>
			<option value="9">九月</option>
			<option value="10">十月</option>
			<option value="11">十一月</option>
			<option value="12">十二月</option>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select class="form-control" name="Qimen[cn][day]">
			<option value="1">初一</option>
			<option value="2">初二</option>
			<option value="3">初三</option>
			<option value="4">初四</option>
			<option value="5">初五</option>
			<option value="6">初六</option>
			<option value="7">初七</option>
			<option value="8">初八</option>
			<option value="9">初九</option>
			<option value="10">初十</option>
			<option value="11">十一</option>
			<option value="12">十二</option>
			<option value="13">十三</option>
			<option value="14">十四</option>
			<option value="15">十五</option>
			<option value="16">十六</option>
			<option value="17">十七</option>
			<option value="18">十八</option>
			<option value="19">十九</option>
			<option value="20">二十</option>
			<option value="21">廿一</option>
			<option value="22">廿二</option>
			<option value="23">廿三</option>
			<option value="24">廿四</option>
			<option value="25">廿五</option>
			<option value="26">廿六</option>
			<option value="27">廿七</option>
			<option value="28">廿八</option>
			<option value="29">廿九</option>
			<option value="30">三十</option>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-hour" class="form-control" name="Qimen[cn][hour]">
			<?php for ($i=0; $i<24; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?> 时</option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-minute" class="form-control" name="Qimen[cn][minute]">
			<?php for ($i=0; $i<60; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?> 分</option>
			<?php endfor; ?>
		</select>
	</div>
</div>
<div class="form-row">
	<div class="col-12 col-lg-2 mb-2">
		<div class="form-check col-form-label">
			<input class="form-check-input" type="checkbox" id="qimen-s_month" name="Qimen[s_month]">
			<label class="form-check-label" for="qimen-s_month">闰月</label>
		</div>
	</div>
</div>