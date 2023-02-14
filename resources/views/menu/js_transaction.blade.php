<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function adddata() {
        $('#title-modal').text("Form Add Transaction");
        var url = "{{ route('transaction.store') }}";
        $("#form-transaction").attr("action", url); 

        $("#name_customer").val("");
        $("#no_telp").val("");
        $("#address").val("");
    }

    function fill(data) {
        $('#title-modal').text("Form Edit Transaction");

        var update = "{{ route('transaction.update', ':id') }}";
        update = update.replace(':id', data);
        $("#form-transaction").attr("action", update); 

        var url = "{{ route('transaction.get', ':id') }}";
        url = url.replace(':id', data);
        $.ajax({
            type: "GET",
            url:  url,
            success:function(response){
                $("#name_customer").val(response.name_customer);
                $("#no_telp").val(response.no_telp);
                $("#address").val(response.address);
            }
        });
    } 

    function destroy(data) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var url = "{{ route('transaction.delete', ':id') }}";
                url = url.replace(':id', data);
                $.ajax({
                    type: "GET",
                    url:  url,
                    success:function(response){
                        Swal.fire(
                            'Deleted!',
                            'Data has been deleted.',
                            'success'
                        ).then(function() {
                            window.location.reload();
                        });
                    }
                });
            }
        });
    }



</script>
