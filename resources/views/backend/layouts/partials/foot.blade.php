<!-- JAVASCRIPT -->
<script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Jquery Confirm -->
<script src="{{ asset('plugins/jquery-confirm/js/jquery-confirm.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colvis.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.flash.min.js') }}"></script>
{{-- <script src="{{ asset('plugins/datatables-buttons/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/vfs_fonts.js') }}"></script> --}}
{{-- <script src="{{ asset('plugins/datatables-buttons/js/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/vfs_fonts.js') }}"></script> --}}
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Custom File input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('js/datatables-checkboxes.js') }}"></script>
<!-- materialdesign icon js-->
{{-- <script src="{{ asset('backend/js/pages/materialdesign.init.js') }}"></script> --}}

<script src="{{ asset('backend/js/app.js') }}"></script>
<script>

    //-- Loader 
    $(document).ready(function(){
        $('.loader').remove();
        $('#userTable').removeClass('d-none');
        $('#HistoryTable').removeClass('d-none');
        $('#departementTable').removeClass('d-none');
    })
    //-- End Loader

    //-- DataTables
    $(function () {
        bsCustomFileInput.init();
        //Initialize Select2 Elements
        $('.select2').select2()

        $("#userTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        })

        $('#departementTable').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true
        });
        
        $('#HistoryTable').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true
        });
    })
    //-- End DataTables

   $("#checkbox").click(function () {
       if ($("#checkbox").is(':checked')) {
           $("#e1 > option").prop("selected", "selected");
           $("#e1").trigger("change");
       } else {
           $("#e1 > option").removeAttr("selected");
           $("#e1").val("");
           $("#e1").trigger("change");
       }
   });

   function detailModal(title, url, width) {
        $.confirm({
            title: title,
            theme : 'material',
            backgroundDismiss: true, // this will just close the modal
            content: 'URL:'+url,
            animation: 'zoom',
            closeAnimation: 'scale',
            animationSpeed: 400,
            closeIcon: true,
            columnClass: width,
            buttons: {
                close: {
                    btnClass: 'btn-dark font-bold',                    
                }
            },
        });
    }

    function modalDelete(title, name, url, link) {
        $.confirm({
            title: `Delete ${title}?`,
            content: `Are you sure want to delete ${name}`,
            autoClose: 'cancel|8000',
            buttons: {
                delete: {
                    text: 'delete',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: url,
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "_method": 'delete',
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                window.location.href = link
                            },
                            error: function (data) {
                                $.alert('Failed!');
                                console.log(data);
                            }
                        });
                    }
                },
                cancel: function () {
                    
                }
            }
        });        
    }

    function logout() {
        $.confirm({
            icon: 'fas fa-sign-out-alt',
            title: 'Logout',
            theme: 'supervan',
            content: 'Are you sure want to logout?',
            autoClose: 'cancel|8000',
            buttons: {
                logout: {
                    text: 'logout',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/logout',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                location.reload();
                            },
                            error: function (data) {
                                $.alert('Failed!');
                                console.log(data);
                            }
                        });
                    }
                },
                cancel: function () {
                    
                }
            }
        });
    }
</script>
@stack('scripts')
@yield('script')