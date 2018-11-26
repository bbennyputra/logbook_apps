<style type="text/css">
    .table-padding{
        padding-left: 10px;
    }
</style>

<div class="modal fade" id="tambah_subscription" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Subscription</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/tambah_subscription')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Form</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_subscription" id="kode_subscription" value="<?php echo $kode_subs?>" autocomplete="off" readonly>
                        </div>
                    </div>
                    <!-- <div class="form-group ">
                        <label class="col-sm-3 control-label">Kode Form</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="numerator" id="numerator" placeholder="Kode Form">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal_input" value="<?php echo date('d-m-Y')?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tipe Nasabah</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_tipe" style="width: 100%;" id="tipe_nasabah">
                                <option value="0">--- Pilih Tipe Nasabah ---</option>
                                <option value="1">Nasabah Baru</option>
                                <option value="2">Nasabah Lama</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="nama_nasabah_lama1">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <select class="form-control select2" style="width: 100%;" id="kode_nasabah">
                                <option value="">Pilih Nasabah</option>
                                <?php
                                        if (isset($ref_data_nasabah)){
                                        foreach ($ref_data_nasabah as $data){
                                            $kode_nasabah=$data->kode_nasabah;
                                            $nama_nasabah=$data->nama_nasabah_individu;

                                            if ($nama_nasabah=='') {
                                                $nama_nasabah1=$data->nama_nasabah_institusi;
                                            }
                                            else {
                                                $nama_nasabah1=$nama_nasabah;
                                            }
                                    ?>
                                <option value="<?php echo $kode_nasabah;?>"><?php echo $nama_nasabah1?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden" id="nama_nasabah_lama2">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_nasabah" id="nama_nasabah">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden" id="sid_lama1">
                        <label class="col-sm-3 control-label">SID</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="sid_nasabah" id="sid">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="sid_lama2">
                        <label class="col-sm-3 control-label">SID</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" id="sid2" disabled="disabled">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden" id="nama_sales_lama1">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_sales" id="nama_sales">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="nama_sales_lama2">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" id="nama_sales2" disabled="disabled">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
<!--==========================================================================================================================================-->
                    <div class="form-group" id="nama_nasabah_baru">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_nasabah2">
                        </div>
                    </div>
                    <div class="form-group" id="nama_sales_baru">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_sales" style="width: 100%;" name="nama_sales2">
                                <option value="">Pilih Sales</option>
                                    <?php
                                        if (isset($ref_sales)){
                                        foreach ($ref_sales as $data){
                                    ?>
                                <option value="<?php echo $data->nama_sales?>"><?php echo $data->nama_sales?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
<!--==========================================================================================================================================-->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_fund" style="width: 100%;" name="kode_fund" id="kode_fund">
                                <option value="">Pilih Media</option>
                                    <?php
                                        if (isset($ref_data_fund)){
                                        foreach ($ref_data_fund as $data){
                                    ?>
                                <option value="<?php echo $data->kode_fund?>"><?php echo $data->nama_fund?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_fund" id="nama_fund">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rekening Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_no_rekening" style="width: 100%;" name="no_rekening_fund" id="no_rekening_fund">
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Nama Bank Rekening Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_bank_rekening_fund" id="nama_bank_rekening_fund">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nominal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nominal" id="digit-nominal" placeholder="Nominal" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fee</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="fee" id="digit-fee" placeholder="Fee" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Checklist</label>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="ttd_nasabah" value="1"> Tanda Tangan Nasabah
                            </label>
                        </div>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="ttd_sales" value="1"> Tanda Tangan Sales
                            </label>
                        </div>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="timestamp" value="1"> Timestamp
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($data_subscription)) {
        foreach ($data_subscription as $data) {
?>
<div class="modal fade" id="edit_subscription<?php echo $data->kode_subscription?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Subscription</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/edit_subscription')?>" method="post">
                <div class="modal-body">
                    <!-- <input type="hidden" class="form-control" name="no_pelaporan" value="<?php echo $data->no_pelaporan ?>"> -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. Pelaporan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_subscription" value="<?php echo $data->kode_subscription ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal_input" value="<?php echo $data->tanggal_input?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_fund" value="<?php echo $data->nama_fund?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rekening Fund</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_rekening_fund" value="<?php echo $data->no_rekening_fund .' - ' .$data->nama_bank_rekening_fund?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nominal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nominal" value="<?php echo $data->nominal?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fee</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="fee" value="<?php echo $data->fee?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_nasabah" value="<?php echo $data->nama_nasabah?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">SID</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="sid_nasabah" value="<?php echo $data->sid_nasabah?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_sales" value="<?php echo $data->nama_sales?>" readonly>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Numerator</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="numerator" value="<?php echo $data->numerator?>">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Checklist</label>
                        <?php 

                            if ($data->ttd_nasabah==1) {
                        ?>  
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="ttd_nasabah" value="1" checked="checked"> Tanda Tangan Nasabah
                            </label>
                        </div>
                        <?php
                            }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="ttd_nasabah" value="1"> Tanda Tangan Nasabah
                            </label>
                        </div>
                        <?php } 
                            if ($data->ttd_sales==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="ttd_sales" value="1" checked="checked"> Tanda Tangan Sales
                            </label>
                        </div>
                        <?php 
                            }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="ttd_sales" value="1"> Tanda Tangan Sales
                            </label>
                        </div>
                        <?php } 
                            if ($data->timestamp==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="timestamp" value="1" checked="checked"> Timestamp
                            </label>
                        </div>
                        <?php 
                            }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="timestamp" value="1"> Timestamp
                            </label>
                        </div>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
        }
    }
?>

<?php
    if (isset($data_subscription)) {
        foreach ($data_subscription as $data) {
?>
<div class="modal fade" id="hapus_subscription<?php echo $data->kode_subscription?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Subcription</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/hapus_subscription')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-offset-2">
                            <table>
                                <tr>
                                    <td colspan="3"><p><b>Apakah Anda yakin ingin menghapus data ini?</b></p></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="kode_subscription" value="<?php echo $data->kode_subscription;?>">
                                    <td class="table-padding">Kode Subscription</td>
                                    <td class="table-padding"> : </td>
                                    <td class="table-padding"><?php echo $data->kode_subscription?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Nama Nasabah</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_nasabah?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Nama Fund</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_fund?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
        }
    }
?>

<script type="text/javascript">
    function set_to1(fungsi)
    {
        var pecah = fungsi.split('-');
        var kode = pecah[0];
        var pic = pecah[1];
        var email = pecah[2];
        $('#fungsi_terkait').val(kode);
        $('#pic_fungsi_terkait').val(pic);
        $('#email_pic_fungsi_terkait').val(email);
    }

    $(document).ready(function(){
        $('#kode_fund').change(function(){
            var kode_fund = $("#kode_fund").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/ref_no_rekening_fund'); ?>', 
                type : 'GET', 
                data : 'kode_fund='+kode_fund,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#no_rekening_fund").html(msg);
                    }
                }); 
            });

        $('#kode_fund').change(function(){
            var kode_fund = $("#kode_fund").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/get_nama_fund1'); ?>', 
                type : 'GET', 
                data : 'kode_fund='+kode_fund,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#nama_fund").html(msg);
                    }
                }); 
            });

        $('#kode_nasabah').change(function(){
            var kode_nasabah = $("#kode_nasabah").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/get_nama_nasabah'); ?>', 
                type : 'GET', 
                data : 'kode_nasabah='+kode_nasabah,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#nama_nasabah").html(msg);
                    }
                }); 
            });

        $('#kode_nasabah').change(function(){
            var kode_nasabah = $("#kode_nasabah").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/data_sid'); ?>', 
                type : 'GET', 
                data : 'kode_nasabah='+kode_nasabah,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#sid").html(msg);
                    $("#sid2").html(msg);
                    // $("#nama_sales").html(msg);
                    }
                }); 
            });

        $('#kode_nasabah').change(function(){
            var kode_nasabah = $("#kode_nasabah").val();
            $.ajax({ 
                url  : '<?php echo base_url('logbook/data_sales'); ?>', 
                type : 'GET', 
                data : 'kode_nasabah='+kode_nasabah,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#nama_sales").html(msg);
                    $("#nama_sales2").html(msg);
                    }
                }); 
            });

        $('#no_rekening_fund').change(function(){
            var no_rekening_fund = $("#no_rekening_fund").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/ref_nama_bank_rekening_fund'); ?>', 
                type : 'GET', 
                data : 'no_rekening_fund='+no_rekening_fund,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#nama_bank_rekening_fund").html(msg);
                    }
                }); 
            });

        $('#kode_nasabah').change(function(){
                var kode_nasabah = $("#kode_nasabah").val();
                $.ajax({
                    url  : '<?php echo base_url('logbook/get_email_sales'); ?>', 
                    type : 'GET', 
                    data : 'kode_nasabah='+kode_nasabah,
                    cache: false,
                        success: function(msg){
                        //jika data sukses diambil dari server kita tampilkan
                        //di <select id=kota>
                        $("#email_sales").html(msg);
                        }
                    }); 
                });

            $('#kode_fund').change(function(){
                var kode_fund = $("#kode_fund").val();
                $.ajax({
                    url  : '<?php echo base_url('logbook/ref_max_redm'); ?>', 
                    type : 'GET', 
                    data : 'kode_fund='+kode_fund,
                    cache: false,
                        success: function(msg){
                        //jika data sukses diambil dari server kita tampilkan
                        //di <select id=kota>
                        $("#max_redm").html(msg);
                        }
                    }); 
                });

            $('#kode_fund_redemption').change(function(){
                var kode_fund_redemption = $("#kode_fund_redemption").val();
                $.ajax({
                    url  : '<?php echo base_url('logbook/ref_max_redm'); ?>', 
                    type : 'GET', 
                    data : 'kode_fund='+kode_fund_redemption,
                    cache: false,
                        success: function(msg){
                        //jika data sukses diambil dari server kita tampilkan
                        //di <select id=kota>
                        $("#max_redm").html(msg);
                        }
                    }); 
                });

            /* Tanpa Rupiah */
            var digit_nominal = document.getElementById('digit-nominal');
            digit_nominal.addEventListener('keyup', function(e)
            {
                digit_nominal.value = formatRupiah(this.value);
            });

            /* Dengan Rupiah */
              var digit_fee = document.getElementById('digit-fee');
              digit_fee.addEventListener('keyup', function(e)
              {
                digit_fee.value = formatRupiah(this.value);
              });

              /* Fungsi */
              function formatRupiah(angka, prefix)
              {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                  split = number_string.split(','),
                  sisa  = split[0].length % 3,
                  rupiah  = split[0].substr(0, sisa),
                  ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
                  
                if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
                }
                
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
              }

                $("#nama_nasabah_baru").hide();
                $("#nama_sales_baru").hide();
                $("#nama_nasabah_lama1").hide();
                $("#nama_sales_lama1").hide();
                $("#sid_lama1").hide();
                $("#nama_nasabah_lama2").hide();
                $("#nama_sales_lama2").hide();
                $("#sid_lama2").hide();
      
              $('#tipe_nasabah').on('change', function() {
                if (this.value == '1')
                {
                    $("#nama_nasabah_lama1").hide();
                    $("#nama_sales_lama1").hide();
                    $("#sid_lama1").hide();
                    $("#nama_nasabah_lama2").hide();
                    $("#nama_sales_lama2").hide();
                    $("#sid_lama2").hide();
                    $("#nama_nasabah_baru").show();
                    $("#nama_sales_baru").show();
                }
                else if (this.value == '2')
                {
                    $("#nama_nasabah_lama1").show();
                    $("#nama_sales_lama1").show();
                    $("#sid_lama1").show();
                    $("#nama_nasabah_lama2").show();
                    $("#nama_sales_lama2").show();
                    $("#sid_lama2").show();
                    $("#nama_nasabah_baru").hide();
                    $("#nama_sales_baru").hide();
                }
                else {
                    $("#nama_nasabah_lama1").hide();
                    $("#nama_sales_lama1").hide();
                    $("#sid_lama1").hide();
                    $("#nama_nasabah_lama2").hide();
                    $("#nama_sales_lama2").hide();
                    $("#sid_lama2").hide();
                    $("#nama_nasabah_baru").hide();
                    $("#nama_sales_baru").hide();
                }
              });
    });
 </script>