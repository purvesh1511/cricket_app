function appendSubCategory(category_id) {
    $.ajax({
        url: "append-sub-category",
        type: "POST",
        data: {
            category_id: category_id,
        },
        success: function (appendSubCategoryResponse) {
            $("#sub_category_id").html(appendSubCategoryResponse);
        },
        error: function (appendSubCategoryErrors) {
            console.log(appendSubCategoryErrors);
        },
    });
}
let attributeObj = {};

function fetchProductAttribute() {
    $.ajax({
        url: "append-attribute-data",
        type: "POST",
        data: {
            attribute_array: JSON.stringify(attributeObj),
        },
        success: function (attributeNameResponse) {
            $("#attributeNameList").html(attributeNameResponse);
            $("#productAttribute").attr("required", false);
            $("#productAttribute").val("");
        },
        error: function (attributeNameError) {
            console.log(attributeNameError);
        },
    });
}
function fetchProductPrices(id) {
    if (id.value == "Single") {
        $("#addProductBtn").attr("disabled", false);
        attributeObj = {};
        fetchProductAttribute();
    }
    $.ajax({
        url: "fetch-product-price",
        type: "POST",
        data: {
            product_variation: id.value,
        },
        success: function (productPriceResponse) {
            $("#productPriceAndStock").html(productPriceResponse);
        },
        error: function (productPriceError) {
            console.log(productPriceError);
        },
    });
}
function disableSubmitBtn() {
    $("#addProductBtn").attr("disabled", true);
}
function enableProductStoreBtn() {
    $("#addProductBtn").attr("disabled", false);
}
function appendAttribute() {
    if ($("#productAttribute").val().length > 0) {
        var attributeValue = $("#productAttribute").val();
        if (!(attributeValue in attributeObj)) {
            attributeObj[attributeValue] = {};
            //console.log(attributeObj);
            fetchProductAttribute();
        } else {
            $("#productAttribute").val("");
        }
    }
}

function deleteAttributeName(attribute) {
    if (attribute in attributeObj) {
        delete attributeObj[attribute];
    }
    fetchProductAttribute();
}

function addAttributeValue(attribute, id) {
    var attributeValueData = $("#" + id + "").val();
    if (JSON.stringify(attributeObj[attribute]) === "{}") {
        attributeObj[attribute] = attributeValueData;
    } else {
        if (!(attributeObj[attribute].split(',').includes(attributeValueData))) {
            attributeObj[attribute] =
            attributeObj[attribute] + "," + attributeValueData;
        }
    }
    $("#" + id + "").val("");
    fetchProductAttribute();
}
function removeAttributeValue(attribute_data, attribute, attribute_value) {
    let attribute_value_array = attribute_data.split(',');
    if(attribute_value_array.includes(attribute_value)) {
        attribute_value_array = attribute_value_array.filter(e => e !== attribute_value);
    }
    attribute_data = attribute_value_array.toString();
    if (attribute_data.length == 0) {
        attributeObj[attribute] = {};
    } else {
        attributeObj[attribute] = attribute_data;
    }
    fetchProductAttribute();
}
function fetchProductDetails(product_id, token, attribute = '', quantity = 1) {
    $("#productDetails").html('<span class="loader mx-auto"></span>');
    $.ajax({
        url: "product-details",
        type: "POST",
        data: {
            _token: token,
            product_id: product_id,
            attribute: attribute,
            quantity: quantity
        },
        success: function (fetchProductDetailsResponse) {
            $("#productDetails").html(fetchProductDetailsResponse);
        },
        error: function (fetchProductDetailsErrors) {
            console.log(fetchProductDetailsErrors);
        },
    });
}
function switchProductAttribute(product_id, token) {
    var attributes = [];
    let quantity = $('#Quantity').val();
    $('.product-attribute-option:checked').each((index, item) => {
        attributes.push($(item).val());
    });
    fetchProductDetails(product_id, token, attributes.toString(), quantity);
}
function quantityDecrement() {
    if (parseInt($('#Quantity').val()) > 1) {
        $('#Quantity').val(parseInt($('#Quantity').val()) - 1);
    }
}
function quantityIncrement() {
    $('#Quantity').val(parseInt($('#Quantity').val()) + 1);
}
function changeOrder(token, product_id, el) {
    if ($(el).val() >= 0) {
        $.ajax({
            url: "chnage-product-order",
            type: "POST",
            data: {
                _token: token,
                priority: $(el).val(),
                product_id: product_id
            },
            success: function (changeOrderResponse) {

            },
            error: function (changeOrderErrors) {
                console.log(changeOrderErrors);
            }
        });
    }
}