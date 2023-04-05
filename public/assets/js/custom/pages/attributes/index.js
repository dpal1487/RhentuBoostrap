"use strict";

// Class definition
var KTAppEcommerceCategories = function () {
    // Shared variables
    var table;

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()


    // Delete cateogry
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[attribute-table="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');
                var id = $(this).data('id');
                // Get category name
                const attributeName = parent.querySelector('[attribute-filter = "attribute_name"]').innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + attributeName + "?",
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
                        .delete("/attribute/" + id +"/delete")
                        .then((response) => {
                          toastr.success(response.data.message);
                          $(parent).remove().draw();
                        })
                        .catch((error) => {
                          if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                          }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: attributeName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                }).finally(()=>blockUI.release());
            })
        });
    }

    var handleDeleteAttributeValueRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[attribute-value-table="delete_row"]');

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
                        .delete("/attribute-value/" + id +"/delete")
                        .then((response) => {
                          toastr.success(response.data.message);
                          $(parent).remove().draw();
                        })
                        .catch((error) => {
                          if (error.response == 400) {
                            toastr.error(error.response.data.message);
                          }
                        });
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
                }).finally(()=>blockUI.release());
            })
        });
    }

    return {
        init: function () {
            table = document.querySelector('#attribute_table');
            if (!table) {
                return;
            }
            handleDeleteRows();
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

var element = document.querySelector('#attributevalueEditmodel');

