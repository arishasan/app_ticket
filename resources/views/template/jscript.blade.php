<!-- BEGIN FORM VALIDATION RUTE-->
<script type="text/javascript">
	$(function(){

		$('.count-to').countTo();

	    //Sales count to
	    $('.sales-count-to').countTo({
	        formatter: function (value, options) {
	            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
	        }
	    });

	    // $('#wizard_horizontal').steps({
	    //     headerTag: 'h2',
	    //     bodyTag: 'section',
	    //     transitionEffect: 'slideLeft',
	    //     onInit: function (event, currentIndex) {
	    //         setButtonWavesEffect(event);
	    //     },
	    //     onStepChanged: function (event, currentIndex, priorIndex) {
	    //         setButtonWavesEffect(event);
	    //     }
	    // });

	    // //Vertical form basic
	    // $('#wizard_vertical').steps({
	    //     headerTag: 'h2',
	    //     bodyTag: 'section',
	    //     transitionEffect: 'slideLeft',
	    //     stepsOrientation: 'vertical',
	    //     onInit: function (event, currentIndex) {
	    //         setButtonWavesEffect(event);
	    //     },
	    //     onStepChanged: function (event, currentIndex, priorIndex) {
	    //         setButtonWavesEffect(event);
	    //     }
	    // });

	    //Advanced form with validation
	    var form = $('#wizard_with_validation1').show();
	    form.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form.find('.body:eq(' + newIndex + ') label.error').remove();
	                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form.validate().settings.ignore = ':disabled,:hidden';
	            return form.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            form.validate().settings.ignore = ':disabled';
	            return form.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_rute').serializeArray();
			        	var url = $('.ff_rute').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Saving The Rute'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });
	        }
	    });

	    form.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	    // UPDATE IT
	    
	    var form1 = $('#wizard_with_validation2').show();
	    form1.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form1.find('.body:eq(' + newIndex + ') label.error').remove();
	                form1.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form1.validate().settings.ignore = ':disabled,:hidden';
	            return form1.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // form1.validate().settings.ignore = ':disabled';
	            return form1.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_rute_edit').serializeArray();
			        	var url = $('.ff_rute_edit').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Updating The Rute'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });

	        }
	    });

	    form1.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });

	    // NED 


		function setButtonWavesEffect(event) {
		    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
		    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
		}

		// CRUD TRANSPORT TYPE

		var formCrudTTPE = $('#wizard_with_validation3').show();
	    formCrudTTPE.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formCrudTTPE.find('.body:eq(' + newIndex + ') label.error').remove();
	                formCrudTTPE.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formCrudTTPE.validate().settings.ignore = ':disabled,:hidden';
	            return formCrudTTPE.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formCrudTTPE.validate().settings.ignore = ':disabled';
	            return formCrudTTPE.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transport_type').serializeArray();
			        	var url = $('.ff_transport_type').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Saving The Transport Type'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });
	        }
	    });

	    formCrudTTPE.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	    var formUPDTTPE = $('#wizard_with_validation4').show();
	    formUPDTTPE.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formUPDTTPE.find('.body:eq(' + newIndex + ') label.error').remove();
	                formUPDTTPE.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formUPDTTPE.validate().settings.ignore = ':disabled,:hidden';
	            return formUPDTTPE.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formUPDTTPE.validate().settings.ignore = ':disabled';
	            return formUPDTTPE.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transport_type_edit').serializeArray();
			        	var url = $('.ff_transport_type_edit').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Updating The Transport Type'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });

	        }
	    });

	    formUPDTTPE.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });



	    // NEXT CRUD TRANSPORTATION
	    

	    var formINSVALID5 = $('#wizard_with_validation5').show();
	    formINSVALID5.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formINSVALID5.find('.body:eq(' + newIndex + ') label.error').remove();
	                formINSVALID5.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formINSVALID5.validate().settings.ignore = ':disabled,:hidden';
	            return formINSVALID5.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formINSVALID5.validate().settings.ignore = ':disabled';
	            return formINSVALID5.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transportation').serializeArray();
			        	var url = $('.ff_transportation').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Inserting The Transportation'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });

	        }
	    });

	    formINSVALID5.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });



	    var formINSVALID6 = $('#wizard_with_validation6').show();
	    formINSVALID6.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formINSVALID6.find('.body:eq(' + newIndex + ') label.error').remove();
	                formINSVALID6.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formINSVALID6.validate().settings.ignore = ':disabled,:hidden';
	            return formINSVALID6.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formINSVALID6.validate().settings.ignore = ':disabled';
	            return formINSVALID6.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transportation_edit').serializeArray();
			        	var url = $('.ff_transportation_edit').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Saving The Transportation'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });

	        }
	    });

	    formINSVALID6.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	});
</script>

<!-- END OF FORM VALIDATION -->


<!-- BEGIN MODAL -->

<script type="text/javascript">
$(function () {
	    $('.open_modal').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModal').modal('show');
	    });

	    $('.open_modalCustomer').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModal').modal('show');
	    });

	    $('.open_modalTransport').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModalTransport .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModalTransport').modal('show');
	    });

	    $('#btn-upload-station').on('click', function () {
	        var color = $(this).data('color');
	        $('#modalUpload-stasiun .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#modalUpload-stasiun').modal('show');
	    });
});
</script>

<!-- END OF JS MODAL -->

<script type="text/javascript">
	$(function(){

		$('#table_rute').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_transport_type').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table-station').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_transportation').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_transport').DataTable();
    	$('#table_transport_pick').DataTable({
    		"iDisplayLength" : 3,
    		"aLengthMenu" : [[3, 5, 10, 20, 30, 40, 100, -1],[3, 5, 10, 20, 30, 40, 100, "All"]]
    	});

		$('#btn-add-rute').click(function(){
			$('#form_add_rute').fadeOut();
			$('#form_add_rute').attr('hidden',false);
			$('#form_add_rute').fadeIn();
			$('#hold_data_rute').fadeOut();
			$('#hold_data_rute').attr('hidden',true);
		});

		$('#btn-close-rute').click(function(){
			$('#form_add_rute').fadeOut();
			$('#form_add_rute').attr('hidden',true);
			$('#form_add_rute').fadeOut();
			$('#hold_data_rute').fadeIn();
			$('#hold_data_rute').attr('hidden',false);
		});

		$('#btn-close-rute-edit').click(function(){
			$('#form_edit_rute').fadeOut();
			$('#form_edit_rute').attr('hidden',true);
			$('#form_edit_rute').fadeOut();
			$('#hold_data_rute').fadeIn();
			$('#hold_data_rute').attr('hidden',false);
		});

		$('#btn-reset-rute').click(function(){
			$('.form-control').val('');
		});

		$(".showListrute").on('click','tr',function(e){

			e.preventDefault();

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var rute_from = $(this).closest('tr').find('td:eq(1)').text();
			var rute_to = $(this).closest('tr').find('td:eq(2)').text();
			var time_depart = $(this).closest('tr').find('td:eq(3)').text();
			var time_arrive = $(this).closest('tr').find('td:eq(4)').text();
			var price = $(this).closest('tr').find('td:eq(5)').text();
			var transport_id = $(this).closest('tr').find('td:eq(6)').text();

			

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_rute').fadeOut();
		        	$('#form_edit_rute').attr('hidden',false);
		        	$('#form_edit_rute').fadeIn();
		        	$('#hold_data_rute').fadeOut();
					$('#hold_data_rute').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#edit_id').val(kode);
					$('#rute_from_edit').val(rute_from);
					$('#rute_to_edit').val(rute_to);
					$('#timeDepartEdit').val(time_depart);
					$('#timeArriveEdit').val(time_arrive);
					$('#price_edit').val(price);
					$('#transport_id_edit').val(transport_id);

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("rute/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Rute'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 500);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 500);
							        		}
							        	});

							        }, 500);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });

		   }

		});

		// $(".showListRute tr").dblclick(function(){

		// 	swal("Deleted!", "Your imaginary file has been deleted.", "success");

		// });


		// CRUD TRANSPORT TYPE

		$('#btn-add-transport_type').click(function(){
			$('#form_add_transport_type').fadeOut();
			$('#form_add_transport_type').attr('hidden',false);
			$('#form_add_transport_type').fadeIn();
			$('#hold_data_transport_type').fadeOut();
			$('#hold_data_transport_type').attr('hidden',true);
		});

		$('#btn-add-stasiun').click(function(){
			$('#form_add_stasiun').fadeOut();
			$('#form_add_stasiun').attr('hidden',false);
			$('#form_add_stasiun').fadeIn();
			$('#hold_data_stasiun').fadeOut();
			$('#hold_data_stasiun').attr('hidden',true);
		});

		$('#btn-close-stasiun').click(function(){
			$('#form_add_stasiun').fadeOut();
			$('#form_add_stasiun').attr('hidden',true);
			$('#form_add_stasiun').fadeOut();
			$('#hold_data_stasiun').fadeIn();
			$('#hold_data_stasiun').attr('hidden',false);
		});

		$('#btn-close-stasiun-edit').click(function(){
			$('#form_edit_stasiun').fadeOut();
			$('#form_edit_stasiun').attr('hidden',true);
			$('#form_edit_stasiun').fadeOut();
			$('#hold_data_stasiun').fadeIn();
			$('#hold_data_stasiun').attr('hidden',false);
		});

		$('#btn-close-transport_type').click(function(){
			$('#form_add_transport_type').fadeOut();
			$('#form_add_transport_type').attr('hidden',true);
			$('#form_add_transport_type').fadeOut();
			$('#hold_data_transport_type').fadeIn();
			$('#hold_data_transport_type').attr('hidden',false);
		});

		$('#btn-close-transport_type-edit').click(function(){
			$('#form_edit_transport_type').fadeOut();
			$('#form_edit_transport_type').attr('hidden',true);
			$('#form_edit_transport_type').fadeOut();
			$('#hold_data_transport_type').fadeIn();
			$('#hold_data_transport_type').attr('hidden',false);
		});

		$('#btn-reset-transport_type').click(function(){
			$('.form-control').val('');
		});

		$('#showListTransport').on('click','tr',function(){
			var kode = $(this).closest('tr').find('td:eq(0)').text();
			$('#transport_id').val(kode);
			$("#transport_id_edit").val(kode);

			$('#mdModal').modal('hide');
		});

		$(".showListtransport_type").on('click','tr',function(){

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var description_edit = $(this).closest('tr').find('td:eq(1)').text();

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_transport_type').fadeOut();
		        	$('#form_edit_transport_type').attr('hidden',false);
		        	$('#form_edit_transport_type').fadeIn();
		        	$('#hold_data_transport_type').fadeOut();
					$('#hold_data_transport_type').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#id_edit_transport').val(kode);
					$('#description_edit').val(description_edit);
					

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("transport_type/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Transport Type'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 500);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 500);
							        		}
							        	});

							        }, 500);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });
		  }

		});

		// CRUD TRANSPORTATION
		
		var getQTYClose = '';

		$('#btn-add-transportation').click(function(){
			$('#form_add_transportation').fadeOut();
			$('#form_add_transportation').attr('hidden',false);
			$('#form_add_transportation').fadeIn();
			$('#hold_data_transportation').fadeOut();
			$('#hold_data_transportation').attr('hidden',true);
		});

		$('#btn-close-transportation').click(function(){
			$('#form_add_transportation').fadeOut();
			$('#form_add_transportation').attr('hidden',true);
			$('#form_add_transportation').fadeOut();
			$('#hold_data_transportation').fadeIn();
			$('#hold_data_transportation').attr('hidden',false);
		});

		$('#btn-close-transportation-edit').click(function(){
			$('#form_edit_transportation').fadeOut();
			$('#form_edit_transportation').attr('hidden',true);
			$('#form_edit_transportation').fadeOut();
			$('#hold_data_transportation').fadeIn();
			$('#hold_data_transportation').attr('hidden',false);
		});

		$('#btn-reset-transportation').click(function(){
			$('.form-control').val('');
		});

		$(".showListtransportation").on('click','tr',function(){

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var code = $(this).closest('tr').find('td:eq(1)').text();
			var description = $(this).closest('tr').find('td:eq(2)').text();
			var seatQTY = $(this).closest('tr').find('td:eq(3)').text();
			var transport_typeid = $(this).closest('tr').find('td:eq(4)').text();
			var transport_type = $(this).closest('tr').find('td:eq(5)').text();

			getQTYClose = seatQTY;
			$('#editProg').html(seatQTY+' Seats')

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_transportation').fadeOut();
		        	$('#form_edit_transportation').attr('hidden',false);
		        	$('#form_edit_transportation').fadeIn();
		        	$('#hold_data_transportation').fadeOut();
					$('#hold_data_transportation').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#transport_id_edit').val(kode);
					$('#code_edit').val(code);
					$('#description_edit').val(description);
					$('#valueSEAT_edit').val(seatQTY);
					$('#transport_type_id_edit').val(transport_typeid);
					

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("transportation/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Transportation'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 500);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 500);
							        		}
							        	});

							        }, 500);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });
		  }

		});

		$("#showListTransportType").on('click','tr',function(){
			
				var kode = $(this).closest('tr').find('td:eq(0)').text();
				$('#transport_type_id').val(kode);
				$('#transport_type_id_edit').val(kode);
				$('#mdModal').modal('hide');
			
		});

		$('.generateCode').click(function(){

			var url = '{{ url("getRandomCode") }}/12';
			$.get(url,function(res){
				$('#code').val(res);
				$('#code_edit').val(res);
			});

		});

		<?php
			if(Request::segment(2) == 'transportation'){
		?>

		var sliderBasic = document.getElementById('sliderQTY');
		    noUiSlider.create(sliderBasic, {
		        start: [4],
		        connect: 'lower',
		        step: 4,
		        range: {
		            'min': [4],
		            'max': [1000]
		        }
		    });
		    getNoUISliderValue(sliderBasic, true);

		function getNoUISliderValue(slider, percentage) {
		    slider.noUiSlider.on('update', function () {
		        var val = slider.noUiSlider.get();
		        if (percentage) {
		            val = parseInt(val);
		        }
		        $(slider).parent().find('span.js-nouislider-value').text(val+' Seats');
		        $('#valueSEAT').val(val);
		    });
		}


		var sliderBasic1 = document.getElementById('sliderQTY1');
		    noUiSlider.create(sliderBasic1, {
		        start: [getQTYClose],
		        connect: 'lower',
		        step: 4,
		        range: {
		            'min': [4],
		            'max': [1000]
		        }
		    });
		    getNoUISliderValue1(sliderBasic1, true);

		function getNoUISliderValue1(slider, percentage) {
		    slider.noUiSlider.on('update', function () {
		        var val = slider.noUiSlider.get();
		        if (percentage) {
		            val = parseInt(val);
		        }
		        $(slider).parent().find('span.js-nouislider-value').text(val+' Seats');
		        $('#valueSEAT_edit').val(val);
		    });
		}

		<?php } ?>

	});
</script>



<!-- TRANSACTION -->

<script type="text/javascript">
	
	$(function(){

		$("#cariRute").click(function(){
			var from = $('#depart_from').val();
			var to = $('#depart_to').val();

			if(from == to){
				swal('Go to hell!','Rute From and Rute to dont be same!','error');
			}else{

				var url = '{{ url("getRute") }}/'+from+'/'+to+'/'+'<?php echo Request::segment(3) ?>';
				$.get(url,function(res){
					$('#listTransportation_rute').html(res);
				});

			}
		});

		$("#cariRute_multi").click(function(){
			var from = $('#depart_from').val();
			var to = $('#depart_to').val();
			var pass = $('#passenger').val();

			if(from == to || pass == ''){
				swal('Go to hell!','Rute From and Rute to dont be same! Or Please select how much passenger','error');
			}else{

				var url = '{{ url("getRute_multi") }}/'+from+'/'+to+'/'+pass+'/'+'<?php echo Request::segment(4) ?>';
				$.get(url,function(res){
					$('#listTransportation_rute').html(res);
				});

			}
		});

		
		<?php if(request::segment(1) == 'transaction' AND request::segment(2) == 'reserve' AND request::segment(3) == 'step_2'){ ?>
				$('.showSeatHere_final').show(function(){

					var url = '{{ url("getSeat") }}/'+'<?php echo $transport ?>'+'/'+'<?php echo $rute_id ?>'+'/'+'<?php echo Request::segment(6) ?>';

						$.get(url,function(res){
							$('.showSeatHere_final').html(res);
						});
				});

				var seat_loc_code = '';
				var rute_loc_id = '';

				$('.showSeatHere_final').on('click','.seatLISTTick',function(){
					$('.iconFA').attr('class','content iconFA');
					var kode = $(this).closest('div').find('.number').text();
					$(this).closest('div').find('.content').attr('class','content bg-yellow iconFA');

					rute_loc_id = '<?php echo request::segment(5) ?>';
					seat_loc_code = kode;
					
					var urlNEXT = '{{ url("transaction/reserve/step_3") }}/'+rute_loc_id+'/'+seat_loc_code+'/'+'<?php echo Request::segment(6) ?>';

					$('.link_next_step').attr('href',urlNEXT);

				});

				var res_id = '';

				$('.showSeatHere_final').on('click','.seatLISTTick_err',function(){
					var kode = $(this).closest('div').find('.number').text();
					var kode_reserve = $(this).closest('div').find('.reserve_id').text();
					
					var transport = $('#transport_id').val();
					var rute = $('#rute_id').val();

					res_id = kode_reserve;

					$('#modalDetail').modal('show');
					$('#seat_id').html(kode);

					var url = '{{ url("getDataReserve") }}/'+kode_reserve+'/'+'{{ Request::segment(6) }}';
					// alert(url);

					$.get(url,function(res){
					$('#showedRES').html(res);
					});

					$('#print_check').attr('href','{{ url("checkout_transaction") }}/'+kode_reserve+'/{{ Request::segment(6) }}');

				});

				$('#cancelBooking').click(function(e){
					e.preventDefault();

					swal({
					        title: "Confirmation",
					        text: "Cancel booking ?",
					        type: "info",
					        showCancelButton: true,
					        closeOnConfirm: false,
					        showLoaderOnConfirm: true,
					    }, function () {
					        setTimeout(function () {
					        	var url = '{{ url("booking/cancel") }}/'+res_id;
					        	$.get(url,function(res){

					        		
					        			if(res == 'Success Delete Booking'){
						        			setTimeout(function(){
						        				swal("Success!", res, "success");
						        				location.reload();
						        			}, 500);
						        		}else{
						        			setTimeout(function(){
						        				swal("Failed!", res, "error");
						        				location.reload();
						        			}, 500);
						        		}
					        		
					        	});

					        }, 500);
					    });

				});

		<?php } ?>

				$('#identity_card_no2').on('blur',function(){
					var identity = $(this).val();

					var urlCek = '{{ url("checkCust") }}/'+identity;

					$.get(urlCek,function(res){
						if(res == 'This Customer Have been already reserving'){
							swal('error!',res,'error');
							$('#identity_card_no2').val('');
							$('#name').val('');
							$('#address').val('');
							$('#phone').val('');
							$('#gender').val('');
						}else{

							var url = '{{ url("getName") }}/'+identity;
							var url1 = '{{ url("getAddress") }}/'+identity;
							var url12 = '{{ url("getPhone") }}/'+identity;
							var url123 = '{{ url("getGender") }}/'+identity;
							$.get(url,function(res){
								$('#name').val(res);
							});

							$.get(url1,function(res){
								$('#address').val(res);
							});

							$.get(url12,function(res){
								$('#phone').val(res);
							});

							$.get(url123,function(res){
								$('#gender').val(res);
							});

						}
					});

				});


				$('#identity_card_no').on('blur',function(){
					var identity = $(this).val();
					var url = '{{ url("getName") }}/'+identity;
					var url1 = '{{ url("getAddress") }}/'+identity;
					var url12 = '{{ url("getPhone") }}/'+identity;
					var url123 = '{{ url("getGender") }}/'+identity;
					$.get(url,function(res){
						$('#name').val(res);
					});

					$.get(url1,function(res){
						$('#address').val(res);
					});

					$.get(url12,function(res){
						$('#phone').val(res);
					});

					$.get(url123,function(res){
						$('#gender').val(res);
					});

				});

				$('.reserveDate').bootstrapMaterialDatePicker({
			        format: 'dddd DD MMMM YYYY',
			        clearButton: true,
			        weekStart: 1,
			        time: false
		    	});


		    	$('#confirm_save').click(function(){

					if($('#rute_id').val() == '' || $('#price').val() == '' || $('#reserve_code').val() == '' || $('#seat_code').val() == '' || $('#reserveData1').val() == '' || $('#identity_card_no').val() == '' || $('#name').val() == '' || $('#address').val() == '' || $('#phone').val() == '' || $('#gender').val() == ''){

						swal("Error!", "Nothing to be saved!", "error");

					}else{

					swal({
					        title: "Confirmation",
					        text: "Are you sure about your data ?",
					        type: "info",
					        showCancelButton: true,
					        closeOnConfirm: false,
					        showLoaderOnConfirm: true,
					    }, function () {
					        setTimeout(function () {
					        	var data = $('#saveTransaction').serializeArray();
					        	var url = $('#saveTransaction').attr('action');
					        	$.post(url,data,function(res){

					        		
					        			setTimeout(function(){
					        				swal("Information!", "Loading.. Scroll up!", "info");
					        				$('#tootlt').html(res);

					        				$('#confirm_save').css({
					        					display: 'none'
					        				});

					        				var urlBack = '{{ url("transaction/reservation") }}/'+'<?php echo Request::segment(6) ?>';
					        				$('.backButton').css({
					        					display: 'block'
					        				});
					        				$('.backButton').attr('href',urlBack);
					        			}, 500);
					        		
					        	});

					        }, 500);
					    });
				}

				});


	});

</script>


<script type="text/javascript">
	
	$(function(){

		$('#table_customer').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

		$('.table_dep_report').DataTable({
	        dom: 'Bfrtip',
	        responsive: true,
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
    	});

    	$('#table_transportation_report').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_rute_report').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('.table_res_report').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});



    	$('#table_user').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});


    	$('.userModal').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModalUser .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModalUser').modal('show');
	    });

	    $('.addUserModal').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModalUser_add .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModalUser_add').modal('show');
	    });

	    $('#save_user').click(function(e){
	    	e.preventDefault();

	    	if($('#username').val() == '' || $('#password').val() == '' || $('#c-password').val() == '' || $('#fullname').val() == '' || $('#level').val() == ''){
	    		swal("Error!", "Nothing to be Saved", "error");
	    	}else{

	    		if($('#c-password').val() != $('#password').val() || $('#password').val() != $('#c-password').val()){
	    			swal("Error!", "Password and Confirm password doesn't same", "error");
	    		}else{

	    			swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
				    }, function () {
				        setTimeout(function () {
				        	var data = $('#form_user').serializeArray();
				        	var url = $('#form_user').attr('action');
				        	$.post(url,data,function(res){

				        		if(res == 'Success Inserting New User'){
				        			setTimeout(function(){
				        				swal("Success!", res, "success");
				        				location.reload();
				        			}, 500);
				        		}else{
				        			setTimeout(function(){
				        				swal("Failed!", res, "error");
				        				location.reload();
				        			}, 500);
				        		}
				        	});

				        }, 500);
				    });

	    		}

	    	}

	    });



	    $('#save_user_edit').click(function(e){
	    	e.preventDefault();

	    	if($('#username_edit').val() == '' || $('#password_edit').val() == '' || $('#c-password_edit').val() == '' || $('#fullname_edit').val() == '' || $('#level_edit').val() == ''){
	    		swal("Error!", "Nothing to be Saved", "error");
	    	}else{

	    		if($('#c-password_edit').val() != $('#password_edit').val() || $('#password_edit').val() != $('#c-password_edit').val()){
	    			swal("Error!", "Password and Confirm password doesn't same", "error");
	    		}else{

	    			swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
				    }, function () {
				        setTimeout(function () {
				        	var data = $('#form_user_edit').serializeArray();
				        	var url = $('#form_user_edit').attr('action');
				        	$.post(url,data,function(res){

				        		if(res == 'Success Saving User'){
				        			setTimeout(function(){
				        				swal("Success!", res, "success");
				        				location.reload();
				        			}, 500);
				        		}else{
				        			setTimeout(function(){
				        				swal("Failed!", res, "error");
				        				location.reload();
				        			}, 500);
				        		}
				        	});

				        }, 500);
				    });

	    		}

	    	}

	    });


	    $('#listUser').on('click','.edit_user',function(){

	    	var color = $(this).data('color');
	        $('#mdModalUser_edit .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        var kode = $(this).closest('tr').find('td:eq(0)').text();
	        var username = $(this).closest('tr').find('td:eq(1)').text();
	        var fullname = $(this).closest('tr').find('td:eq(2)').text();

	        $('#id_edit').val(kode);
	        $('#username_edit').val(username);
	        $('#fullname_edit').val(fullname);

	        $('#mdModalUser_edit').modal('show');

	    });

	    $('#listUser').on('click','.delete_user',function(){

	        var kode = $(this).closest('tr').find('td:eq(0)').text();
	        
	        swal({
					        title: "Delete user ?",
					        text: "You're about to delete user with ID "+kode+'.',
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("deleteUser") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting User'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 500);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 500);
							        		}
							        	});

							        }, 500);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

	    });


	    $('#show_rep_res_date').click(function(){

	    	if($('#f_date').val() == '' || $('#s_date').val() == ''){
	    		swal('Error!','Nothing happened','error');
	    	}else{

	    		var d1 = $('#f_date').val();
	    		var d2 = $('#s_date').val()
	    		var url = '{{ url("getDataReserveByDate") }}/'+d1+'/'+d2;

	    		$.get(url,function(res){
	    			$('#showedReservationReport').html(res);

	    			$('.table_res_report').DataTable({
			        dom: 'Bfrtip',
			        responsive: true,
			        buttons: [
			            'copy', 'csv', 'excel', 'pdf', 'print'
			        ]
			    	});

	    		});

	    	}

	    });

	    $('#show_filter_earning').click(function(){

	    	if($('#f_date').val() == '' || $('#s_date').val() == ''){
	    		swal('Error!','Nothing happened','error');
	    	}else{

	    		var d1 = $('#f_date').val();
	    		var d2 = $('#s_date').val()
	    		var url = '{{ url("getEarning") }}/'+d1+'/'+d2+'/{{ Request::segment(3) }}';

	    		$.get(url,function(res){
	    			$('#showedTableFilterEarn').html(res);

	    			$('.table_res_report').DataTable({
			        dom: 'Bfrtip',
			        responsive: true,
			        buttons: [
			            'copy', 'csv', 'excel', 'pdf', 'print'
			        ]
			    	});

	    		});

	    	}

	    });


	    $('#show_all_earning').click(function(){

	    		var url = '{{ url("getEarningAll") }}/{{ Request::segment(3) }}';

	    		$.get(url,function(res){
	    			$('#showedTableFilterEarn').html(res);

	    			$('.table_res_report').DataTable({
			        dom: 'Bfrtip',
			        responsive: true,
			        buttons: [
			            'copy', 'csv', 'excel', 'pdf', 'print'
			        ]
			    	});

	    		});

	    	

	    });


	    $('#show_rep_res_all').click(function(){

	    		var url = '{{ url("getDataReserveAll") }}';

	    		$.get(url,function(res){
	    			$('#showedReservationReport').html(res);

	    			$('.table_res_report').DataTable({
			        dom: 'Bfrtip',
			        responsive: true,
			        buttons: [
			            'copy', 'csv', 'excel', 'pdf', 'print'
			        ]
			    	});

	    		});

	    	

	    });


	});

</script>


<script type="text/javascript">

  <?php
    if(!empty(Request::Segment(1))){

    }else{
  ?>

  new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'lineCahrt',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
                      data: [
                            <?php
                            $data = \App\HomeModel::getEarning();
                            foreach($data as $row): ?>
                                { y: '<?php echo $row->payment_date; ?>', a: '<?php echo $row->payment ?>'},
                            <?php endforeach?>
                        ],
                        xkey: 'y',
                        ykeys: ['a'],
                        labels: ['Earn Rp.'],
                        resize: true,
                        hideHover: true,
                        xLabels: 'day',
                        gridTextSize: '10px',
                        lineColors: ['#1caf9a','#33414E'],
                        gridLineColor: '#E5E5E5'
});


  Morris.Line({
            element: 'line_gender',
            data: [
                    <?php
                    $dataMale = \App\HomeModel::getMale();
                    foreach($dataMale as $row): ?>
                        { y: '<?php echo $row->date; ?>', a: '<?php echo $row->countMale ?>'},
                    <?php endforeach?>
                ],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Male'],
                resize: true,
                hideHover: true,
                xLabels: 'day',
                gridTextSize: '10px',
                lineColors: ['#1caf9a','#33414E'],
                gridLineColor: '#E5E5E5'

      
        });


  Morris.Line({
            element: 'line_gender_fem',
            data: [
                    <?php
                    $dataMale = \App\HomeModel::getFemale();
                    foreach($dataMale as $row): ?>
                        { y: '<?php echo $row->date; ?>', a: '<?php echo $row->countFem ?>'},
                    <?php endforeach?>
                ],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Female'],
                resize: true,
                hideHover: true,
                xLabels: 'day',
                gridTextSize: '10px',
                lineColors: ['#1caf9a','#33414E'],
                gridLineColor: '#E5E5E5'

      
        });


  new Chart(document.getElementById("line_chart_gender").getContext("2d"), getChartJs('line'));

  function getChartJs(type) {
  	if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: [
                	<?php
                    $date = \App\HomeModel::getDate();
                    foreach($date as $row): ?>
                       "<?php echo $row->date ?>",
                    <?php endforeach?>
                ],
                datasets: [{
                    label: "Male",
                    data: [
                    <?php
	                    $dataMale = \App\HomeModel::getMale();
	                    foreach($dataMale as $row): ?>
	                        '<?php echo $row->countMale ?>',
	                    <?php endforeach?>
                    ],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "Female",
                        data: [
	                    	<?php
		                    $dataFemale = \App\HomeModel::getFemale();
		                    foreach($dataFemale as $row): ?>
		                        '<?php echo $row->countFem ?>',
		                    <?php endforeach?>
                        ],
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
  }

  <?php } ?>
</script>

<script type="text/javascript">
	$(function(){

		$(".showListStationClick").on('click','tr',function(){

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var description_edit = $(this).closest('tr').find('td:eq(1)').text();
			var city = $(this).closest('tr').find('td:eq(2)').text();
			var abbr = $(this).closest('tr').find('td:eq(3)').text();

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_stasiun').fadeOut();
		        	$('#form_edit_stasiun').attr('hidden',false);
		        	$('#form_edit_stasiun').fadeIn();
		        	$('#hold_data_stasiun').fadeOut();
					$('#hold_data_stasiun').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#id_edit_stat').val(kode);
					$('#description_edit').val(description_edit);
					$('#city_edit').val(city);
					$('#abbr_edit').val(abbr);

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("stasiun/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Station'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 500);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 500);
							        		}
							        	});

							        }, 500);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });
		  }

		});



		var form9 = $('#wizard_with_validation9').show();
	    form9.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form9.find('.body:eq(' + newIndex + ') label.error').remove();
	                form9.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form9.validate().settings.ignore = ':disabled,:hidden';
	            return form9.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // form9.validate().settings.ignore = ':disabled';
	            return form9.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	if($('#digit').val().length > 3 || $('#digit').val().length < 3){
	        		swal('Error!','Abbr only 3 digits','error');
	        	}else{
	        		swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
				    }, function () {
				        setTimeout(function () {
				        	var data = $('.ff_stasiun').serializeArray();
				        	var url = $('.ff_stasiun').attr('action');
				        	$.post(url,data,function(res){

				        		if(res == 'Success Saving The Station'){
				        			setTimeout(function(){
				        				swal("Success!", res, "success");
				        				location.reload();
				        			}, 500);
				        		}else{
				        			setTimeout(function(){
				        				swal("Failed!", res, "error");
				        				location.reload();
				        			}, 500);
				        		}
				        	});

				        }, 500);
				    });
	        	}
	        	
	        }
	    });

	    form9.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	    // UPDATE IT
	    
	    var form10 = $('#wizard_with_validation7').show();
	    form10.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form10.find('.body:eq(' + newIndex + ') label.error').remove();
	                form10.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form10.validate().settings.ignore = ':disabled,:hidden';
	            return form10.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // form10.validate().settings.ignore = ':disabled';
	            return form10.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	if($('.digit_edit').val().length > 3 || $('.digit_edit').val().length < 3){
	        		swal('Error!','Abbr only 3 digits','error');
	        	}else{

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var dat2 = $('.ff_stasiun_edite').serializeArray();
			        	var ur2 = $('.ff_stasiun_edite').attr('action');
			        	
			        	$.post(ur2,dat2,function(res){

			        		if(res == 'Success Updating The Station'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });

	        }
	    }

	    });

	    form10.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });

	    function setButtonWavesEffect(event) {
		    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
		    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
		}

		$('#table_rute_from').dataTable();

		$('#table_rute_to').dataTable();

		$('.open_modal2').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModal_from .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModal_from').modal('show');
	    });

	    $('.open_modal3').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModal_to .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModal_to').modal('show');
	    });

	 //    $('#showListStatFrom').on('click','tr',function(){
		// 	var kode = $(this).closest('tr').find('td:eq(0)').text();
		// 	$('#rute_from').val(kode);
		// 	$("#rute_from_edit").val(kode);

		// 	$('#mdModal_from').modal('hide');
		// });

		// $('#showListStatto').on('click','tr',function(){
		// 	var kode = $(this).closest('tr').find('td:eq(0)').text();
		// 	$('#rute_to').val(kode);
		// 	$("#rute_to_edit").val(kode);

		// 	$('#mdModal_to').modal('hide');
		// });

		$('.save_data_upload').click(function(){

			var file = $('#import_file').prop('files')[0];
			var form_data = new FormData();
			form_data.append('import',file);
			// alert(form_data);

			var urls = $('#form_upload').attr('action');

			$.ajax({
				url: urls,
				dataType: 'text',
				cache: false,
				contentType: false,
				processData: false,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
				data: form_data,
				type: 'post',
				success:function(res){
					$('.showed_upload').html(res);
				}
			});

		});

		$('.showed_upload').on('change','.cekCeklis',function(){
			if($(this).is(':checked')){
				var id = $(this).closest('tr').find('td:eq(1)').text();
				var name = $(this).closest('tr').find('td:eq(2)').text();
				var city = $(this).closest('tr').find('td:eq(3)').text();
				var abbr = $(this).closest('tr').find('td:eq(4)').text();

				$(this).closest('tr').find('td:eq(1)').html(id+'<input type="hidden" name="id[]" value="'+id+'">');
				$(this).closest('tr').find('td:eq(2)').html(name+'<input type="hidden" name="name[]" value="'+name+'">');
				$(this).closest('tr').find('td:eq(3)').html(city+'<input type="hidden" name="city[]" value="'+city+'">');
				$(this).closest('tr').find('td:eq(4)').html(abbr+'<input type="hidden" name="abbr[]" value="'+abbr+'">');
				
			}else{

				var id = $(this).closest('tr').find('td:eq(1)').text();
				var name = $(this).closest('tr').find('td:eq(2)').text();
				var city = $(this).closest('tr').find('td:eq(3)').text();
				var abbr = $(this).closest('tr').find('td:eq(4)').text();

				$(this).closest('tr').find('td:eq(1)').html('');
				$(this).closest('tr').find('td:eq(2)').html('');
				$(this).closest('tr').find('td:eq(3)').html('');
				$(this).closest('tr').find('td:eq(4)').html('');

				$(this).closest('tr').find('td:eq(1)').html(id);
				$(this).closest('tr').find('td:eq(2)').html(name);
				$(this).closest('tr').find('td:eq(3)').html(city);
				$(this).closest('tr').find('td:eq(4)').html(abbr);
				
			}

		});

		$('.showed_upload').on('click','.import_execute',function(){

				swal({
			        title: "Confirmation",
			        text: "Are you sure about your imported data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var dat2 = $('.form-imported').serializeArray();
			        	var ur2 = $('.form-imported').attr('action');
			        	
			        	$.post(ur2,dat2,function(res){

			        		if(res == 'Success Importing The Station'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });

		});

		var subTotalPrice = 0;

		$('.appCuster').click(function(e){
			e.preventDefault();

			var id = $('#identity_card_no2').val();
			var name = $('#name').val();
			var addr = $('#address').val();
			var phone = $('#phone').val();
			var gender = $('#gender').val();

			var pass = $('#passe').text();
			// alert(pass);

			if(id == '' || name == '' || addr == '' || phone == '' || gender == ''){
				swal('error!','Please fill out the customer field!','error');
			}else{

				if($('#'+id).length > 0){
					swal('info!','Customer have been added!','info');
					$('#identity_card_no2').val('');
					$('#name').val('');
					$('#address').val('');
					$('#phone').val('');
					$('#gender').val('');
				}else{

					// alert(parseInt($('#table_cust >.appendedCustomer >tr').length + 1));

					if(parseInt($('#table_cust >.appendedCustomer >tr').length + 1) > pass){
						swal('info!','Passengers only '+pass,'info');
						$('#identity_card_no2').val('');
						$('#name').val('');
						$('#address').val('');
						$('#phone').val('');
						$('#gender').val('');
					}else{

					var item = '<tr id="'+id+'">'
					+'<td><button type="button" class="btn bg-red waves-effect deleteCustList">REMOVE</button> <button type="button" data-color="blue" class="btn bg-blue waves-effect openModalSeat">PICK SEAT</button></td>'
					+'<td>'+id+'<input type="hidden" name="idcustomer[]" value="'+id+'"></td>'
					+'<td>'+name+'<input type="hidden" name="namecustomer[]" value="'+name+'"></td>'
					+'<td>'+addr+'<input type="hidden" name="addrcustomer[]" value="'+addr+'"></td>'
					+'<td>'+phone+'<input type="hidden" name="phonecustomer[]" value="'+phone+'"></td>'
					+'<td>'+gender+'<input type="hidden" name="gendercustomer[]" value="'+gender+'"></td>'
					+'<td><h6 class="'+id+'">Pick Seat First</h6><input type="hidden" class="inpr seat_input_'+id+'" name="seat_code[]" value=""></td>'
					+'</tr>';

					$('.appendedCustomer').append(item);

					$('#identity_card_no2').val('');
					$('#name').val('');
					$('#address').val('');
					$('#phone').val('');
					$('#gender').val('');

					subTotalPrice += Number($('#price').val());

					$('.subTotalSeat').html(subTotalPrice);

					}

				}

			}

		});


		$('.appendedCustomer').on('click','.deleteCustList',function(){
			$(this).closest('tr').remove();

			var kode = $(this).closest('tr').find('td:eq(1)').text();
			$('.'+kode+'WRAP').attr('class','content iconFA');
			$('.seatLISTTick_take_'+kode).attr('class','col-sm-3 seatLISTTick');
			$('.'+kode).html('');

			subTotalPrice -= Number($('#price').val());

			$('.subTotalSeat').html(subTotalPrice);
		});

		var rows_code = '';

		$('.appendedCustomer').on('click','.openModalSeat',function(){
	        var color = $(this).data('color');
	        var close_kode = $(this).closest('tr').find('td:eq(1)').text();
	        rows_code = close_kode;
	        $('#custID').html(rows_code);
	        $('#modalSeat .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#modalSeat').modal('show');
	    });

		@if(request::segment(1) == 'transaction' AND request::segment(2) == 'reservation_mult' AND request::segment(4) == 'step_2')

	    $('.showSeatHere_final_mult').show(function(){

			var url = '{{ url("getSeat") }}/'+'<?php echo $transport ?>'+'/'+'<?php echo $rute_id ?>'+'/'+'<?php echo Request::segment(8) ?>';

				$.get(url,function(res){
					$('.showSeatHere_final_mult').html(res);
				});
		});

		@endif

		$('.showSeatHere_final_mult').on('click','.seatLISTTick',function(){
			
			if($('.'+rows_code+'WRAP').length > 0){

				

			}else{

				$('.iconFA').attr('class','content iconFA');
				var kode = $(this).closest('div').find('.number').text();
				$('.appendedCustomer').find('.'+rows_code).html(kode);
				$(this).closest('div').find('.content').attr('class','content bg-yellow '+rows_code+'WRAP');
				$(this).attr('class','col-sm-3 taken seatLISTTick_take_'+rows_code);
				$('.appendedCustomer').find('.seat_input_'+rows_code).val(kode);
				$("#modalSeat").modal('hide');

			}
		});

		$('.showSeatHere_final_mult').on('click','.taken',function(){
			swal('error!','This seat has been reserved. Revoke first!','error');
		});

		$('#revokeSeat').click(function(){
			var kode = $('#custID').text();
			$('.'+kode+'WRAP').attr('class','content iconFA');
			$('.seatLISTTick_take_'+rows_code).attr('class','col-sm-3 seatLISTTick');
			$('.appendedCustomer').find('.seat_input_'+rows_code).val('');
			$('.'+kode).html('Pick Seat First');
		});

		var action_stack = '';
		$('.saveReservationMulti').click(function(){

					if($('#rute_id').val() == '' || $('#price').val() == '' || $('#reserve_code').val() == '' || $('#reserveData1').val() == '' || $('.appendedCustomer').length == 0 || parseInt($('#table_cust >.appendedCustomer >tr').length) < $('#passe').text()){

						swal("Error!", "Nothing to be saved!", "error");

					}else{

					$('.inpr').each(function(i, obj) {
					    
					    if($(this).val() == ''){
					    	action_stack = 'NOT';
					    }else{
					    	action_stack = 'ALLOWED';
					    }

					});

					if(action_stack == 'ALLOWED'){

						swal({
						        title: "Confirmation",
						        text: "Are you sure about your data ?",
						        type: "info",
						        showCancelButton: true,
						        closeOnConfirm: false,
						        showLoaderOnConfirm: true,
						    }, function () {
						        setTimeout(function () {
						        	var data = $('#form_transaksi_multi').serializeArray();
						        	var url = $('#form_transaksi_multi').attr('action');
						        	$.post(url,data,function(res){

						        		
						        			setTimeout(function(){
						        				swal("Information!", "Find tools in lower section!", "info");
						        				$('#tootlt').html(res);
						        				$('.saveReservationMulti').css('visibility','hidden');
						        				$('.appendedCustomer').find('.openModalSeat').css('visibility','hidden');
						        			}, 500);
						        		
						        	});

						        }, 500);
						    });
					}else{
						swal("Error!", "Please pick seat first!", "error");
					}
				}

				});

			$('.showSeatHere_final_mult').on('click','.seatLISTTick_err',function(){
				var kode = $(this).closest('div').find('.number').text();
				var kode_reserve = $(this).closest('div').find('.reserve_id').text();
				
				var transport = $('#transport_id').val();
				var rute = $('#rute_id').val();

				res_id = kode_reserve;

				$('#modalDetail').modal('show');
				$('#seat_id').html(kode);

				var url = '{{ url("getDataReserve") }}/'+kode_reserve+'/{{ Request::segment(8) }}';

				$.get(url,function(res){
				$('#showedRES').html(res);
				});

				$('#print_check').attr('href','{{ url("checkout_transaction") }}/'+kode_reserve+'/{{ Request::segment(8) }}');

			});

			$('#cancelBooking2').click(function(e){
				e.preventDefault();

				swal({
				        title: "Confirmation",
				        text: "Cancel booking ?",
				        type: "info",
				        showCancelButton: true,
				        closeOnConfirm: false,
				        showLoaderOnConfirm: true,
				    }, function () {
				        setTimeout(function () {
				        	var url = '{{ url("booking/cancel") }}/'+res_id;
				        	$.get(url,function(res){

				        		
				        			if(res == 'Success Delete Booking'){
					        			setTimeout(function(){
					        				swal("Success!", res, "success");
					        				location.reload();
					        			}, 500);
					        		}else{
					        			setTimeout(function(){
					        				swal("Failed!", res, "error");
					        				location.reload();
					        			}, 500);
					        		}
				        		
				        	});

				        }, 500);
				    });

			});

			$('.reserveDate').on('change',function(e){
				var thing = $(this).val();

				var url = '{{ url("checkTanggal") }}/'+thing;

				$.get(url,function(res){
					if(res == 'No'){

					}else{
						swal('error!',res,'error');
						$('.reserveDate').val('');
					}

				});

			});

			// $('#identity_card_no').inputmask('9999 9999 9999 9999', { placeholder: '____ ____ ____ ____' });
			
			$('#identity_card_no').on("keypress", function (evt) {
			    if (evt.which < 48 || evt.which > 57)
			    {
			        evt.preventDefault();
			    }
			});

			$('#identity_card_no2').on("keypress", function (evt) {
			    if (evt.which < 48 || evt.which > 57)
			    {
			        evt.preventDefault();
			    }
			});

			$('#phone').on("keypress", function (evt) {
			    if (evt.which < 48 || evt.which > 57)
			    {
			        evt.preventDefault();
			    }
			});

	});
</script>


<script type="text/javascript">
	$(function(){

		$('.table_res_periode_transaction').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	var date_per = '';
    	var month_per = '';
    

    	$('#year_periode').change(function(){
    		var thing = $(this).val();
    		date_per = thing;
    	});

    	$('#month_periode').change(function(){
    		var thing = $(this).val();
    		month_per = thing;
    	});


    	$('#show_filter_per_trans').click(function(e){
    		e.preventDefault();

    		if(date_per == '' || month_per == ''){
    			swal('hmm','No filter have been set.','error');
    		}else{

    			var url = '{{ url("getPeriodeTransactionFilter") }}/'+date_per+'/'+month_per;

    			$.get(url,function(res){
    				$('#showedTableFilterTransactionPeriode').html(res);

    				$('.table_res_periode_transaction').DataTable({
			        dom: 'Bfrtip',
			        responsive: true,
			        buttons: [
			            'copy', 'csv', 'excel', 'pdf', 'print'
			        ]
			    	});
    			});

    		}

    	});

    	$('#show_all_per_trans').click(function(){
    		location.reload();
    	});

	});
</script>


<script type="text/javascript">
	$(function(){

		$('#table-airport').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

		$('#btn-add-airport').click(function(){
			$('#form_add_airport').fadeOut();
			$('#form_add_airport').attr('hidden',false);
			$('#form_add_airport').fadeIn();
			$('#hold_data_airport').fadeOut();
			$('#hold_data_airport').attr('hidden',true);
		});

		$('#btn-close-airport').click(function(){
			$('#form_add_airport').fadeOut();
			$('#form_add_airport').attr('hidden',true);
			$('#form_add_airport').fadeOut();
			$('#hold_data_airport').fadeIn();
			$('#hold_data_airport').attr('hidden',false);
		});

		$('#btn-close-airport-edit').click(function(){
			$('#form_edit_airport').fadeOut();
			$('#form_edit_airport').attr('hidden',true);
			$('#form_edit_airport').fadeOut();
			$('#hold_data_airport').fadeIn();
			$('#hold_data_airport').attr('hidden',false);
		});

		$('#btn-reset-airport').click(function(){
			$('.form-control').val('');
		});


		$(".showListairportClick").on('click','tr',function(){

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var description_edit = $(this).closest('tr').find('td:eq(1)').text();
			var city = $(this).closest('tr').find('td:eq(2)').text();
			var abbr = $(this).closest('tr').find('td:eq(3)').text();

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_airport').fadeOut();
		        	$('#form_edit_airport').attr('hidden',false);
		        	$('#form_edit_airport').fadeIn();
		        	$('#hold_data_airport').fadeOut();
					$('#hold_data_airport').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#id_edit_airport').val(kode);
					$('#description_edit').val(description_edit);
					$('#city_edit').val(city);
					$('#abbr_edit').val(abbr);

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("airport/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Airport'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 500);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 500);
							        		}
							        	});

							        }, 500);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });
		  }

		});


		var form14 = $('#wizard_with_validation13').show();
	    form14.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form14.find('.body:eq(' + newIndex + ') label.error').remove();
	                form14.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form14.validate().settings.ignore = ':disabled,:hidden';
	            return form14.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // form14.validate().settings.ignore = ':disabled';
	            return form14.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	if($('#digit').val().length > 3 || $('#digit').val().length < 3){
	        		swal('Error!','Abbr only 3 digits','error');
	        	}else{
	        		swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
				    }, function () {
				        setTimeout(function () {
				        	var data = $('.ff_airport').serializeArray();
				        	var url = $('.ff_airport').attr('action');
				        	$.post(url,data,function(res){

				        		if(res == 'Success Saving The Airport'){
				        			setTimeout(function(){
				        				swal("Success!", res, "success");
				        				location.reload();
				        			}, 500);
				        		}else{
				        			setTimeout(function(){
				        				swal("Failed!", res, "error");
				        				location.reload();
				        			}, 500);
				        		}
				        	});

				        }, 500);
				    });
	        	}
	        	
	        }
	    });

	    form14.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	    // UPDATE IT
	    
	    var form15 = $('#wizard_with_validation14').show();
	    form15.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form15.find('.body:eq(' + newIndex + ') label.error').remove();
	                form15.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form15.validate().settings.ignore = ':disabled,:hidden';
	            return form15.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // form15.validate().settings.ignore = ':disabled';
	            return form15.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	if($('.digit_edit').val().length > 3 || $('.digit_edit').val().length < 3){
	        		swal('Error!','Abbr only 3 digits','error');
	        	}else{

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var dat2 = $('.ff_airport_edite').serializeArray();
			        	var ur2 = $('.ff_airport_edite').attr('action');
			        	
			        	$.post(ur2,dat2,function(res){

			        		if(res == 'Success Updating The Airport'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 500);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 500);
			        		}
			        	});

			        }, 500);
			    });

	        }
	    }

	    });

	    form15.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });

	    function setButtonWavesEffect(event) {
		    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
		    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
		}


		$('.table_rute_from').dataTable();
		$('#resultShowed2').fadeOut();
		$('.table_rute_to').dataTable();
		$('#resultShowed4').fadeOut();

		$('#showedBy').on('change',function(){
			var text = $(this).val();

			if(text == 'Station'){
				$('#resultShowed2').fadeOut();
				$('#resultShowed').fadeIn();
			}else{
				$('#resultShowed').fadeOut();
				$('#resultShowed2').fadeIn();
			}

		});

		$('#showedBy2').on('change',function(){
			var text = $(this).val();

			if(text == 'Station'){
				$('#resultShowed4').fadeOut();
				$('#resultShowed3').fadeIn();
			}else{
				$('#resultShowed3').fadeOut();
				$('#resultShowed4').fadeIn();
			}

		});

		$('#resultShowed .table_rute_from .showListStatFrom').on('click','tr',function(){
			var kode = $(this).closest('tr').find('td:eq(0)').text();
			$('#rute_from').val(kode);
			$("#rute_from_edit").val(kode);

			$('#mdModal_from').modal('hide');
		});

		$('#resultShowed2 .table_rute_from .showListStatFrom').on('click','tr',function(){
			var kode = $(this).closest('tr').find('td:eq(0)').text();
			$('#rute_from').val(kode);
			$("#rute_from_edit").val(kode);

			$('#mdModal_from').modal('hide');
		});


		$('#resultShowed3 .table_rute_to .showListStatto').on('click','tr',function(){
			var kode = $(this).closest('tr').find('td:eq(0)').text();
			$('#rute_to').val(kode);
			$("#rute_to_edit").val(kode);

			$('#mdModal_to').modal('hide');
		});

		$('#resultShowed4 .table_rute_to .showListStatto').on('click','tr',function(){
			var kode = $(this).closest('tr').find('td:eq(0)').text();
			$('#rute_to').val(kode);
			$("#rute_to_edit").val(kode);

			$('#mdModal_to').modal('hide');
		});

		new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJsRADAR('radar'));

		function getChartJsRADAR(type) {

			config = {
	            type: 'radar',
	            data: {
	                labels: [<?php

	                	$array_month = array(
				            '01' => 'January',
				            '02' => 'February',
				            '03' => 'March',
				            '04' => 'April',
				            '05' => 'May',
				            '06' => 'June',
				            '07' => 'July',
				            '08' => 'August',
				            '09' => 'September',
				            '10' => 'October',
				            '11' => 'November',
				            '12' => 'December',
				        );

	                	$send1 = \App\HomeModel::getDateTransportCount();
	                	foreach ($send1 as $key => $value) {
	                		echo "'".$array_month[$value->date]."'".',';
	                	}
	                 ?>],
	                datasets: [{
	                    label: "Train Reservation",
	                    data: [<?php 
	                    	$send2 = \App\HomeModel::getDateTransportTrainCount();
			                	foreach ($send2 as $key => $value) {
			                		echo $value->counted.',';
			                	}
	                     ?>],
	                    borderColor: 'rgba(0, 188, 212, 0.8)',
	                    backgroundColor: 'rgba(0, 188, 212, 0.5)',
	                    pointBorderColor: 'rgba(0, 188, 212, 0)',
	                    pointBackgroundColor: 'rgba(0, 188, 212, 0.8)',
	                    pointBorderWidth: 1
	                }, {
	                        label: "Airplane Reservation",
	                        data: [<?php 
	                    	$send2 = \App\HomeModel::getDateTransportairplaneCount();
			                	foreach ($send2 as $key => $value) {
			                		echo $value->counted.',';
			                	}
	                     ?>],
	                        borderColor: 'rgba(233, 30, 99, 0.8)',
	                        backgroundColor: 'rgba(233, 30, 99, 0.5)',
	                        pointBorderColor: 'rgba(233, 30, 99, 0)',
	                        pointBackgroundColor: 'rgba(233, 30, 99, 0.8)',
	                        pointBorderWidth: 1
	                    }]
	            },
	            options: {
	                responsive: true,
	                legend: false
	            }
	        }

	        return config;

		}



	});
</script>