<div class="login-panel panel panel-default">
         <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
<?php echo $this->Form->create('User',array('id'=>'myForm','type' => 'file','role'=>'form')); ?>
<fieldset>
        <div <?php echo $result!='forgot' ? ' style="display:block;"' :  ' style="display:none;"';?>>
                 <?php
                echo $this->Form->input('username',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'Username'));
                echo $this->Form->input('password',array('div'=>false,'error'=>false, 'before' => '<div class="form-group">', 'after' => '</div>', 'class'=>'validate[required] form-control','placeholder'=>'Password'));
                ?>
                <?php echo $this->Form->submit(__('Login'),array('div'=>false, 'class'=>'btn btn-lg btn-success btn-block'));	?>
        		<br /><div class="forgottabs loginlink"><font>Can't access your account?</font></div>
   		</div>
    <div id="loginBox" class="forgotBox clearfix" <?php echo $result=='forgot' ? ' style="display:block;"' :  ' style="display:none;"';?>>
        <div id="login">
            <p>Forgot your username or password? No worries, enter your email address below and we will hook you up.</p>
            <dl class="inline-login">
                <?php
                echo $this->Form->input('email',array('div'=>false,'error'=>false,'label' => 'Email Address', 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required,custom[email]]'));
                ?>
                <?php echo $this->Form->submit(__('Get New Password'),array('div'=>false, 'before' => '<dt class="logbtn">', 'after' => '</dt>'));	?>
            </dl>
        </div>
        <div class="logintabs loginlink"><font>Back to login page</font></div>
    </div>
<?php echo $this->Form->end(); ?>
  </div>
                </div>
