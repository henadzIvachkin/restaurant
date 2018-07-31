<?php
    use yii\helpers\Html;
?>
<section class="sign-up">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Signup for our newsletters</h2>
                </div>
            </div>
        </div>


        <?= Html::beginForm('/site/subscribe','post',['id'=>'contact'])?>
            <div class="row">
                <div class="col-md-4 col-md-offset-3">
                    <fieldset>
                        <?= Html::input('text','email',false,['class'=>'form-control','id'=>'email','placeholder'=>'Enter your email here...','required'=>''])?>
                    </fieldset>
                </div>
                <div class="col-md-2">
                    <fieldset>
                        <?= Html::submitButton('Send message',['id'=>'form-submit','class'=>'btn','type'=>'submit'])?>
                    </fieldset>
                </div>
            </div>
        <?= Html::endForm()?>
    </div>

    <div id="div1"></div>

</section>

<div class="modal fade" tabindex="-1" role="dialog" id="subscribeModal">
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