<?php
    $asset= Asset::bundle('admin')
        ->add('choosen-js','js/chosen.jquery.min.js','jquery')
        ->add('choosen-css','css/chosen.css');
    echo Asset::styles();
    echo Asset::scripts();
?>
    <div class="row">
        <div class="span7">

            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="form-field-1">Name</label>

                    <div class="controls">
                        <input id="form-field-1" placeholder="Name of Villa" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-1">Rent</label>

                    <div class="controls">
                    <span class="input-icon">
                    <input id="form-field-1" placeholder="Per night" type="text" class="input-mini">
                        <i class="icon-inr"></i>
                    </span>
                    </div>
                </div>

            </form>
        </div>
        <!-- End Span -->
        <div class="span4">
        </div>
        <!--end span-->
        <div class="span12">
            <div class="form-actions">
                <div class="offset1">
                    <button class="btn btn-info" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        Submit
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
<?php echo Section::start('javascript-footer');?>

<?php Section::stop();?>