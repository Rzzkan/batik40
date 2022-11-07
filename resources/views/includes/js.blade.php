<!--   Core JS Files   -->
<script src="{{ asset('tema/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('tema/js/core/popper.min.js') }}"></script>
<script src="{{ asset('tema/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('tema/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('tema/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('tema/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


<!-- Chart JS -->
<script src="{{ asset('tema/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('tema/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('tema/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('tema/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<!-- <script src="{{ asset('tema/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script> -->

<!-- jQuery Vector Maps -->
<script src="{{ asset('tema/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('tema/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('tema/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('tema/js/atlantis.min.js') }}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ asset('tema/js/setting-demo.js') }}"></script>
<script src="{{ asset('tema/js/demo.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#prov-dropdown').on('change', function() {
            var dapat_data_prov = this.value;
            const id_pisah_prov = dapat_data_prov.split("---");
            var id_prov = id_pisah_prov[0];
            document.getElementById("nama_prov").value = id_pisah_prov[1];

            $("#kab-dropdown").html('');
            $.ajax({
                url: "{{url('get_kab')}}",
                type: "GET",
                data: {
                    id_prov: id_prov,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#kab-dropdown').html('<option value="">Pilih Kota/Kabupaten</option>');
                    $.each(result.rajaongkir.results, function(key, value) {
                        $("#kab-dropdown").append('<option value="' + value.city_id + '---' + value.city_name + ' ' + value.type + '">' + value.city_name + ' ' + value.type + '</option>');
                    });
                    $('#kac-dropdown').html('<option value="">Pilih Kota/Kabupaten Dahulu</option>');
                }
            });
        });

        $('#kab-dropdown').on('change', function() {

            var dapat_data_kab = this.value;
            const id_pisah_kab = dapat_data_kab.split("---");
            document.getElementById("nama_kab").value = id_pisah_kab[1];
            var id_kab = id_pisah_kab[0];

            $("#kac-dropdown").html('');
            $.ajax({
                url: "{{url('get_kec')}}",
                type: "GET",
                data: {
                    id_kab: id_kab,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#kac-dropdown').html('<option value="">Pilih Kecamatan</option>');
                    $.each(result.rajaongkir.results, function(key, value) {
                        $("#kac-dropdown").append('<option value="' + value.subdistrict_id + '---' + value.subdistrict_name + '">' + value.subdistrict_name + '</option>');
                    });
                }
            });
        });

        $('#kac-dropdown').on('change', function() {

            var dapat_data_kec = this.value;
            const id_pisah_kec = dapat_data_kec.split("---");
            document.getElementById("nama_kec").value = id_pisah_kec[1];

        });

        $('#expedisi-dropdown').on('change', function() {

            var dapat_data_expedisi = this.value;
            const pisah_expedisi = dapat_data_expedisi.split("---");

            var id_kec_toko = pisah_expedisi[0];
            var id_kec_tujuan = pisah_expedisi[1];
            var berat = pisah_expedisi[2];
            var kurir = pisah_expedisi[3];

            console.log(dapat_data_expedisi);

            $("#price-dropdown").html('');
            $.ajax({
                url: "{{url('get_price')}}",
                type: "GET",
                data: {
                    id_kec_toko: id_kec_toko,
                    id_kec_tujuan: id_kec_tujuan,
                    berat: berat,
                    kurir: kurir,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    $('#price-dropdown').html('<option value="">Pilih Pengiriman</option>');
                    $.each(result.rajaongkir.results, function(key, value) {
                        $.each(value.costs, function(key, valueCosts) {
                            $.each(valueCosts.cost, function(key, valueCost) {
                                $("#price-dropdown").append('<option value="' +
                                    value.code + '---' +
                                    value.name + '---' +
                                    valueCosts.service + '---' +
                                    valueCosts.description + '---' +
                                    valueCost.value + '---' +
                                    valueCost.etd + '---' +
                                    '">' + valueCost.value + ' IDR | ' +
                                    valueCost.etd + ' hari | ' +
                                    value.name + ' | ' +
                                    valueCosts.description + '(' +
                                    valueCosts.service + ') </option>');
                            });
                        });
                    });
                }
            });
        });

        $('#price-dropdown').on('change', function() {
            var dapat_data_kec = this.value;
            const id_pisah_kec = dapat_data_kec.split("---");
            document.getElementById("nama_kec").value = id_pisah_kec[1];

        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>

<script>
    Circles.create({
        id: 'circles-1',
        radius: 45,
        value: 60,
        maxValue: 100,
        width: 7,
        text: 5,
        colors: ['#f1f1f1', '#FF9E27'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-2',
        radius: 45,
        value: 70,
        maxValue: 100,
        width: 7,
        text: 36,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-3',
        radius: 45,
        value: 40,
        maxValue: 100,
        width: 7,
        text: 12,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    $('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });
</script>