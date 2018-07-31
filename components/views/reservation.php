
<?php
use yii\helpers\Html;
?>

<section id="book-table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Book Your Table Now</h2>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-12">
                <div class="left-image">
                    <img src="/img/book_left_image.jpg" alt="">
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="right-info">
                    <h4>Reservation</h4>

                    <?= Html::beginForm('/site/reservation','post',['id'=>'reservation-form'])?>
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <?= Html::dropDownList('day','',[''=>'Select day',
                                                                    '1'=>'Monday',
                                                                    '2'=>'Tuesday',
                                                                    '3'=>'Wednesday',
                                                                    '4'=>'Thursday',
                                                                    '5'=>'Friday',
                                                                    '6'=>'Saturday',
                                                                    '7'=>'Sunday',],['required'=>''])?>

                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <?= Html::dropDownList('hour','',[''=>'Select hour',
                                                                    '10'=>'10:00',
                                                                    '11'=>'11:00',
                                                                    '12'=>'12:00',
                                                                    '13'=>'13:00',
                                                                    '14'=>'14:00',
                                                                    '15'=>'15:00',
                                                                    '16'=>'16:00',
                                                                    '17'=>'17:00',
                                                                    '18'=>'18:00',
                                                                    '19'=>'19:00',
                                                                    '20'=>'20:00',
                                                                    '21'=>'21:00',
                                                                    '22'=>'22:00',],['required'=>''])?>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <?= Html::input('text','name',false,['class'=>'form-control','id'=>'name','type'=>'name','placeholder'=>'Full name','required'=>''])?>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <?= Html::input('text','phone',false,['class'=>'form-control','id'=>'phone','type'=>'phone','placeholder'=>'Phone number','required'=>''])?>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <?= Html::dropDownList('persons','',[''=>'How many persons?',
                                                                    '1'=>'1 Person',
                                                                    '2'=>'2 Persons',
                                                                    '3'=>'3 Persons',
                                                                    '4'=>'4 Persons',
                                                                    '5'=>'5 Persons',
                                                                    '6'=>'6 Persons'],['class'=>'person','required'=>''])?>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <?= Html::submitButton('Book Table',['id'=>'reservation-submit','class'=>'btn','type'=>'submit'])?>
                                </fieldset>
                            </div>
                        </div>
                    <?= Html::endForm()?>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" tabindex="-1" role="dialog" id="contactModal">
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