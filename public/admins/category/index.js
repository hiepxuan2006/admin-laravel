$('.accessDel').click(function (e) {
    e.preventDefault();
    let url = $(this).data('url')
    let that = $(this)
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    if (response.code == 200) {
                        let clg = that.parent().parent().remove()
                        console.log(clg)
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                }
            });
        }
    })
});
// let idProduct;
// $('#modal-confirm').on('show.bs.modal', function (event) {
//     let button = $(event.relatedTarget) // Button that triggered the modal
//     idProduct = button.data('id')
//     console.log(idProduct)
// })