<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\widgets\MaskedInput;
?>

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Us</h1>
                <p>Whatever drinking vinegar hella fingerstache shoreditch kickstarter kitsch. La croix hella iceland flexitarian letterpress.</p>
            </div>
        </div>
    </div>
</section>



<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-heading">
                    <h2>Message</h2>
                </div>
                    <?php $form = ActiveForm::begin([
                            'id' => 'feedback',
                            'enableAjaxValidation' => true
                    ]); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <?= $form
                                    ->field($model, 'name')
                                    ->textInput(['class'=>'form1-control','id'=>'name','placeholder'=>'Enter your name...','required'=>''])
                                    ->label(false)
                                ?>
                            </fieldset>
                            <fieldset>
                                <?= $form
                                    ->field($model, 'email')
                                    ->textInput(['class'=>'form-control','id'=>'email','placeholder'=>'Enter your email here...','required'=>''])
                                    ->label(false)
                                ?>
                            </fieldset>
                            <fieldset>
                                <?= $form
                                    ->field($model, 'phone')
                                    ->widget(MaskedInput::className(),['mask' => '+375-(99)-999-99-99'])
                                    ->textInput(['placeholder'=>'Enter your phone here...'])
                                    ->label(false)
                                ?>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <?= $form
                                    ->field($model, 'message')
                                    ->textarea(['placeholder'=>'Your message...','id'=>'message','class'=>'form-control','rows'=>'6','required'=>''])
                                    ->label(false) ?>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <?= Html::submitButton('Send message', ['id'=>'feedback-submit','class'=>'btn']) ?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>





            </div>
            <div class="col-md-6">
                <div class="section-heading contact-info">
                    <h2>Contact Info</h2>
                    <p>Pellentesque nec orci in erat venenatis viverra. Vivamus in lorem et leo feugiat ullamcorper. Donec volutpat fermentum erat non aliquet. Cras fermentum, risus a blandit sodales, erat turpis eleifend lacus, venenatis mollis leo lorem vel eros. Quisque et sem tempus, feugiat urna iaculis, tempor metus.<br><br><em>30 Raffles Ave, <br>Singapore 039803</em></p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="map">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="map">
                    <!-- How to change your own map point
                        1. Go to Google Maps
                        2. Click on your location point
                        3. Click "Share" and choose "Embed map" tab
                        4. Copy only URL and paste it within the src="" field below
                    -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7895.485196115994!2d103.85995441789784!3d1.2880401763270322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7fb4e58ad9cd826e!2sSingapore+Flyer!5e0!3m2!1sen!2sth!4v1505825620371" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" tabindex="-1" role="dialog" id="feedbackModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reservation</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->