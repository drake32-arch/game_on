<?php
/*
 * Страница оформления заказа, файл views/order/checkout.php
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


$f_name = '';
$s_name = '';
$th_name = '';
$address = '';
$m_phone = '';
$email = '';


if (Yii::$app->session->hasFlash('checkout-data')) {
    $data = Yii::$app->session->getFlash('checkout-data');
    $f_name = Html::encode($data['Имя']);
    $s_name =  Html::encode($data['Фамиля']);
    $th_name =  Html::encode($data['Отчество']);
    $address = Html::encode($data['Адрес доставки']);
    $m_phone = Html::encode($data['Телефон']);
    $email = Html::encode($data['Email']);
}

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Оформление заказа</h1>
                <br></br>
                <div id="checkout">
                <?php
                    $success = false;
                    if (Yii::$app->session->hasFlash('checkout-success')) {
                        $success = Yii::$app->session->getFlash('checkout-success');
                    }
                    ?>

                    <?php if (!$success): ?>
                        <?php if (Yii::$app->session->hasFlash('checkout-errors')): ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close"
                                        data-dismiss="alert" aria-label="Закрыть">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p>При заполнении формы допущены ошибки</p>
                                <?php $allErrors = Yii::$app->session->getFlash('checkout-errors'); ?>
                                <ul>
                                    <?php foreach ($allErrors as $errors): ?>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error; ?></li>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                    <?php
                    $form = ActiveForm::begin(
                        ['id' => 'checkout-form', 'class' => 'form-horizontal']
                    );
                    ?>
                    <?= $form->field($buyer, 'f_name')->textInput(); ?>
                    <?= $form->field($buyer, 's_name')->textInput(); ?>
                    <?= $form->field($buyer, 'th_name')->textInput(); ?>
                    <?= $form->field($buyer, 'address')->textarea(['rows' => 2]); ?>
                    <?= $form->field($buyer, 'm_phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7 (999) 999-99-99',])->textInput(['maxlength' => true]) ?>
                    <?= $form->field($buyer, 'email')->textInput(); ?>
                    
                  
                    <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary']); ?>
                    <?php ActiveForm::end(); ?>
                    <?php else: ?>
                        <p>Ваш заказ успешно оформлен, спасибо за покупку.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>