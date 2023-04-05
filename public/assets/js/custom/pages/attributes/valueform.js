"use strict";

// Class definition
var KTSigninGeneral = function () {
    var table;
    // Elements
    var form = document.getElementById('value_form');
    var submitButton = document.getElementById('submit');
    var addAttributeButton = document.getElementById('add_attribute');

    var validator;

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form, {
                fields: {
                    attribute_value: {
                        validators: {
                            notEmpty: {
                                message: 'The field is required'
                            }
                        }
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message: 'The Status field is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '', // comment to enable invalid state icons
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
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;
                    axios.post(form.getAttribute("action"), new FormData(form)).then((response) => {
                        Swal.fire({
                            text: response.data.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.value) {
                                window.location.reload();
                            }
                        })
                    }).catch((error) => {
                        if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                        }
                    }).finally(() => {
                        submitButton.disabled = false
                        submitButton.setAttribute('data-kt-indicator', 'off');
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
    var handleEditRows = () => {
        const editBtn = table.querySelectorAll('[attribute-value-edit="edit_row"]');
        editBtn.forEach(d => {

            // Delete button on click
            d.addEventListener('click', function (e) {

                blockUI.block();


                var id = $(this).data('id');
                form.setAttribute("action", '/attribute-value/' + id + '/update');
                // Select all delete buttons
                const editBtn = table.querySelectorAll('[attribute-value-edit="edit_row"]');
                e.preventDefault();
                // Select parent row
                axios.get("/attribute-value/" + id + "/edit")
                    .then((response) => {
                        // $("#attribut_value_id")[0].value = response.data.id
                        $("#attribut_value_id").attr("value", response.data.id)
                        $("#attribute_value").val(response.data.attribute_value)
                        $("#status").val(response.data.status)
                    }).finally(() => {
                        $('#status').select2().trigger('change');
                        const modalEl = document.querySelector("#attributeModel");
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                        blockUI.release();

                    })
            });
        })

    }

    var addAttribute = () => {
        addAttributeButton.addEventListener("click", function () {
            document.getElementsByClassName("modal-title")[0].innerHTML  = 'Add Attribute Value';

            form.reset();
            form.setAttribute("action", '/attribute-value/store');
        });

    }
    var editAttribute = () => {
        addAttributeButton.addEventListener("click", function () {
            document.getElementsByClassName("modal-title")[0].innerHTML   = 'Edt Attribute Value';
            var id = (addAttributeButton).getAttribute("data-id");
            form.setAttribute("action", '/attribute-value/' + id + '/update');
        });
    }
    // Public functions
    return {
        // Initialization
        init: function () {
            table = document.querySelector('#attribute_table');
            if (!table) {
                return;
            }
            form = document.querySelector('#value_form');
            submitButton = document.querySelector('#submit');
            handleForm();
            editAttribute();
            addAttribute();
            handleEditRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();

});
