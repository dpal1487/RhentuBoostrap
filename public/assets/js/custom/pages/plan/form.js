"use strict";

// Class definition
var PlanForm = function() {
    // Elements
    var form = document.getElementById('plan_form');
    var submitButton =document.getElementById('submit');

    var validator;

    const initRuleFormRepeater = () => {
        $('#plan_conditions').repeater({
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


    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            }
                        }
                    },
                    price: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            },
                        }
                    },
                    currency: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    category: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            }
                        }
                    },
                    no_of_ads: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    sign_up_fee: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    trial_period: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    trial_interval : {
                        validators:{
                            notEmpty:{
                                message:'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    invoice_period: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    invoice_interval: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            }
                        }
                    },
                    grace_period: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    grace_interval: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            }
                        }
                    },
                    prorate_day: {
                        validators: {

                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    prorate_period: {
                        validators: {

                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    prorate_extend_due: {
                        validators: {

                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    active_subscribers_limit: {
                        validators: {

                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    sort_order: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'only number allowd'
                            }
                        }
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message: 'field is required'
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
                    submitButton.setAttribute('data-plan-indicator', 'on');

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
                                window.location.assign('/plan');
                            }
                        })
                    }).catch((error)=>{
                        if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                          }
                    }).finally(()=>{
                        submitButton.disabled = false
                        submitButton.setAttribute('data-plan-indicator', 'off');
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
            form = document.querySelector('#plan_form');
            submitButton = document.querySelector('#submit');

            handleForm();
            initRuleFormRepeater();

        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    PlanForm.init();

});
