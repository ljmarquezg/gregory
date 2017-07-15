<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;
use yii\imagine\Image;
use yii\web\JsExpression;

use backend\model\customer\CustomerBranch;

$customer_image =  Yii::$app->params['customer_image'];

if(!is_null($modelCustomer->id_customer)){
    if(!is_null($modelCustomer->image) or $modelCustomer->image ==''){
        $modelCustomer->image;
    }
}
/* @var $this yii\web\View */
/* @var $modelCustomer backend\modelCustomers\customer\Customer */
/* @var $form yii\widgets\ActiveForm */
?>



    <div class="customer-form">
        <div class="col-xs-12 no-padding">
            <?php $form = ActiveForm::begin(['id'=>'createmodal-customer','options' => ['enctype'=>'multipart/form-data'],]); ?>
            <div class="col-md-12 no-padding">
                <div class="box box-widget widget-user view ">
                    <div class="widget-user-header bg-green-active">
                        <div class="widget-user-image">
                            <?php if (is_Null($modelCustomer->image) or $modelCustomer->image == '' ){
                                echo '<img class="img-circle" src="'.$customer_image.'" alt="User Avatar">';
                            }else{
                                echo $modelCustomer->image;
                            } ?>
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
                                            <?php echo $form->field($modelCustomer, 'file')->widget(Cropbox::className(), ['attributeCropInfo' => 'crop_info',]);?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="onoffswitch" style="left: calc(50% - 50px); top:20px;">
                                <!--label class="control-label">Status</label-->
                                <?= $form->field($modelCustomer, 'id_customer_status')->checkbox(array('id'=>'id_customer_status', 'class'=>'onoffswitch-checkbox','label' => '','value'=>'1', 'checked'=>'checked'))?>
                                <!--script type="text/javascript"> var $ = jQuery.noConflict();$(window).ready(function(){$(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')})</script-->
                            </div>
                        </div>
                        <div class="widget-header-input">
                            <div class="widget-user-username">
                                <h3 class="description-block text-left">
                                    <?= $form->field($modelCustomer, 'customer_name')->textInput(['maxlength' => true]) ?>
                                </h3>
                            </div>

                            <h5 class="widget-user-desc">
                                <?= $form->field($modelCustomer, 'customer_address')->textInput(['maxlength' => true]) ?>
                            </h5>

                        </div>
                    </div>


                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">

                                    <h5 class="description-header">
                                        <?= $form->field($modelCustomer, 'customer_phone')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">

                                    <h5 class="description-header">
                                        <?= $form->field($modelCustomer, 'customer_email')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>


                            <div class="col-md-4 col-sm-12 col-xs-no-padding">
                                <div class="description-block">

                                    <h5 class="description-header"> <?= $form->field($modelCustomer, 'customer_fax')->textInput(['maxlength' => true]) ?>
                                    </h5>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <?= $form->field($modelCustomer, 'customer_country')->textInput(['maxlength' => true]) ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="description-block">
                                    <?= $form->field($modelCustomer, 'customer_state')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                    <?= $form->field($modelCustomer, 'customer_zip')->textInput(['maxlength' => true]) ?>

                                </div>
                            </div>

                            <div class="col-md-3 col-xs-12 ">
                                <div class="description-block">
                                    <?= $form->field($modelCustomer, 'customer_zone')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group pull-right">
                                    <?= Html::submitButton($modelCustomer->isNewRecord ? 'Create' : 'Update', ['class' => $modelCustomer->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
            $('.customer-form .img-circle').attr('src', croppedImage );
        }

    </script>



<?php
$js = <<< JS
$("#modalAddCustomer .onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')
$("#id_customer_status").val('1')
$("#id_customer_status").attr('checked','checked')

$('form#createmodal-customer').on('beforeSubmit', function(e)
    {
        var customerName = $('#customer-customer_name').val();
       // alert (customerName)
        var \$form = $(this);
        $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )
        .done(function(result){
            if(result==1){
                $(document).find('#modalAddCustomer').modal('hide');
                $(\$form).trigger("reset");
                //$.pjax.reload({container: '#employeesGrid'});
                $('#message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> '+ customerName +' Saved.</h4>New customer has been Successfully created.</div>');
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