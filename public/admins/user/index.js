$('.accessDel').click(function (e) {
    e.preventDefault();
    let url = $(this).data('url')
    let that = $(this)
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    if (response.code == 200) {
                        that.parent().parent().remove()
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