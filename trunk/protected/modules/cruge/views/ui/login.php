<?php if (Yii::app()->user->hasFlash('loginflash')): ?>
    <!--    <div class="alert alert-error">
            
        </div>-->
    <span class="help-inline">
        <?php echo Yii::app()->user->getFlash('loginflash'); ?>

    </span>
<?php else: ?>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'logon-form',
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="login-field">
        <label for="username">Usuario</label>
        <?php echo $form->textField($model, 'username', array('placeholder' => CrugeTranslator::t('logon', 'Username'))); ?>

        <i class="icon-user"></i>

        <?php echo $form->error($model, 'username'); ?>
    </div>
    <div class="form_row">
        <div class="login-field">
            <label for="password">Password</label>
            <?php echo $form->passwordField($model, 'password', array('placeholder' => Yii::t('app', CrugeTranslator::t('logon', "Password")))); ?>
            <i class="icon-lock"></i>

            <?php echo $form->error($model, 'password'); ?>


        </div>   
    </div>   

    <div class="login-button clearfix">
        <label class="checkbox pull-left">
            <div class="checker"><span>   <?php echo $form->checkBox($model, 'rememberMe'); ?> </span></div> Recordarme más tarde
        </label>
        <button type="submit" class="pull-right btn btn-large blue">
            <?php echo CrugeTranslator::t('logon', "Login") ?>
            <i class=" icon-long-arrow-right"></i>
        </button>
    </div>
    <div class="forgot-password">
        <?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
        <!--<a href="#forgot-pw" role="button" data-toggle="modal">Forgot password?</a>-->
    </div>

    <?php
    if (Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin') === 1)
        echo Yii::app()->user->ui->registrationLink;
    ?>
    <?php
    //	si el componente CrugeConnector existe lo usa:
    //
        if (Yii::app()->getComponent('crugeconnector') != null) {
        if (Yii::app()->crugeconnector->hasEnabledClients) {
            ?>
            <div class='crugeconnector'>
                <span><?php echo CrugeTranslator::t('logon', 'You also can login with'); ?>:</span>
                <ul>
                    <?php
                    $cc = Yii::app()->crugeconnector;
                    foreach ($cc->enabledClients as $key => $config) {
                        $image = CHtml::image($cc->getClientDefaultImage($key));
                        echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
    }
    ?>


    <?php $this->endWidget(); ?>
<?php endif; ?>
