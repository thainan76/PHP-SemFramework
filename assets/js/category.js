/**
*  Request to add category
*/
function add() {

    let data = {};
    let save = true;
    let method = 'addCategory';

    data.name = $('#category-name').val();

    save = this.validation(data);

    if (save) {
        $.ajax({
            url: 'crud.php?method=' + method,
            type: 'POST',
            data: {val: data},
            success: function (data) {
                setTimeout(function () {
                    window.location.href = '?page=categories'
                }, 1500);

                Swal.fire(
                    'Category created!',
                    '',
                    'success'
                )

            }
        });
    }

}

/**
 *  Request to edit category
 */
function edit() {

    let data = {};
    let save = true;
    let method = 'editCategory';

    data.id = $('#id').val();
    data.name = $('#category-name').val();

    save = this.validation(data);

    if (save) {
        $.ajax({
            url: 'crud.php?method=' + method,
            type: 'POST',
            data: {val: data},
            success: function (data) {
                setTimeout(function () {
                    window.location.href = '?page=categories'
                }, 1500);
                Swal.fire(
                    'Category updated!',
                    '',
                    'success'
                )

            }
        });
    }

}

/**
 *  Request to delete category
 */
function del(id) {

    let data = {};
    let method = 'deleteCategory';

    data.id = id;

    Swal.fire({
        title: 'Are you sure delete this category?',
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
                        window.location.href = '?page=categories'
                    }, 1500);
                    Swal.fire(
                        'Category deleted!',
                        '',
                        'success'
                    );
                }
            });
        }
    });

}

/**
 *  Validation of category
 */
function validation(data) {

    if (data.name === null || data.name === '') {
        Swal.fire(
            'Category name can\'t be empty!',
            '',
            'error'
        );
        $('#category-name').css( "border", "1px solid red" );
        return false;
    }
    return true;
}

/**
 *  Cancel validation
 */
function cancelValidation(id) {
    $('#'+id).css( "border", "1px solid #ccc" );
}