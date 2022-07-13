<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
		<div class="form-group row">
			<div class="offset-md-1 col-md-2 px-sm-1 mb-2">
				<select id="en-year" class="form-control" name="pd[en][year]" required>
					<?php for ($i=2025; $i>1910; $i--): ?>
						<option value="<?= $i ?>"><?= $i ?> year</option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-month" class="form-control" name="pd[en][month]" required>
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
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-day" class="form-control" name="pd[en][day]" required>
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
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-hour" class="form-control" name="pd[en][hour]" required>
					<?php for ($i=0; $i<24; $i++): ?>
						<option value="<?= $i ?>"><?= $i ?> hour</option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select id="en-minute" class="form-control" name="pd[en][minute]" required>
					<?php for ($i=0; $i<60; $i++): ?>
						<option value="<?= $i ?>"><?= $i ?> minute</option>
					<?php endfor; ?>
				</select>
			</div>
		</div>
	</div>
</div>