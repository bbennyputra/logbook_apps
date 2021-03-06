<?php  $stat=$this->session->userdata('level_id'); ?>
<style type="text/css">
    .table-padding{
        padding-left: 10px;
    }
</style>

<div class="modal fade" id="tambah_redemption" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Pembukaan Rekening Institusi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/tambah_pembukaan_rekening_institusi')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Form</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_pembukaan_rekening_institusi" id="kode_pembukaan_rekening_institusi" value="<?php echo $kode_pembukaan_rekening_institusi?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal_input" value="<?php echo date('d-m-Y')?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" placeholder="Nama Nasabah" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. NPWP</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_npwp" id="no_npwp" placeholder="No. NPWP" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="nama_sales" id="nama_sales" placeholder="Nama Sales">
                        </div>
                    </div> -->
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_sales">
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
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Klasifikasi Resiko</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="kalasifikasi_resiko">
                                <option value="">Pilih Klasifikasi Resiko</option>
                                    <?php
                                        if (isset($ref_klasifikasi_resiko)){
                                        foreach ($ref_klasifikasi_resiko as $data){
                                    ?>
                                <option value="<?php echo $data->nama_klasifikasi?>"><?php echo $data->nama_klasifikasi?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Checklist</label>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_form_pembukaan_rekening" value="1"> Form Pembukaan Rekening
                            </label>
                        </div>
                        <div class="col-sm-2 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_npwp" value="1"> NPWP
                            </label>
                        </div>
                        <div class="col-sm-2 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_ktp_pengurus" value="1"> KTP Pengurus
                            </label>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_siup" value="1"> SIUP
                            </label>
                        </div>
                        <div class="col-sm-2 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_adart" value="1"> AD/ART
                            </label>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_skd" value="1"> SKD
                            </label>
                        </div>
                        <div class="col-sm-2 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_specimen" value="1"> SPECIMEN
                            </label>
                        </div>
                    </div>
                    <!-- <div class="form-group ">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_ktp_pengurus" value="1"> KTP Pengurus
                            </label>
                        </div>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_rekening_redemption" value="1"> Dokumen POJK
                            </label>
                        </div>
                    </div> -->
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Dokumen POJK</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="checklist_rekening_redemption" id="kelengkapan_pojk">
                                <option value="" style="opacity: 50%;">--- Kelengkapan Dokumen POJK ---</option>
                                <option value="1">Lengkap</option>
                                <option value="2">Tidak Lengkap</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-7 control-label">
                            <textarea class="form-control" rows="3" name="minus_dokumen_pojk" placeholder="Dokumen yang belum dilengkapi" id="desc_pojk_edit" disabled></textarea>
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
    if ($stat==6) {
        $disabled = 'disabled="disabled"';
    }
    else {
        $disabled = '';
    }

    if (isset($data_pembukaan_rekening_institusi)) {
        foreach ($data_pembukaan_rekening_institusi as $data) {
?>
<div class="modal fade" id="edit_pembukaan_rekening_institusi<?php echo $data->kode_pembukaan_rekening_institusi?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Pembukaan Rekening Institusi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/edit_pembukaan_rekening_institusi')?>" method="post">
                <div class="modal-body">
                    <!-- <input type="hidden" class="form-control" name="no_pelaporan" value="<?php echo $data->no_pelaporan ?>"> -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. Pelaporan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_pembukaan_rekening_institusi" value="<?php echo $data->kode_pembukaan_rekening_institusi ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal_input" value="<?php echo $data->tanggal_input?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" value="<?php echo $data->nama_nasabah?>" autocomplete="off" <?php echo $disabled ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. NPWP</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_npwp" id="no_npwp" value="<?php echo $data->no_npwp?>" autocomplete="off" <?php echo $disabled ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="email" id="email" value="<?php echo $data->email?>" autocomplete="off" <?php echo $disabled ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_sales" id="nama_sales" <?php echo $disabled ?>>
                                <?php
                                    foreach ($ref_sales as $data_sales){
                                        $selected=($data->nama_sales == $data_sales->nama_sales)?"selected":"";
                                        echo "<option value='$data_sales->nama_sales' $selected>$data_sales->nama_sales</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Klasifikasi Resiko</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="kalasifikasi_resiko" id="kalasifikasi_resiko">
                                <?php                                        
                                    if ($data->kalasifikasi_resiko!='') {
                                        foreach ($ref_klasifikasi_resiko as $data_klasifikasi_resiko){
                                            $selected=($data->kalasifikasi_resiko == $data_klasifikasi_resiko->nama_klasifikasi)?"selected":"";
                                                echo "<option value='$data_klasifikasi_resiko->nama_klasifikasi' $selected>$data_klasifikasi_resiko->nama_klasifikasi</option>";
                                        }
                                    }
                                    else {
                                        echo "<option value=''>Pilih Klasifikasi Resiko</option>";
                                        foreach ($ref_klasifikasi_resiko as $data_klasifikasi_resiko){
                                            $selected=($data->kalasifikasi_resiko == $data_klasifikasi_resiko->nama_klasifikasi)?"selected":"";
                                                echo "<option value='$data_klasifikasi_resiko->nama_klasifikasi' $selected>$data_klasifikasi_resiko->nama_klasifikasi</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="nama_sales" id="nama_sales" value="<?php echo $data->nama_sales?>">
                        </div>
                    </div> -->
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Checklist</label>
                        <?php
                            if ($data->checklist_form_pembukaan_rekening==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_form_pembukaan_rekening" value="1" checked="checked"> Form Pembukaan rekening
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_form_pembukaan_rekening" value="1"> Form Pembukaan rekening
                            </label>
                        </div>
                        <?php }
                            if ($data->checklist_npwp==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_npwp" value="1" checked="checked"> NPWP
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_npwp" value="1"> NPWP
                            </label>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label"></label>
                        <?php
                            if ($data->checklist_siup==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_siup" value="1" checked="checked"> SIUP
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_siup" value="1"> SIUP
                            </label>
                        </div>
                        <?php }
                            if ($data->checklist_adart==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_adart" value="1" checked="checked"> AD/ART
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_adart" value="1"> AD/ART
                            </label>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label"></label>
                        <?php
                            if ($data->checklist_skd==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_skd" value="1" checked="checked"> SKD
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_skd" value="1"> SKD
                            </label>
                        </div>
                        <?php }
                            if ($data->checklist_specimen==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_specimen" value="1" checked="checked"> Specimen
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_specimen" value="1"> Specimen
                            </label>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label"></label>
                        <?php
                            if ($data->checklist_ktp_pengurus==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_ktp_pengurus" value="1" checked="checked"> KTP Pengurus
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_ktp_pengurus" value="1"> KTP Pengurus
                            </label>
                        </div>
                        <?php }
                            if ($data->checklist_rekening_redemption==1) {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_rekening_redemption" value="1" checked="checked"> Dokumen POJK
                            </label>
                        </div>
                        <?php }
                            else {
                        ?>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="checklist_rekening_redemption" value="1"> Dokumen POJK
                            </label>
                        </div>
                        <?php } ?>
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
    if (isset($data_pembukaan_rekening_institusi)) {
        foreach ($data_pembukaan_rekening_institusi as $data) {
?>
<div class="modal fade" id="hapus_pembukaan_rekening_institusi<?php echo $data->kode_pembukaan_rekening_institusi?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Pembukaan Rekening Institusi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/hapus_pembukaan_rekening_institusi')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-offset-2">
                            <table>
                                <tr>
                                    <td colspan="3"><p><b>Apakah Anda yakin ingin menghapus data ini?</b></p></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="kode_pembukaan_rekening_institusi" value="<?php echo $data->kode_pembukaan_rekening_institusi;?>">
                                    <td class="table-padding">Kode Pembukaan Rekening</td>
                                    <td class="table-padding"> : </td>
                                    <td class="table-padding"><?php echo $data->kode_pembukaan_rekening_institusi?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Nama Nasabah</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_nasabah?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Nama Sales</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_sales?></td>
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
    // function set_to(gabungan)
    //   {
    //     var pecah = gabungan.split('-');
    //     var kode_nasabah2 = pecah[0];
    //     var sid = pecah[1];
    //     var nama_nasabah = pecah[2];
    //     var nama_sales = pecah[3];
    //     $('#kode_nasabah2').val(kode_nasabah2);
    //     $('#kode_nasabah').val(kode_nasabah2);
    //     $('#sid').val(sid);
    //     $('#nama_nasabah').val(nama_nasabah);
    //     $('#nama_sales').val(nama_sales);

    //     // $('#kode_nasabah').change(function(){
    //     //         var kode_nasabah = $("#kode_nasabah").val();
    //     //         $.ajax({
    //     //             url  : '<?php echo base_url('pelaporan/data_fund'); ?>', 
    //     //             type : 'GET', 
    //     //             data : 'kode_nasabah='+kode_nasabah,
    //     //             cache: false,
    //     //                 success: function(msg){
    //     //                 //jika data sukses diambil dari server kita tampilkan
    //     //                 //di <select id=kota>
    //     //                 $("#nama_fund").html(msg);
    //     //                 }
    //     //             }); 
    //     //         });
    //   }
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

    // function EnableText(){
    //   var x = document.getElementById("#nominal_redemption");
    //   if (x !="1" ) {
    //         document.getElementById("#up_redemption").disabled;
    //   }
    //   else {
    //         document.getElementById("#up_redemption").enabled;
    //   }
    // }
    $('#kelengkapan_pojk').on('change', function() {
        if (this.value == '1')
        {   
            $("#desc_pojk_edit").prop("disabled", true);
            document.clear();
        }
        else if (this.value == '2')
        {   
            $("#desc_pojk_edit").prop("disabled", false);
        }
      });
    
    function DisableUP(){
        var nominal_redemption = $("#nominal_redemption").val();
          if (nominal_redemption!='') {
            document.clear();
           $("#up_redemption").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#up_redemption").prop("disabled", false);
          }
    }

    function DisableNominal(){
        var up_redemption = $("#up_redemption").val();
          if (up_redemption!='') {
            document.clear();
           $("#nominal_redemption").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#nominal_redemption").prop("disabled", false);
          }
    }

    // var htmlobjek;
    //     $(document).ready(function(){
    //         $('#kode_nasabah').change(function(){
    //             var kode_nasabah = $("#kode_nasabah").val();
    //             $.ajax({
    //                 url  : '<?php echo base_url('pelaporan/data_fund'); ?>', 
    //                 type : 'GET', 
    //                 data : 'kode_nasabah='+kode_nasabah,
    //                 cache: false,
    //                     success: function(msg){
    //                     //jika data sukses diambil dari server kita tampilkan
    //                     //di <select id=kota>
    //                     $("#nama_fund").html(msg);
    //                     }
    //                 }); 
    //             });

    //         $('#kode_nasabah').change(function(){
    //             var kode_nasabah = $("#kode_nasabah").val();
    //             $.ajax({
    //                 url  : '<?php echo base_url('pelaporan/data_sid'); ?>', 
    //                 type : 'GET', 
    //                 data : 'kode_nasabah='+kode_nasabah,
    //                 cache: false,
    //                     success: function(msg){
    //                     //jika data sukses diambil dari server kita tampilkan
    //                     //di <select id=kota>
    //                     $("#sid").html(msg);
    //                     $("#sid2").html(msg);
    //                     // $("#nama_sales").html(msg);
    //                     }
    //                 }); 
    //             });

    //         $('#kode_nasabah').change(function(){
    //             var kode_nasabah = $("#kode_nasabah").val();
    //             $.ajax({
    //                 url  : '<?php echo base_url('pelaporan/data_sales'); ?>', 
    //                 type : 'GET', 
    //                 data : 'kode_nasabah='+kode_nasabah,
    //                 cache: false,
    //                     success: function(msg){
    //                     //jika data sukses diambil dari server kita tampilkan
    //                     //di <select id=kota>
    //                     $("#nama_sales").html(msg);
    //                     $("#nama_sales2").html(msg);
    //                     }
    //                 }); 
    //             });
    //         });

    //         $('#kode_nasabah').change(function(){
    //             var kode_nasabah = $("#kode_nasabah").val();
    //             $.ajax({
    //                 url  : '<?php echo base_url('pelaporan/get_nama_nasabah'); ?>', 
    //                 type : 'GET', 
    //                 data : 'kode_nasabah='+kode_nasabah,
    //                 cache: false,
    //                     success: function(msg){
    //                     //jika data sukses diambil dari server kita tampilkan
    //                     //di <select id=kota>
    //                     $("#nama_nasabah").html(msg);
    //                     }
    //                 }); 
    //             });



 </script>