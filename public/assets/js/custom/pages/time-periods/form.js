"use strict";

// Class definition
var PlanForm = function() {
    // Elements
    var form = document.getElementById('time_period_form');
    var submitButton =document.getElementById('submit');

    var validator;

    const initTimeFormRepeater = () => {
        $('#add_time_conditions').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();

                // Init select2 on new repeated items
                initConditionsSelect2();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }



    // Init condition select2
    // Init condition select2
    const initConditionsSelect2 = () => {
        // Tnit new repeating condition types
        const allConditionTypes = document.querySelectorAll('[data-add-time="condition_type"]');
        allConditionTypes.forEach(type => {
            console.log(type);
            $(type).select2({
                minimumResultsForSearch: -1
            });
            if ($(type).hasClass("select2-hidden-accessible")) {
                return;
            } else {
                $(type).select2({
                    minimumResultsForSearch: -1
                });
            }
        });
    }

    // Handle form
    var handleForm = function(e) {
        // Init form validation times. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    category: {
                        validators: {
                            notEmpty: {
                                message: 'Category field is required'
                            }
                        }
                    },
                    time: {
                        validators: {
                            notEmpty: {
                                message: 'Time field is required'
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
                    submitButton.setAttribute('data-time-periods-indicator', 'on');

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
                                window.location.assign('/time-periods');
                            }
                        })
                    }).catch((error)=>{
                        if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                          }
                    }).finally(()=>{
                        submitButton.disabled = false
                        submitButton.setAttribute('data-time-periods-indicator', 'off');
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
            form = document.querySelector('#time_period_form');
            submitButton = document.querySelector('#submit');

            handleForm();
            initTimeFormRepeater();
            initConditionsSelect2();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    PlanForm.init();

});

