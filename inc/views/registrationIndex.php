<div class="row">
					<?php include($this->templates['left']); ?>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<div class="well no-padding">
                            <?php if (isset($successRegistration)){?>
							<div class="smart-form client-form">
								<header><?php echo la::ng('Регистрация в системе');?></header>
	                            <div class="alert alert-success fade in">
									<button class="close" data-dismiss="alert"> × </button>
									<i class="fa-fw fa fa-check"></i>
									<strong><?php echo la::ng('Поздравляем!');?></strong> <?php echo la::ng('Вы успешно зарегистрировались в нашей системе, теперь можете авторизоваться и приступать к работе. Сейчас вы будете перенаправлены в личный кабинет...');?>
								</div>
							</div>
							<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=/">
                            <?php }else{ ?>
							<form method = 'post' enctype = 'multipart/form-data' id="smart-form-register" class="smart-form client-form">
								<header><?php echo la::ng('Станьте участником системы');?></header>
								<fieldset>
									<?php if(isset($failRegistration)){?>
									<section>
										<div class="smart-form client-form">
				                            <div class="alert alert-danger fade in">
												<button class="close" data-dismiss="alert"> × </button>
												<i class="fa-fw fa fa-times"></i>
												<strong><?php echo la::ng('Ошибка!');?></strong> <?php echo la::ng('Зарегистрироваться не удалось, попробуйте еще раз');?>
											</div>
										</div>
									</section>
									<?php } ?>
									<section>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="username" placeholder="<?php echo la::ng('Никнейм');?>" value = '<?php echo @$post['username'];?>'>
											<b class="tooltip tooltip-bottom-right"><?php echo la::ng('Необходим для авторизации');?></b> </label>
									</section>

									<section>
										<label class="input"> <i class="icon-append fa fa-envelope"></i>
											<input type="email" name="email" placeholder="<?php echo la::ng('Email адрес');?>" value = '<?php echo @$post['email'];?>'>
											<b class="tooltip tooltip-bottom-right"><?php echo la::ng('Необходим для авторизации и восстановления доступа');?></b> </label>
									</section>

									<section>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="pass" placeholder="<?php echo la::ng('Пароль');?>" id="password">
											<b class="tooltip tooltip-bottom-right"><?php echo la::ng('Запомните его или запишите');?></b> </label>
									</section>

									<section>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="pass2" placeholder="<?php echo la::ng('Подтвердите пароль');?>">
											<b class="tooltip tooltip-bottom-right"><?php echo la::ng('Должен совпадать с предыдущим полем');?></b> </label>
									</section>
									<section>
										<div class="input input-file">
											<span class="button"><input type="file" id="file" name="file" onchange="$('#filePlaceholder').val(this.value);"><?php echo la::ng('Обзор');?></span>
											<input type="text" placeholder="<?php echo la::ng('Выберите рисунок');?>" id = 'filePlaceholder' readonly="">
										</div>
									</section>
								</fieldset>

								<fieldset>
									<div class="row">
										<section class="col col-6">
											<label class="input">
												<input type="text" name="firstName" placeholder="<?php echo la::ng('Ваше имя');?>" value = '<?php echo @$post['firstName'];?>'>
											</label>
										</section>
										<section class="col col-6">
											<label class="input">
												<input type="text" name="lastName" placeholder="<?php echo la::ng('Ваша фамилия');?>" value = '<?php echo @$post['lastName'];?>'>
											</label>
										</section>
									</divЮ

									<div class="row">
										<section class="col col-6">
											<label class="select">
												<select name="status">
													<option value="0"><?php echo la::ng('Статус');?></option>
													<option value="1" <?php if(@$post['status'] == 1) echo 'selected';?>><?php echo la::ng('Работодатель');?></option>
													<option value="2" <?php if(@$post['status'] == 2) echo 'selected';?>><?php echo la::ng('Соискатель');?></option>
												</select> <i></i> </label>
										</section>
										<section class="col col-6">
											<label class="input">
											<i class="icon-append fa fa-phone"></i>
												<input type="text" name="phone" placeholder="<?php echo la::ng('Номер мобильного телефона');?>" value = '<?php echo @$post['phone'];?>'>
											</label>

										</section>
									</div>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										<?php echo la::ng('Регистрация');?>
									</button>
								</footer>

							</form>
                            <?php }?>

						</div>
					</div>
				</div>
				<!-- MAIN APP JS FILE -->
		<script src="/design/js/app.js"></script>

		<script type="text/javascript">
			runAllForms();
			$(function() {
				// Validation
				var validat = $("#smart-form-register").validate({

					// Rules for form validation
					rules : {
						username : {
							required : true,
							remote: {
								url: "/backend/registration/validate",
								type: "post"
							}
						},
						email : {
							required : true,
							email : true,
							remote: {								url: "/backend/registration/validate",
								type: "post"
							}
						},
						pass : {
							required : true,
							minlength : 3,
							maxlength : 20
						},
						pass2 : {
							required : true,
							minlength : 3,
							maxlength : 20,
							equalTo : '#password'
						},
						firstName : {
							required : true
						},
						lastName : {
							required : true
						},
						status : {
							required : true
						}
					},

					// Messages for form validation
					messages : {
						username : {
							required : '<?php echo la::ng('Введие ваш никнейм');?>',
							remote :  '<?php echo la::ng('Указанный никнейм уже зарегистрирован, попробуйте другой');?>'
						},
						email : {
							required : '<?php echo la::ng('Введите ваш email адрес');?>',
							email : '<?php echo la::ng('Email адрес должен быть валиден');?>',
							remote :  '<?php echo la::ng('Указанный email уже зарегистрирован, попробуйте другой');?>'
						},
						pass : {
							required : '<?php echo la::ng('Введите пароль');?>',
							minlength : '<?php echo la::ng('Необходимо не менее {0} символов');?>',
							maxlength : '<?php echo la::ng('Необходимо ввести до {0} символов');?>'
						},
						pass2 : {
							required : '<?php echo la::ng('Введите ваш пароль еще раз');?>',
							equalTo : '<?php echo la::ng('Пароль должен совпадать с предыдущим полем');?>',
							minlength : '<?php echo la::ng('Необходимо не менее {0} символов');?>',
							maxlength : '<?php echo la::ng('Необходимо ввести до {0} символов');?>'
						},
						firstName : {
							required : '<?php echo la::ng('Введите ваше имя');?>'
						},
						lastName : {
							required : '<?php echo la::ng('Введите вашу фамилию');?>'
						},
						status : {
							required : '<?php echo la::ng('Выберите ваш статус');?>'
						}
					},
					submitHandler : function(form) {
						//$(form).submit();
						$(form).ajaxSubmit({
							success : function() {
								$("#smart-form-register").addClass('submited');
							}
						});
					},

					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});

			});
		</script>