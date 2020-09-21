$(document).ready(function() {


    //Manage Categories


    $("#table_cat_manage").on("click", "#table_manage_category a", function () {
        const catId = $(this).data('id');
        const catInputField = $("#td_category_name input[id='txt_change_cat_name" + catId + "']");
        catInputField.prop("readonly", false);

        catInputField.focus();
        let tmpStr = catInputField.val();
        catInputField.val('');
        catInputField.val(tmpStr);

        $(".modal-footer #btn_save").click(function () {
            const changedCatName = catInputField.val();

            const url = "../controller/inventorycontroller.php?status=manage_category";

            $.post(url, {changed_cat_id: catId, changed_cat_name: changedCatName}, function (data) {
                if (data === "1") {
                    $("#msg_category_update").html("Category Updated Successfully!").addClass("alert alert-success");
                } else {
                    $("#msg_category_update").html("Category could not be Updated!").addClass("alert alert-danger");
                }
            })

            $("#td_category_name input[id='txt_change_cat_name" + catId + "']").prop("readonly", true);
            window.setTimeout(function () {
                location.reload()
            }, 2000);
        })


    })

    $("#table_manage_category_del a").click(function () {
        const delCatId = $(this).data('id');
        const inputField = $("#td_category_name input[id='txt_change_cat_name" + delCatId + "']");
        inputField.prop("readonly", true);
    })


    //Manage Item Size


    $("#table_item_size_manage").on("click", "#table_manage_size a", function () {
        const itemSizeId = $(this).data('id');
        const itemSizeInputField = $("#td_item_size_name input[id='txt_change_item_size_name" + itemSizeId + "']");
        itemSizeInputField.prop("readonly", false);

        itemSizeInputField.focus();
        let tmpStr = itemSizeInputField.val();
        itemSizeInputField.val('');
        itemSizeInputField.val(tmpStr);


        $(".modal-footer #btn_save").click(function () {
            const changedItemSizeName = itemSizeInputField.val();

            const url = "../controller/inventorycontroller.php?status=manage_item_size";

            $.post(url, {
                changed_item_size_id: itemSizeId,
                changed_item_size_name: changedItemSizeName
            }, function (data) {
                if (data === "1") {
                    $("#msg_item_size_update").html("Item Size Updated Successfully!").addClass("alert alert-success");
                } else {
                    $("#msg_item_size_update").html("Item Size could not be Updated!").addClass("alert alert-danger");
                }
            })

            $("#td_item_size_name input[id='txt_change_item_size_name" + itemSizeId + "']").prop("readonly", true);
            window.setTimeout(function () {
                location.reload()
            }, 2000);
        })

    })
    $("#table_manage_size_del a").click(function () {
        const delItemSizeId = $(this).data('id');
        $("#td_item_size_name input[id='txt_change_item_size_name" + delItemSizeId + "']").prop("readonly", true);
    })


    //Manage Items in the table
    $(".manage-item").click(function () {
        let manageItemId = $(this).data('id');

        const url = "../controller/inventorycontroller.php?status=manage_item";

        $.post(url, {manageItemId: manageItemId}, function (data) {
            $("#manage_modal_body").html(data).show();

            //Hiding Check Buttons
            $("#btn_item_name_check").hide();
            $("#btn_manufacturer_code_check").hide();
            $("#btn_manufacturer_name_check").hide();
            $("#btn_supplier_check").hide();

            $("#btn_item_category_check").hide();
            $("#btn_item_size_check").hide();
            $("#btn_p_unit_price_check").hide();
            $("#btn_s_unit_price_check").hide();
            $("#btn_discount_check").hide();
            $("#btn_handling_charges_check").hide();
            $("#btn_vat_rate_check").hide();
            $("#btn_location_check").hide();

            //Hiding Select Dropdowns
            $("#select_supplier").hide();
            $("#select_item_category").hide();
            $("#select_item_size").hide();


            //item_name_change
            $("#btn_item_name_pencil").click(function () {
                $(this).hide();
                $('#btn_item_name_check').show();
                $("input[id='manage_item_name']").prop("readonly", false);

                $("#btn_item_name_check").click(function () {
                    $("input[id='manage_item_name']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_item_name_pencil").show();
                })

            })

            //manu code change
            $("#btn_manufacturer_code_pencil").click(function () {
                $(this).hide();
                $('#btn_manufacturer_code_check').show();
                $("input[id='manage_manufacturer_code']").prop("readonly", false);

                $("#btn_manufacturer_code_check").click(function () {
                    $("input[id='manage_manufacturer_code']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_manufacturer_code_pencil").show();


                })
            })

            //manu name change
            $("#btn_manufacturer_name_pencil").click(function () {
                $(this).hide();
                $('#btn_manufacturer_name_check').show();
                $("input[id='manage_manufacturer_name']").prop("readonly", false);

                $("#btn_manufacturer_name_check").click(function () {
                    $("input[id='manage_manufacturer_name']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_manufacturer_name_pencil").show();


                })
            })

            //supplier change
            $("#btn_supplier_pencil").click(function (){
                $(this).hide();
                $('#btn_supplier_check').show();
                $("input[id='manage_supplier']").hide();
                $("#select_supplier").show();

                $("#btn_supplier_check").click(function(){
                    $(this).hide();
                    $("#btn_supplier_pencil").show();
                    let selectedValue = $("#select_supplier option:selected").text();
                    $("#select_supplier").hide();
                    $("input[id='manage_supplier']").show().val(selectedValue);
                })
            })

            //item cat change
            $("#btn_item_category_pencil").click(function (){
                $(this).hide();
                $('#btn_item_category_check').show();
                $("input[id='manage_item_category']").hide();
                $("#select_item_category").show();

                $("#btn_item_category_check").click(function(){
                    $(this).hide();
                    $("#btn_item_category_pencil").show();
                    let selectedValue = $("#select_item_category option:selected").text();
                    $("#select_item_category").hide();
                    $("input[id='manage_item_category']").show().val(selectedValue);
                })
            })

            //item size change
            $("#btn_item_size_pencil").click(function (){
                $(this).hide();
                $('#btn_item_size_check').show();
                $("input[id='manage_item_size']").hide();
                $("#select_item_size").show();

                $("#btn_item_size_check").click(function(){
                    $(this).hide();
                    $("#btn_item_size_pencil").show();
                    let selectedValue = $("#select_item_size option:selected").text();
                    $("#select_item_size").hide();
                    $("input[id='manage_item_size']").show().val(selectedValue);
                })
            })

            //item_p_unit change
            $("#btn_p_unit_price_pencil").click(function () {
                $(this).hide();
                $('#btn_p_unit_price_check').show();
                $("input[id='manage_p_unit_price']").prop("readonly", false);

                $("#btn_p_unit_price_check").click(function () {
                    $("input[id='manage_p_unit_price']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_p_unit_price_pencil").show();
                })

            })

            //item_s_unit change
            $("#btn_s_unit_price_pencil").click(function () {
                $(this).hide();
                $('#btn_s_unit_price_check').show();
                $("input[id='manage_s_unit_price']").prop("readonly", false);

                $("#btn_s_unit_price_check").click(function () {
                    $("input[id='manage_s_unit_price']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_s_unit_price_pencil").show();
                })

            })

            //item discount change
            $("#btn_discount_pencil").click(function () {
                $(this).hide();
                $('#btn_discount_check').show();
                $("input[id='manage_discount']").prop("readonly", false);

                $("#btn_discount_check").click(function () {
                    $("input[id='manage_discount']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_discount_pencil").show();
                })

            })

            //item handling change
            $("#btn_handling_charges_pencil").click(function () {
                $(this).hide();
                $('#btn_handling_charges_check').show();
                $("input[id='manage_handling_charges']").prop("readonly", false);

                $("#btn_handling_charges_check").click(function () {
                    $("input[id='manage_handling_charges']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_handling_charges_pencil").show();
                })

            })

            //item vat change
            $("#btn_vat_rate_pencil").click(function () {
                $(this).hide();
                $('#btn_vat_rate_check').show();
                $("input[id='manage_vat_rate']").prop("readonly", false);

                $("#btn_vat_rate_check").click(function () {
                    $("input[id='manage_vat_rate']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_vat_rate_pencil").show();
                })

            })
            //item location change
            $("#btn_location_pencil").click(function () {
                $(this).hide();
                $('#btn_location_check').show();
                $("input[id='manage_location']").prop("readonly", false);

                $("#btn_location_check").click(function () {
                    $("input[id='manage_location']").prop("readonly", true);
                    $(this).hide();
                    $("#btn_location_pencil").show();
                })

            })









        })
    })

    //Add Stock Level
    $("#pane_stock_level_form").on("change", "#stock_lvl_item_category", function () {
        const itemCatId = $(this).val();
        $.ajax({
            method: "POST",
            url: "../controller/inventorycontroller.php?status=change_txt_select",
            data: {itemCatId: itemCatId},
            success: function (response) {
                $("#change_to_select").html(response).show();
            }
        });
    });

    //Add Stock
    $(".mydatatable").on("click", ".add-stock", function () {
        let stockItemId = $(this).data('id');
        $.ajax({
            method: "post",
            url: "../controller/inventorycontroller.php?status=show_stock_data",
            data: {stockItemId: stockItemId},
            success: function (response) {
                $(".add-stock-form").html(response);

                //Edit Stock Items
                    //Hide Check Buttons
                $("#btn_rol_check").hide();
                $("#btn_roq_check").hide();
                $("#btn_min_stock_check").hide();
                $("#btn_max_stock_check").hide();
                $("#btn_lt_check").hide();
                $("#btn_danger_stock_check").hide();
                $("#btn_buffer_stock_check").hide();


                //rol change
                $("#btn_rol_pencil").click(function () {
                    $(this).hide();
                    $('#btn_rol_check').show();
                    $("input[id='stock_rol']").prop("readonly", false);

                    $("#btn_rol_check").click(function () {
                        $("input[id='stock_rol']").prop("readonly", true);
                        $(this).hide();
                        $("#btn_rol_pencil").show();
                    })

                })
                //roq change
                $("#btn_roq_pencil").click(function () {
                    $(this).hide();
                    $('#btn_roq_check').show();
                    $("input[id='stock_eoq']").prop("readonly", false);

                    $("#btn_roq_check").click(function () {
                        $("input[id='stock_eoq']").prop("readonly", true);
                        $(this).hide();
                        $("#btn_roq_pencil").show();
                    })

                })

                //min change
                $("#btn_min_stock_pencil").click(function () {
                    $(this).hide();
                    $('#btn_min_stock_check').show();
                    $("input[id='stock_min_lvl']").prop("readonly", false);

                    $("#btn_min_stock_check").click(function () {
                        $("input[id='stock_min_lvl']").prop("readonly", true);
                        $(this).hide();
                        $("#btn_min_stock_pencil").show();
                    })

                })

                //max change
                $("#btn_max_stock_pencil").click(function () {
                    $(this).hide();
                    $('#btn_max_stock_check').show();
                    $("input[id='stock_max_lvl']").prop("readonly", false);

                    $("#btn_max_stock_check").click(function () {
                        $("input[id='stock_max_lvl']").prop("readonly", true);
                        $(this).hide();
                        $("#btn_max_stock_pencil").show();
                    })

                })

                //lt change
                $("#btn_lt_pencil").click(function () {
                    $(this).hide();
                    $('#btn_lt_check').show();
                    $("input[id='stock_lead_time']").prop("readonly", false);

                    $("#btn_lt_check").click(function () {
                        $("input[id='stock_lead_time']").prop("readonly", true);
                        $(this).hide();
                        $("#btn_lt_pencil").show();
                    })

                })

                //danger change
                $("#btn_danger_stock_pencil").click(function () {
                    $(this).hide();
                    $('#btn_danger_stock_check').show();
                    $("input[id='stock_dng_lvl']").prop("readonly", false);

                    $("#btn_danger_stock_check").click(function () {
                        $("input[id='stock_dng_lvl']").prop("readonly", true);
                        $(this).hide();
                        $("#btn_danger_stock_pencil").show();
                    })

                })

                //buffer change
                $("#btn_buffer_stock_pencil").click(function () {
                    $(this).hide();
                    $('#btn_buffer_stock_check').show();
                    $("input[id='stock_buffer']").prop("readonly", false);

                    $("#btn_buffer_stock_check").click(function () {
                        $("input[id='stock_buffer']").prop("readonly", true);
                        $(this).hide();
                        $("#btn_buffer_stock_pencil").show();
                    })

                })






            }
        })

    })
    //barcode
    $("#btn_generate_stock_barcode").click(function () {
        const barcode = $("#stock_barcode").val();
        const url = "../controller/inventorycontroller.php?status=generate_barcode";
        $.post(url, {barcode: barcode}, function (data) {
            $("#barcode_image").html(data).show();
        })
    })


    //Edit Stock Levels
        //Hiding Check Buttons

})

