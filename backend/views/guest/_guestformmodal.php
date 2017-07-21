<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
//use kartik\file\FileInput;
//use bupy7\cropbox\Cropbox;
//use yii\imagine\Image;
//use yii\web\JsExpression;

//use backend\model\guest\GuestBranch;

//$guest_image =  Yii::$app->params['guest_image'];

//if(!is_null($modelGuest->id_guest)){
    //if(!is_null($modelGuest->image) or $modelGuest->image ==''){
        //$modelGuest->image;
    //}
//}
/* @var $this yii\web\View */
/* @var $modelGuest backend\modelGuests\guest\Guest */
/* @var $form yii\widgets\ActiveForm */
?>



    <div class="guest-form">
        <div class="col-xs-12 no-padding">
            <?php $form = ActiveForm::begin(['id'=>'createmodal-guest','options' => ['enctype'=>'multipart/form-data'],]); ?>
            <div class="col-md-12 no-padding">
                <div class="box box-widget widget-user view ">
                    <div class="widget-user-header bg-green-active">
                        <div class="widget-user-image">
                            <!--?php if (is_Null($modelGuest->image) or $modelGuest->image == '' ){
                                echo '<img class="img-circle" src="'.$guest_image.'" alt="User Avatar">';
                            }else{
                                echo $modelGuest->image;
                            } ?-->
                            <!-- Modal -->
                            <div id="userImage" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!--?php echo $form->field($modelGuest, 'file')->widget(Cropbox::className(), ['attributeCropInfo' => 'crop_info',]);?-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                                <!--label class="control-label">Status</label-->
                                <?= $form->field($modelGuest, 'id_guest_status')->checkbox(array('id'=>'id_guest_status', 'class'=>'onoffswitch-checkbox','label' => '','value'=>'1', 'checked'=>'checked'))?>
                                <!--script type="text/javascript"> var $ = jQuery.noConflict();$(window).ready(function(){$(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')})</script-->
                            </div>
                        </div>
                        <div class="widget-header-input">
                            <div class="widget-user-username">
                                <h3 class="description-block text-left">
                                    <?= $form->field($modelGuest, 'guest_name')->textInput(['maxlength' => true]) ?>
                                </h3>
                            </div>

                            <h5 class="widget-user-desc">
                                <?= $form->field($modelGuest, 'guest_address')->textInput(['maxlength' => true]) ?>
                            </h5>

                        </div>
                    </div>


                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">

                                    <h5 class="description-header">
                                        <?= $form->field($modelGuest, 'guest_phone')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">

                                    <h5 class="description-header">
                                        <?= $form->field($modelGuest, 'guest_email')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>


                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">

                                    <h5 class="description-header"> <?= $form->field($modelGuest, 'guest_fax')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <?= $form->field($modelGuest, 'guest_country')->textInput(['maxlength' => true]) ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="description-block">
                                    <?= $form->field($modelGuest, 'guest_state')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                    <?= $form->field($modelGuest, 'guest_zip')->textInput(['maxlength' => true]) ?>

                                </div>
                            </div>

                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                    <?= $form->field($modelGuest, 'guest_zone')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group pull-right">
                                    <?= Html::submitButton($modelGuest->isNewRecord ? 'Create' : 'Update', ['class' => $modelGuest->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <script type="text/javascript">
        $(window).ready(function(){
            $('#userImage .close ').addClass('hidden')
        })

        $('#userImage .btn.btn-default ').on('click',function(){
            croppedImage()
        })

        function croppedImage(){
            var croppedImage = ($('.img-thumbnail').attr("src"));
            $('.guest-form .img-circle').attr('src', croppedImage );
        }

    </script>



<?php
$js = <<< JS
$("#modalAddGuest .onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')
$("#id_guest_status").val('1')
$("#id_guest_status").attr('checked','checked')

$('form#createmodal-guest').on('beforeSubmit', function(e)
    {
        var guestName = $('#guest-guest_name').val();
       // alert (guestName)
        var \$form = $(this);
        $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )
        .done(function(result){
            if(result==1){
                $(document).find('#modalAddGuest').modal('hide');
                $(\$form).trigger("reset");
                //$.pjax.reload({container: '#employeesGrid'});
                $('#message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '+ guestName +' Saved.</h4>New guest has been Successfully created.</div>');
            }else{
                $('#message').html(result); 
            }
        }).fail(function(){
            console.log("server error");
        });
        return false;
    });


JS;
// Call the above js script in your view
$this->registerJs($js);
?>