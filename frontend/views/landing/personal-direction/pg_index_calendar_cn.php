<div class="form-row justify-content-center">
	<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
		<div class="form-group row">
			<div class="offset-md-1 col-md-2 px-sm-1 mb-2">
				<select class="form-control" name="pd[cn][year]" required>
					<?php for ($i=2025; $i>1910; $i--): ?>
						<option value="<?= $i ?>"><?= $i ?> 年</option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select class="form-control" name="pd[cn][month]" required>
					<option value="正月">正月</option>
					<option value="二月">二月</option>
					<option value="三月">三月</option>
					<option value="四月">四月</option>
					<option value="五月">五月</option>
					<option value="六月">六月</option>
					<option value="七月">七月</option>
					<option value="八月">八月</option>
					<option value="九月">九月</option>
					<option value="十月">十月</option>
					<option value="十一">十一月</option>
					<option value="十二">十二月</option>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select class="form-control" name="pd[cn][day]" required>
					<option value="初一">初一</option>
					<option value="初二">初二</option>
					<option value="初三">初三</option>
					<option value="初四">初四</option>
					<option value="初五">初五</option>
					<option value="初六">初六</option>
					<option value="初七">初七</option>
					<option value="初八">初八</option>
					<option value="初九">初九</option>
					<option value="初十">初十</option>
					<option value="十一">十一</option>
					<option value="十二">十二</option>
					<option value="十三">十三</option>
					<option value="十四">十四</option>
					<option value="十五">十五</option>
					<option value="十六">十六</option>
					<option value="十七">十七</option>
					<option value="十八">十八</option>
					<option value="十九">十九</option>
					<option value="二十">二十</option>
					<option value="廿一">廿一</option>
					<option value="廿二">廿二</option>
					<option value="廿三">廿三</option>
					<option value="廿四">廿四</option>
					<option value="廿五">廿五</option>
					<option value="廿六">廿六</option>
					<option value="廿七">廿七</option>
					<option value="廿八">廿八</option>
					<option value="廿九">廿九</option>
					<option value="三十">三十</option>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<select class="form-control" name="pd[cn][hour]" required>
					<option value="0">早子 00</option>
					<option value="1">丑 01</option>
					<option value="3">寅 03</option>
					<option value="5">卯 05</option>
					<option value="7">辰 07</option>
					<option value="9">巳 09</option>
					<option value="11">午 11</option>
					<option value="13">未 13</option>
					<option value="15">申 15</option>
					<option value="17">酉 17</option>
					<option value="19">戌 19</option>
					<option value="21">亥 21</option>
					<option value="23">晚子 23</option>
				</select>
			</div>
			<div class="col-md-2 px-sm-1 mb-2">
				<div class="form-check col-form-label">
					<input class="form-check-input" type="checkbox" id="personal-direction-s_month" name="pd[cn][s_month]">
					<label class="form-check-label" for="personal-direction-s_month">闰月</label>
				</div>
			</div>
		</div>
	</div>
</div>