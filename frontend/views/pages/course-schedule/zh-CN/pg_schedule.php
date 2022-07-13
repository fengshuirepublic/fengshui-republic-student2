<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/course/all-schedules.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'ALL SCHEDULES');

$this->registerCss('
	.table-bordered td {
		vertical-align: middle;
		background-color: rgba(0, 0, 0, 0.2);
	}

	.table-bordered tr td:first-child {
		width: 50%;
	}

	td:nth-child(2) {
		width: 20%;
	}

	td:nth-child(3) {
		width: 30%;
	}

	.btn-primary:hover {
		background-color: transparent;
	}

	.know-more {
		border: 1px solid #fff;
		background-color: transparent;
		margin-top: -1.7em;
	}
');

$this->registerJs('
	$(".know-more").click(function () {
		var data = $(this).data();
		$("#enquiry_type").val(data.course);
	})

	$("#enquiry_area").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-area-textarea").append("<textarea name=\"Enquiry[info][areaOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-area-textarea").empty();
		}
	});
', View::POS_END);

?>

<div id="bg-spark">
	<div class="container pb-0 pb-md-5">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<h5 class="text-center fsrepublic-text-white pt-5 mb-0"><?= date('Y') ?> 课程时间表</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<img src="../images/fr/line.png" class="img-fluid w-100">
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto pb-5">
				<div class="accordion" id="scheduleList">
					<div class="row">
						<div class="col-12">
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading01" aria-expanded="true" aria-controls="collapse01">
									<ol class="pl-0 mb-0" style="list-style-type:none">
										<li class="text-left text-md-center fsrepublic-text-white">
											八字课程
											<button type="button" class="btn btn-primary py-0 d-flex ml-auto know-more fsrepublic-text-white" data-toggle="modal" data-target="#enquiryModal" data-course="Bazi">
												<i class="fa fa-info m-1 d-block d-md-none"></i><span class="d-none d-md-block">了解更多</span>
											</button>
										</li>
									</ol>
								</div>
								<div id="collapse01" class="collapse show" aria-labelledby="heading01">
									<div class="card-body px-0">
										<div class="row">
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">吉隆坡</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'KL' && $group->type == 'Bazi'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL' && $schedule->type == 'Bazi'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">新山</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'JB' && $group->type == 'Bazi'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB' && $schedule->type == 'Bazi'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading02" aria-expanded="true" aria-controls="collapse02">
									<ol class="pl-0 mb-0" style="list-style-type:none">
										<li class="text-left text-md-center fsrepublic-text-white">
											奇门课程
											<button type="button" class="btn btn-primary py-0 d-flex ml-auto know-more fsrepublic-text-white" data-toggle="modal" data-target="#enquiryModal" data-course="Qimen Dunjia">
												<i class="fa fa-info m-1 d-block d-md-none"></i><span class="d-none d-md-block">了解更多</span>
											</button>
										</li>
									</ol>
								</div>
								<div id="collapse02" class="collapse show" aria-labelledby="heading02">
									<div class="card-body px-0">
										<div class="row">
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">吉隆坡</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'KL' && $group->type == 'Qimen'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL' && $schedule->type == 'Qimen'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">新山</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'JB' && $group->type == 'Qimen'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB' && $schedule->type == 'Qimen'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading03" aria-expanded="true" aria-controls="collapse03">
									<ol class="pl-0 mb-0" style="list-style-type:none">
										<li class="text-left text-md-center fsrepublic-text-white">
											易经课程
											<button type="button" class="btn btn-primary py-0 d-flex ml-auto know-more fsrepublic-text-white" data-toggle="modal" data-target="#enquiryModal" data-course="Yijing">
												<i class="fa fa-info m-1 d-block d-md-none"></i><span class="d-none d-md-block">了解更多</span>
											</button>
										</li>
									</ol>
								</div>
								<div id="collapse03" class="collapse show" aria-labelledby="heading03">
									<div class="card-body px-0">
										<div class="row">
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">吉隆坡</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'KL' && $group->type == 'Yijing'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL' && $schedule->type == 'Yijing'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">新山</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'JB' && $group->type == 'Yijing'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB' && $schedule->type == 'Yijing'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading04" aria-expanded="true" aria-controls="collapse04">
									<ol class="pl-0 mb-0" style="list-style-type:none">
										<li class="text-left text-md-center fsrepublic-text-white">
											风水课程
											<button type="button" class="btn btn-primary py-0 d-flex ml-auto know-more fsrepublic-text-white" data-toggle="modal" data-target="#enquiryModal" data-course="Fengshui">
												<i class="fa fa-info m-1 d-block d-md-none"></i><span class="d-none d-md-block">了解更多</span>
											</button>
										</li>
									</ol>
								</div>
								<div id="collapse04" class="collapse show" aria-labelledby="heading04">
									<div class="card-body px-0">
										<div class="row">
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">吉隆坡</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'KL' && $group->type == 'Fengshui'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL' && $schedule->type == 'Fengshui'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">新山</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'JB' && $group->type == 'Fengshui'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB' && $schedule->type == 'Fengshui'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">吉隆坡和新山</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'KL & JB'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL & JB'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
																			<?php endif; ?>

																			<?php $mid = floor($group->cnt/2); ?>
																			<?php if ($rep > $mid): ?>
																				<?php $location = 'JB'; ?>
																			<?php else: ?>
																				<?php $location = 'KL'; ?>
																			<?php endif; ?>

																			<td><?= date("d F", strtotime($schedule->date)) ?> (<?= $location ?>)</td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading05" aria-expanded="true" aria-controls="collapse05">
									<ol class="pl-0 mb-0" style="list-style-type:none">
										<li class="text-left text-md-center fsrepublic-text-white">
											形家一眼断课程
											<button type="button" class="btn btn-primary py-0 d-flex ml-auto know-more fsrepublic-text-white" data-toggle="modal" data-target="#enquiryModal" data-course="Yi Yan Duan">
												<i class="fa fa-info m-1 d-block d-md-none"></i><span class="d-none d-md-block">了解更多</span>
											</button>
										</li>
									</ol>
								</div>
								<div id="collapse05" class="collapse show" aria-labelledby="heading05">
									<div class="card-body px-0">
										<div class="row">
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">吉隆坡</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'KL' && $group->type == 'Yiyanduan'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL' && $schedule->type == 'Yiyanduan'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">新山</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'JB' && $group->type == 'Yiyanduan'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB' && $schedule->type == 'Yiyanduan'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading06" aria-expanded="true" aria-controls="collapse06">
									<ol class="pl-0 mb-0" style="list-style-type:none">
										<li class="text-left text-md-center fsrepublic-text-white">
											面相课程
											<button type="button" class="btn btn-primary py-0 d-flex ml-auto know-more fsrepublic-text-white" data-toggle="modal" data-target="#enquiryModal" data-course="Mian Xiang">
												<i class="fa fa-info m-1 d-block d-md-none"></i><span class="d-none d-md-block">了解更多</span>
											</button>
										</li>
									</ol>
								</div>
								<div id="collapse06" class="collapse show" aria-labelledby="heading06">
									<div class="card-body px-0">
										<div class="row">
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">吉隆坡</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'KL' && $group->type == 'Mianxiang'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL' && $schedule->type == 'Mianxiang'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="col-12">
												<h5 class="text-center fsrepublic-text-white">新山</h5>
												<table class="table table-bordered table-sm text-center fsrepublic-text-white">
													<tbody>
														<?php foreach ($groups as $group): ?>
															<?php if ($group->location == 'JB' && $group->type == 'Mianxiang'): ?>
																<?php $rep = 1; ?>
																<?php foreach ($schedules as $schedule): ?>
																	<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB' && $schedule->type == 'Mianxiang'): ?>
																		<tr>
																			<?php if ($rep == 1): ?>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
																				<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
																			<?php endif; ?>
																			<td><?= date("d F", strtotime($schedule->date)) ?></td>
																		</tr>
																		<?php $rep++; ?>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">課程咨詢</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="課程咨詢">
				<div class="modal-body">
					<div class="form-group row">
						<label for="enquiry_title" class="col-sm-4 col-form-label text-left text-sm-right">*稱呼</label>
						<div class="col-sm-8">
							<select id="enquiry_title" name="Enquiry[title]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Mr">先生</option>
								<option value="Mrs">太太</option>
								<option value="Ms">女士</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*中文名字</label>
						<div class="col-sm-8">
							<input id="enquiry_chinese_name" class="form-control form-control-sm" type="text" name="Enquiry[name_cn]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_english_name" class="col-sm-4 col-form-label text-left text-sm-right">英文名字</label>
						<div class="col-sm-8">
							<input id="enquiry_english_name" class="form-control form-control-sm" type="text" name="Enquiry[name_en]">
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_contact" class="col-sm-4 col-form-label text-left text-sm-right">*聯絡號碼</label>
						<div class="col-sm-8">
							<input id="enquiry_contact" class="form-control form-control-sm" type="text" name="Enquiry[contact]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_email" class="col-sm-4 col-form-label text-left text-sm-right">*電郵地址</label>
						<div class="col-sm-8">
							<input id="enquiry_email" class="form-control form-control-sm" type="email" name="Enquiry[email]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*课程种类</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Fengshui">风水</option>
								<option value="Bazi">八字</option>
								<option value="Qimen Dunjia">奇门遁甲</option>
								<option value="Yijing">易经</option>
								<option value="Yi Yan Duan">一眼断</option>
								<option value="Mian Xiang">面相</option>
								<option value="All">全部</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_area" class="col-sm-4 col-form-label text-left text-sm-right">*地區</label>
						<div class="col-sm-8">
							<select id="enquiry_area" name="Enquiry[info][area]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Johor">柔佛</option>
								<option value="Selangor">雪蘭莪</option>
								<option value="Penang">檳城</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-area-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_remark" class="col-sm-4 col-form-label text-left text-sm-right">備註</label>
						<div class="col-sm-8">
							<textarea id="enquiry_remark" name="Enquiry[info][remark]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app', 'Close'); ?></button>
					<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Submit'); ?></button>
				</div>
			</form>
		</div>
	</div>
</div>


