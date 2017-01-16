<div class="row">
					<?php include($this->templates['left']); ?>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<div class="well no-padding">
							<form action="/login" method = 'post' id="login-form" class="smart-form client-form">
								<header><?php echo la::ng('Авторизация');?></header>
								<fieldset>
									<?php if (isset($_POST['login'])){?>
									<section>
										<div class="smart-form client-form">
				                            <div class="alert alert-danger fade in">
												<button class="close" data-dismiss="alert"> × </button>
												<i class="fa-fw fa fa-times"></i>
												<strong><?php echo la::ng('Ошибка!');?></strong> <?php echo la::ng('Неверная пара логин/пароль, попробуйте еще раз');?>
											</div>
										</div>
									</section>
	                            	<?php }?>
									<section>
										<label class="label"><?php echo la::ng('E-mail или никнейм');?></label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="login" value = '<?php echo @$post['login'];?>'>
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> <?php echo la::ng('Укажите свой email либо никнейм для авторизации');?></b></label>
									</section>

									<section>
										<label class="label"><?php echo la::ng('Пароль');?></label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="pass">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> <?php echo la::ng('Пароль для входа в систему');?></b> </label>
										<div class="note">
											<a href="/"><?php echo la::ng('Еще не зарегистрированы?');?></a>
										</div>
									</section>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary"><?php echo la::ng('Вход');?></button>
								</footer>
							</form>

						</div>


					</div>
				</div>
								<!-- MAIN APP JS FILE -->
		<script src="/design/js/app.js"></script>

		<script type="text/javascript">
			runAllForms();
			$(function() {
				// Validation
				var validat = $("#login-form").validate({

					// Rules for form validation
					rules : {
						login : {
							required : true
						},
						pass : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						login : {
							required : '<?php echo la::ng('E-mail или никнейм');?>'
						},
						pass : {
							required : '<?php echo la::ng('Введите пароль');?>',
							minlength : '<?php echo la::ng('Необходимо не менее {0} символов');?>',
							maxlength : '<?php echo la::ng('Необходимо ввести до {0} символов');?>'
						}
					},
					submitHandler : function(form) {
						$(form).ajaxSubmit({
							success : function() {
								$("#login-form").addClass('submited');
							}
						});
					},

					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});

			});
		</script>