        </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <!-- <script src="/js/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <!-- Datepicker -->
    <script src="<?= base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

    <script src="<?= base_url()?>assets/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url()?>assets/js/dashboard.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(function() {
                $('#tanggal_laporan').datepicker({
                    changeYear: true,
                    changeMonth : true,
                    showButtonPanel: true,
                    dateFormat: 'MM yy',
                    maxDate: '+1M',
                    onClose: function(dateText, inst) { 
                        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, month, 1));
                    }
                });
            });
        });
</script>

</body>
</html>