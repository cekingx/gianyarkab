<title>Hubungi Kami</title>

<?php if(isset($message)) {
    echo('
    <div class="alert alert-custom alert-outline-2x alert-outline-primary fade show mb-5" id="message" role="alert">
        <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
        <div class="alert-text">'
        .$message.
        '</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
    ');
} ?>

<div class="card card-custom gutter-b">
    
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Narahubung
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="narahubung-form">
            <!-- begin::narahubung-email -->
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Email" name="narahubung_email"
                    id="narahubung_email" />
                <span style="display: none;" class="text-danger" id="need-email">
                    Email masih kosong
                </span>
            </div>
            <!-- end::narahubung-email -->
            <!-- begin::narahubung-telp -->
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" class="form-control" placeholder="Telepon" name="narahubung_telp"
                    id="narahubung_telp" />
                <span style="display: none;" class="text-danger" id="need-telp">
                    Telepon masih kosong
                </span>
            </div>
            <!-- end::narahubung-telp -->
            <!-- begin::narahubung-fax -->
            <div class="form-group">
                <label>Fax</label>
                <input type="text" class="form-control" placeholder="Fax" name="narahubung_fax"
                    id="narahubung_fax" />
                <span style="display: none;" class="text-danger" id="need-fax">
                    Fax masih kosong
                </span>
            </div>
            <!-- end::narahubung-fax -->
            <!-- begin::narahubung-alamat -->
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="narahubung_alamat"
                    id="narahubung_alamat" />
                <span style="display: none;" class="text-danger" id="need-alamat">
                    Alamat masih kosong
                </span>
            </div>
            <!-- end::narahubung-alamat -->
        </form>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-primary mr-2" id="btn-save">
            Submit
        </button>
    </div>
</div>

<div class="card card-custom gutter-b">
    
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Pesan dan Aduan
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
    </div>
</div>


<script>
    $('.preloader').fadeOut();
    var KTDatatableKontak = function () {
        var demo = function() {
            var datatable = $('#kt_datatable').KTDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '<?= base_url('admin/kontak/data') ?>',
                            map: function(raw) {
                                var dataset = raw;
                                if(typeof raw.data !== 'undefined') {
                                    dataset = raw.data;
                                }
                                return dataset;
                            }
                        }
                    },
                    pageSize: 10,
                    serverSorting: false
                },
                layout: {
                    scroll: false,
                    footer: false
                },
                pagnation: true,
                columns: [
                    {
                        field: 'kontak_person_judul',
                        title: 'Judul',
                        sortable: true,
                        template: function(row) {
                            return '<a href="<?= base_url('admin/kontak/') ?>'+row.kontak_person_id+'">'+row.kontak_person_judul+'</a>';
                        }
                    },
                    {
                        field: 'kontak_person_tanggal',
                        title: 'Tanggal'
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 100,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            return '\
                                <button data-id="'+row.kontak_person_id+'" class="btn btn-sm btn-clean btn-icon btnDelete" title="Delete">\
                                    <span class="svg-icon svg-icon-md">\
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                <rect x="0" y="0" width="24" height="24"/>\
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                            </g>\
                                        </svg>\
                                    </span>\
                                </button>\
                            ';
                        }
                    }
                ]
            });

            $(document).on("click", ".btnDelete", function() {
                let id = $(this).data('id');
                bootbox.confirm({
                    title: "Hapus Pesan",
                    message: "Apakah anda yakin menghapus pesan?",
                    buttons: {
                        cancel: {
                            label: "Batal"
                        },
                        confirm: {
                            label: "Hapus",
                            className: 'btn-primary'
                        }
                    },
                    callback: function(result) {
                        if(result) {
                            $('.preloader').fadeIn();
                            $.ajax({
                                type: 'GET',
                                url: "<?= base_url('admin/kontak/delete/') ?>" + id,
                                dataType: 'json',
                                success: function(data) {
                                    $('.preloader').fadeOut();
                                    window.location.replace('<?= base_url('admin/kontak') ?>')
                                },
                                error: function(xhr, desc, err) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }
                    }
                });
            });
        }

        return {
            init: function() {
                demo();
            }
        };
    }();

    $(document).ready(function() {
        KTDatatableKontak.init()
    });

    $('#narahubung_email').keyup(function() {
        if($('#narahubung_email').val() == '') {
            $('#narahubung_email').addClass('is-invalid');
            $('#need-email').fadeIn();
        } else {
            $('#narahubung_email').removeClass('is-invalid');
            $('#need-email').fadeOut();
        }
    });
    
    $('#narahubung_telp').keyup(function() {
        if($('#narahubung_telp').val() == '') {
            $('#narahubung_telp').addClass('is-invalid');
            $('#need-telp').fadeIn();
        } else {
            $('#narahubung_telp').removeClass('is-invalid');
            $('#need-telp').fadeOut();
        }
    });

    $('#narahubung_fax').keyup(function() {
        if($('#narahubung_fax').val() == '') {
            $('#narahubung_fax').addClass('is-invalid');
            $('#need-fax').fadeIn();
        } else {
            $('#narahubung_fax').removeClass('is-invalid');
            $('#need-fax').fadeOut();
        }
    });

    $('#narahubung_alamat').keyup(function() {
        if($('#narahubung_alamat').val() == '') {
            $('#narahubung_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn();
        } else {
            $('#narahubung_alamat').removeClass('is-invalid');
            $('#need-alamat').fadeOut();
        }
    });

    $('#btn-save').click(function() {
        if($('#narahubung_email').val() == '') {
            $('#narahubung_email').addClass('is-invalid');
            $('#need-email').fadeIn();
        } else if($('#narahubung_telp').val() == '') {
            $('#narahubung_telp').addClass('is-invalid');
            $('#need-telp').fadeIn();
        } else if($('#narahubung_fax').val() == '') {
            $('#narahubung_fax').addClass('is-invalid');
            $('#need-fax').fadeIn();
        } else if($('#narahubung_alamat').val() == '') {
            $('#narahubung_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn();
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/kontak/narahubung/store') ?>',
                data: {
                    narahubung_email: $('#narahubung_email').val(),
                    narahubung_telp: $('#narahubung_telp').val(),
                    narahubung_fax: $('#narahubung_fax').val(),
                    narahubung_alamat: $('#narahubung_alamat').val(),
                },
                success: function(data) {
                    $('.preloader').fadeOut();
                    window.location.reload();
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            })
        }
    })
</script>
