        </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <!-- <script src="/js/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js" type="text/javascript"></script> -->

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js" type="text/javascript"></script>

    <!-- Datepicker -->
    <script src="<?= base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

    <script src="<?= base_url()?>assets/jquery-ui/jquery-ui.min.js"></script>
    <!-- <script src="<?= base_url()?>assets/js/dashboard.js"></script> -->

    <script type="text/javascript">
        var minDate, maxDate;
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[1] ); 
                // index: tergantung kolom tanggal nya dimana

                console.log("min: ", min);
                console.log("max: ", max);
                console.log("data[1]: ", data[1]);
                console.log("date: ", date);

                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date && max === null ) ||
                    ( min <= date && date <= max )
                    ) {
                    return true;
            }
            return false;
        }
        );

        $(document).ready(function(){
            feather.replace({ 'aria-hidden': 'true' });

            minDate = new DateTime($('#min'), {
                format: 'Do MMMM YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'Do MMMM YYYY'
            });            

            var table = $('#myTable').DataTable({
                "paging": true
            });

            $('#min, #max').on('change', function () {
                table.draw();
            });

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

        // tabel di produksi
        $(document).ready(function(){
            feather.replace({ 'aria-hidden': 'true' });

            minDate = new DateTime($('#min_produksi'), {
                format: 'Do MMMM YYYY'
            });
            maxDate = new DateTime($('#max_produksi'), {
                format: 'Do MMMM YYYY'
            });            

            var table = $('#myTable_produksi').DataTable({
                "paging": true
            });

            $('#min_produksi, #max_produksi').on('change', function () {
                table.draw();
            });
        });        

        // tabel di keuangan
        $(document).ready(function(){
            feather.replace({ 'aria-hidden': 'true' });

            minDate = new DateTime($('#min_keuangan'), {
                format: 'Do MMMM YYYY'
            });
            maxDate = new DateTime($('#max_keuangan'), {
                format: 'Do MMMM YYYY'
            });            

            var table = $('#myTable_keuangan').DataTable({
                "paging": true
            });

            $('#min_keuangan, #max_keuangan').on('change', function () {
                table.draw();
            });
        });  
        
        // tabel di detail keuangan
        $(document).ready(function(){
            feather.replace({ 'aria-hidden': 'true' });

            minDate = new DateTime($('#min_detail_keuangan'), {
                format: 'Do MMMM YYYY'
            });
            maxDate = new DateTime($('#max_detail_keuangan'), {
                format: 'Do MMMM YYYY'
            });            

            var table = $('#myTable_detail_keuangan').DataTable({
                "paging": true
            });

            $('#min_detail_keuangan, #max_detail_keuangan').on('change', function () {
                table.draw();
            });
        });        
    </script>

</body>
</html>