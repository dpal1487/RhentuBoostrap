"use strict";

// Class definition
var PlanForm = function() {
    // Elements
    var form = document.getElementById('coupon_form');
    var submitButton =document.getElementById('submit');

    var validator;

    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    code: {
                        validators: {
                            notEmpty: {
                                message: 'The Code field is required'
                            }
                        }
                    },

                    expires_in_days: {
                        validators: {
                            notEmpty: {
                                message: 'The Category field is required'
                            }
                        }
                    },
                    type: {
                        validators: {
                            notEmpty: {
                                message: 'The amount is required'
                            }
                        }
                    },
                    discount : {
                        validators:{
                            notEmpty:{
                                message:'The discount field is required'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'The description field is required'
                            }
                        }
                    }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
				}
			}
		);

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action

            e.preventDefault();

            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    blockUI.block();

                    // Show loading indication
                    submitButton.setAttribute('data-coupon-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;
                    axios.post(form.getAttribute("action"), new FormData(form)).then((response)=>{
                        Swal.fire({
                            text: response.data.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if(result.value){
                                window.location.assign('/coupon');
                            }
                        })
                    }).catch((error)=>{
                        if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                          }
                    }).finally(()=>{
                        submitButton.disabled = false
                        submitButton.setAttribute('data-coupon-indicator', 'off');
                    blockUI.release();

                    })
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
		});
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#coupon_form');
            submitButton = document.querySelector('#submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    PlanForm.init();

});

$("#kt_datepicker_1").flatpickr(
    {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    }
);