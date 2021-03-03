/**
 *  Request to add product
 */
function add() {

    let data = {};
    let method = 'addProduct';
    let save = true;

    data.sku = $('#sku').val();
    data.nome = $('#name').val();
    data.preco = $('#price').val().replace('.','').replace(',','.');
    data.quantidade = $('#quantity').val();
    data.id_categoria = $('#category').val();
    data.descricao = $('#description').val();
    data.image = $('#img')[0].style.backgroundImage.replace('url("', '').replace('")', '');

    save = this.validation(data);

    if (save) {
        $.ajax({
            url: 'crud.php?method=' + method,
            type: 'POST',
            data: {val: data},
            success: function (data) {
                setTimeout(function () {
                    window.location.href = '?page=dashboard'
                }, 1500);

                Swal.fire(
                    'Product created!',
                    '',
                    'success'
                )

            }
        });
    }
}

/**
 *  Request to edit product
 */
function edit() {

    let data = {};
    let method = 'editProduct';
    let save = true;

    data.id = $('#id').val();
    data.sku = $('#sku').val();
    data.nome = $('#name').val();
    data.preco = $('#price').val().replace('.','').replace(',','.');
    data.quantidade = $('#quantity').val();
    data.id_categoria = $('#category').val();
    data.descricao = $('#description').val();
    data.image = $('#img')[0].style.backgroundImage.replace('url("', '').replace('")', '');

    save = this.validation(data);

    if (save) {
        $.ajax({
            url: 'crud.php?method=' + method,
            type: 'POST',
            data: {val: data},
            success: function (data) {
                setTimeout(function () {
                    window.location.href = '?page=products'
                }, 1500);

                Swal.fire(
                    'Product updated!',
                    '',
                    'success'
                )

            }
        });
    }
}

/**
 *  Request to delete product
 */
function del(id) {

    let data = {};
    let method = 'deleteProduct';

    data.id = id;

    Swal.fire({
        title: 'Are you sure delete this product?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'crud.php?method=' + method,
                type: 'POST',
                data: {val: data},
                success: function (data) {
                    setTimeout(function () {
                        window.location.href = '?page=products'
                    }, 1500);
                    Swal.fire(
                        'Product deleted!',
                        '',
                        'success'
                    );
                }
            });
        }
    });

}

/**
 *  Cancel validation
 */
function cancelValidation(id) {
    $('#'+id).css( "border", "1px solid #ccc" );
}


/**
 *  Validation of product
 */
function validation(data) {

    if (data.sku === null || data.sku === '') {
        Swal.fire(
            'SKU can\'t be empty!',
            '',
            'error'
        );
        $( '#sku' ).css( "border", "1px solid red" );
        return false;
    } else if (data.nome === null || data.nome === '') {
        Swal.fire(
            'Name can\'t be empty!',
            '',
            'error'
        );
        $( '#name' ).css( "border", "1px solid red" );
        return false;
    } else if (data.preco === null || data.preco === '') {
        Swal.fire(
            'Price can\'t be empty!',
            '',
            'error'
        );
        $( '#price' ).css( "border", "1px solid red" );
        return false;
    } else if (data.quantidade < 0) {
        Swal.fire(
            'Quantity of product can\'t be negative!',
            '',
            'error'
        );
        $( '#quantity' ).css( "border", "1px solid red" );
        return false;
    } else if (data.id_categoria === null || data.id_categoria === '') {
        Swal.fire(
            'Select a category!',
            '',
            'error'
        );
        $( '#id_categoria' ).css( "border", "1px solid red" );
        return false;
    } else if (data.descricao === null || data.descricao === '') {
        Swal.fire(
            'Description can\'t not be empty!',
            '',
            'error'
        );
        $( '#description' ).css( "border", "1px solid red" );
        return false;
    } else if (data.image === null || data.image === '') {
        Swal.fire(
            'Product without image!',
            '',
            'error'
        );
        return false;
    }

    return true;
}

/**
 *  Function to format price
 */
function formatPrice(price) {

    let valor = price;

    if (valor === null || valor === '') {
        valor = '0,00';
    }

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g, ''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    $('#price').val(valor);

}

/**
 *  Function
 */
$(".imgAdd").click(function(){
    $(this).closest(".row")
        .find('.imgAdd')
        .before('<div class="col-sm-2 imgUp">' +
        '<div class="imagePreview"></div>' +
        '<label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;">' +
        '</label><i class="fa fa-times del">' +
        '</i></div>');
});


/**
 *  Function
 */
$(document).on("click", "i.del" , function() {
    $(this).parent().remove();
});



/**
 *  Function
 */
$(function() {
    $(document).on("change",".uploadFile", function()
    {
        let uploadFile = $(this);
        let files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                uploadFile.closest(".imgUp").find('.imagePreview')
                    .css("background-image", "url("+this.result+")");
            }
        }

    });
});