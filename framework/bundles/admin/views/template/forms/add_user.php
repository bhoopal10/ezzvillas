
<div class="row">
	<div class="span7">
		
	<form class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="form-field-1">Name</label>

		<div class="controls">
			<input id="form-field-1" placeholder="Full Name" type="text">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="form-field-1">Organsation</label>

		<div class="controls">
			<input id="form-field-1" placeholder="Company/Organisation" type="text">
		</div>
	</div>
    <div class="control-group">
		<label class="control-label" for="form-field-1">Email-ID</label>

		<div class="controls">
			<input id="form-field-1" class="ace-tooltip" placeholder="User email address" type="text" data-original-title="Activation link and password will be sent on this Email address">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="form-field-1">User Type</label>

		<div class="controls">
			<select name="user_type" id="">
				<option value="publisher">Publisher</option>
				<option value="member">Member</option>
				<option value="admin">Admin</option>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="form-field-1">Choose City</label>

		<div class="controls">
			<select name="user_city" id="">
				<option value="bangalore">Bangalore</option>
				<option value="kerla">Kerla</option>
			</select>
		</div>
	</div>

	
	<div class="control-group">
		<label class="control-label" for="form-field-2">Password Field</label>

		<div class="controls">
			<input id="form-field-2" placeholder="Password" type="password">
			<span class="help-inline">Inline help text</span>
		</div>
	</div>
</form>
</div>
	<!-- End Span -->
	<div class="span4">
        <input id="id-input-file-3" type="file">
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
<script>
    $(function() {
        $('#id-input-file-3').ace_file_input({
            style:'well',
            btn_choose:'Drop User Image here or click to choose',
            btn_change:null,
            no_icon:'icon-cloud-upload',
            droppable:true,
            thumbnail:'small',
            before_change:function(files, dropped) {
                /**
                 if(files instanceof Array || (!!window.FileList && files instanceof FileList)) {
							//check each file and see if it is valid, if not return false or make a new array, add the valid files to it and return the array
							//note: if files have not been dropped, this does not change the internal value of the file input element, as it is set by the browser, and further file uploading and handling should be done via ajax, etc, otherwise all selected files will be sent to server
							//example:
							var result = []
							for(var i = 0; i < files.length; i++) {
								var file = files[i];
								if((/^image\//i).test(file.type) && file.size < 102400)
									result.push(file);
							}
							return result;
						}
                 */
                return true;
            }
            /*,
             before_remove : function() {
             return true;
             }*/

        }).on('change', function(){
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });
        $('.ace-tooltip').tooltip();
        var $tooltip = $("<div class='tooltip right in' style='display:none;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>").appendTo('body');

    });
</script>
<?php Section::stop()?>