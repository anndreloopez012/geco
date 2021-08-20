<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  <script src="../../lib/alertify/alertify.js"></script>
<script src="../../lib/materialbootstrap/popper.js"></script>
<script src="../../lib/materialbootstrap/bootstrap-material-design.js"></script>
<script src="../../lib/plugins/chart.js/Chart.min.js"></script>
<script src="../../lib/plugins/sparklines/sparkline.js"></script>
<script src="../../lib/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../lib/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../../lib/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../../lib/plugins/moment/moment.min.js"></script>
<script src="../../lib/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../lib/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../../lib/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../lib/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../../lib/dist/js/adminlte.js"></script>


<script src="../../lib/dist/js/demo.js"></script>
<script src="../../lib/plugins/select2/js/select2.full.min.js"></script>
<script src="../../lib/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../../lib/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../../lib/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="../../lib/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript" src="../../lib/jquery_upload/js/jquery.form.js"></script>
<script type="text/javascript" src="../../lib/jquery_upload/js/jquery.uploadfile.js"></script>
<!-- ALERTS MODAL JS -->
<script src="../../lib/alertify.min.js"></script>
<script src="../../lib/alertify/alertify.min.js"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>

<style>
    .scrmenu {
        text-align: right !important;
        color: azure;
    }

    .sismenu {
        text-align: center !important;
    }

    .imgmenu {
        background: #5499c7;
    }

    .loggin {
        height: 90% !important;
    }

    .login-box-msg,
    .register-box-msg {
        margin: 0;
        padding: 50px 20px 15px 20px;
        text-align: center;
    }

    .content-wrapper {
        background: #E2F7E9 !important;
    }

    body {
        background: #E2F7E9 !important;
    }

    .colorBackgroundApp {
        background: #FDFFFD !important;
    }

    a#colorText {
        color: #328A3B !important;
    }
</style>

</body>

</html>