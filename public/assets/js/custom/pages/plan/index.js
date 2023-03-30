"use strict";

// Class definition
var KTAppEcommerceCategories = function () {
    // Shared variables
    var table;

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()


    // Delete cateogry
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[plan-table="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');
                var id = $(this).data('id');
                // Get category name
                const planName = parent.querySelector('[plan-filter = "plan_name"]').innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + planName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: true,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    blockUI.block();
                    if (result.value) {
                        axios
                        .delete("/plan/" + id +"/delete")
                        .then((response) => {
                          toastr.success(response.data.message);
                          $(parent).remove().draw();
                        })
                        .catch((error) => {
                          if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                          }
                        }).finally(()=>blockUI.release());
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: planName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    var handleEditRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[attribute-value-edit="edit_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();
                // Select parent row
                var id = $(this).data('id');

                axios.get("/plan/value/" + id +"/edit")
                        .then((response) => {
                            console.log(response.data.id)
                            console.log(response.data.attribute_value)
                            console.log(response.data.status)
                            $("#attribut_value_id").val(response.data.id)
                            $("#attribute_value").val(response.data.attribute_value)
                            $("#status").val(response.data.status)
                        })
                });
            })

    }

    var handleDeleteAttributeValueRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[plan-table="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');
                var id = $(this).data('id');
                // Get category name
                const attributeValueName = parent.querySelector('[attribute-filter="attribute_value"]').innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + attributeValueName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: true,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    blockUI.block();
                    if (result.value) {
                        axios
                        .delete("/attribute/value/" + id +"/delete")
                        .then((response) => {
                          toastr.success(response.data.message);
                          $(parent).remove().draw();
                        })
                        .catch((error) => {
                          if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                          }
                        }).finally(()=>blockUI.release());
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: attributeValueName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }


    // Public methods
    return {
        init: function () {
            table = document.querySelector('#plan_table');
            if (!table) {
                return;
            }
            handleDeleteRows();
            handleEditRows();
            handleDeleteAttributeValueRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceCategories.init();
});

// Make the DIV element draggable:
var element = document.querySelector('#attributeModel');
dragElement(element);

var element = document.querySelector('#attributevalueEditmodel');
dragElement(element);

