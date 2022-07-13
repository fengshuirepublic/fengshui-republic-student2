<div class="form-row">
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-year" class="form-control" name="Qimen[en][year]">
			<?php for ($i=2025; $i>1910; $i--): ?>
				<option value="<?= $i ?>"><?= $i ?> 年</option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-month" class="form-control" name="Qimen[en][month]">
			<option value="1">1月</option>
			<option value="2">2月</option>
			<option value="3">3月</option>
			<option value="4">4月</option>
			<option value="5">5月</option>
			<option value="6">6月</option>
			<option value="7">7月</option>
			<option value="8">8月</option>
			<option value="9">9月</option>
			<option value="10">10月</option>
			<option value="11">11月</option>
			<option value="12">12月</option>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-day" class="form-control" name="Qimen[en][day]">
			<?php for ($i=1; $i<32; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?>日</option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-hour" class="form-control" name="Qimen[en][hour]">
			<?php for ($i=0; $i<24; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?> 时</option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-minute" class="form-control" name="Qimen[en][minute]">
			<?php for ($i=0; $i<60; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?> 分</option>
			<?php endfor; ?>
		</select>
	</div>
</div>