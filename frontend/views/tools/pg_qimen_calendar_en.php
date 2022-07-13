<div class="form-row">
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-year" class="form-control" name="Qimen[en][year]">
			<?php for ($i=2025; $i>1910; $i--): ?>
				<option value="<?= $i ?>"><?= $i ?> year</option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-month" class="form-control" name="Qimen[en][month]">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-day" class="form-control" name="Qimen[en][day]">
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
				<option value="<?= $i ?>"><?= $n ?></option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-hour" class="form-control" name="Qimen[en][hour]">
			<?php for ($i=0; $i<24; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?> hour</option>
			<?php endfor; ?>
		</select>
	</div>
	<div class="col-12 col-lg-2 mb-2">
		<select id="en-minute" class="form-control" name="Qimen[en][minute]">
			<?php for ($i=0; $i<60; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?> minute</option>
			<?php endfor; ?>
		</select>
	</div>
</div>