var $j = jQuery.noConflict();
$j(function() {
    $j('.tombolTambahData').on('click', function(){
        $j('#largeModalLabel').html('Tambah data');
        $j('.modal-footer button[type=submit]').html('Tambah data');
    });


    $j('.tampilModalUbah').on('click', function(){
        $j('#largeModalLabel').html('Ubah data');
        $j('.modal-footer button[type=submit]').html('Ubah data');

        const id = $j(this).data('id');
        $j.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
            }
    });
      
        $j.ajax({
            url: '../rumah/edit',
            beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $j("#token").attr('content'));},
            data: {id : id},
            method: 'get',
            dataType: 'json',
            
            success: function(data){
                $J('#no_rumah').val(data.no_rumah);
            }

        });

    });

});