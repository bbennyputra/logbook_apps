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
                <h4 class="modal-title">Tambah Data Redemption</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/tambah_redemption')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Redemption</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_redemption" id="kode_redemption" value="<?php echo $kode_redm; ?>" readonly>
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
                            <select class="form-control select2_nasabah_redm" style="width: 100%;" id="kode_nasabah" name="kode_nasabah">
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
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_nasabah" id="nama_nasabah">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">SID</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="sid_nasabah" id="sid">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">SID</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" id="sid2" disabled="disabled">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_sales" id="nama_sales">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" id="nama_sales2" disabled="disabled">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="client_id" id="client_id">
                                <!-- <option value="">Pilih Media</option>
                                    <?php
                                        if (isset($ref_data_fund)){
                                        foreach ($ref_data_fund as $data){
                                    ?>
                                <option value="<?php echo $data->kode_fund?>"><?php echo $data->nama_fund?></option>
                                    <?php
                                        }
                                    }
                                    ?> -->
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
                        <label class="col-sm-3 control-label">Market Value</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="market_value" id="market_value">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nominal Redemption</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nominal_redemption" id="nominal_redemption" placeholder="Nominal Redemption" onkeyup="DisableUP()">
                        </div>
                        <label class="col-sm-4" name="max_redm" id="max_redm">Min. Saldo : </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">UP Redemption</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="up_redemption" id="up_redemption" placeholder="UP Redemption" onkeyup="DisableNominal()">
                        </div>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="redm_all" id="redm_all" value="all"> Redm All
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rekening Penerima</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="no_rekening_penerima" id="no_rekening_penerima" placeholder="No. Rekening Penerima">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Rekening Penerima</label>
                        <div class="col-sm-7">
                            <!-- <select class="form-control" style="width: 100%;" name="nama_bank_rekening_penerima" id="nama_bank_rekening_penerima">
                                <option value=""></option>
                            </select> -->
                            <input class="form-control" name="nama_bank_rekening_penerima" id="nama_bank_rekening_penerima" placeholder="Bank Rekening Penerima">
                        </div>
                    </div>                  
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Numerator</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="numerator" id="numerator" placeholder="Numerator">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">No. Handphone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No. Handphone">
                        </div>
                    </div>
                    <div class="form-group ">
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
                                <input type="checkbox" name="ttd_sales" value="1"> Timestamp
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan & Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($data_complain)) {
        foreach ($data_complain as $data) {
?>
<div class="modal fade" id="edit_complain<?php echo $data->no_pelaporan?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Complain</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('pelaporan/edit_complain')?>" method="post">
                <div class="modal-body">
                    <!-- <input type="hidden" class="form-control" name="no_pelaporan" value="<?php echo $data->no_pelaporan ?>"> -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. Pelaporan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_pelaporan" value="<?php echo $data->no_pelaporan ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" value="<?php echo $data->tanggal_pelaporan ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">PIC Marketing</label>
                        <div class="col-sm-7">
                            <select class="form-control select2" name="pic_mkt" style="width: 100%;">
                                <?php
                                    foreach ($ref_pic_mkt as $pic_mkt){
                                        $selected=($data->pic_mkt == $pic_mkt->kode_pic_mkt)?"selected":"";
                                        echo "<option value='$pic_mkt->kode_pic_mkt' $selected>$pic_mkt->nama_pic_mkt</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Nasabah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_nasabah" id="kode_nasabah" placeholder="Kode Nasabah">
                        </div>
                    </div> -->
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">SID</label>
                        <div class="col-sm-7">
                            <select class="form-control select2" style="width: 100%;" disabled="">
                                <?php
                                    foreach ($ref_data_nasabah as $data_nasabah){
                                        $selected=($data->kode_nasabah == $data_nasabah->kode_nasabah)?"selected":"";
                                        echo "<option value='$data_nasabah->kode_nasabah' $selected>$data_nasabah->kode_nasabah</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Nasabah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_nasabah" value="<?php echo $data->nama_nasabah ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">SID</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="sid" value="<?php echo $data->sid_nasabah ?>" readonly>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Fund</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_fund" id="kode_fund" value="<?php echo $data->kode_fund ?>" readonly>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Sales</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_sales" id="nama_sales" value="<?php echo $data->nama_sales ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_fund" id="nama_fund" value="<?php echo $data->nama_fund ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Media Pelaporan</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_media" style="width: 100%;" name="media_pelaporan" id="media_pelaporan">
                                <?php
                                    foreach ($ref_media_pelaporan as $media){
                                        $selected=($data->media_pelaporan == $media->kode_media_pelaporan)?"selected":"";
                                        echo "<option value='$media->kode_media_pelaporan' $selected>$media->nama_media_pelaporan</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Pelaporan</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_jenis" style="width: 100%;" name="jenis_pelaporan" id="jenis_pelaporan">
                                <?php
                                    foreach ($ref_jenis_pelaporan as $jenis){
                                        $selected=($data->jenis_pelaporan == $jenis->kode_jenis_pelaporan)?"selected":"";
                                        echo "<option value='$jenis->kode_jenis_pelaporan' $selected>$jenis->nama_jenis_pelaporan</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Uraian Jenis</label>
                        <div class="col-sm-7">
                          <textarea class="textarea" name="uraian_jenis" style="width: 100%; height: 90px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data->uraian_jenis ?></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Fungsi Terkait</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_fungsi" style="width: 100%;" name="fungsi_terkait" id="fungsi_terkait" onchange="javascript:set_to1(this.value);" readonly>
                               <?php
                                    foreach ($ref_fungsi_terkait as $fungsi){
                                        $selected=($data->fungsi_terkait == $fungsi->kode_fungsi_terkait)?"selected":"";
                                        echo "<option value='$fungsi->kode_fungsi_terkait' $selected>$fungsi->nama_fungsi_terkait</option>";
                                    }
                                ?>                                    
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Fungsi Terkait</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="fungsi_terkait" id="fungsi_terkait" value="<?php echo $data->fungsi_terkait ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fungsi Terkait</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="fungsi_terkait" value="<?php echo $data->nama_fungsi_terkait ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">PIC Fungsi Terkait</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="pic_fungsi_terkait" id="pic_fungsi_terkait" value="<?php echo $data->pic_fungsi_terkait ?>" readonly>
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
        }
    }
?>

<?php
    if (isset($data_complain)) {
        foreach ($data_complain as $data) {
?>
<div class="modal fade" id="hapus_complain<?php echo $data->no_pelaporan?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Complain</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('pelaporan/hapus_complain')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-offset-2">
                            <table>
                                <tr>
                                    <td colspan="3"><p><b>Apakah Anda yakin ingin menghapus data ini?</b></p></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="no_pelaporan" value="<?php echo $data->no_pelaporan;?>">
                                    <td class="table-padding">No. pelaporan</td>
                                    <td class="table-padding"> : </td>
                                    <td class="table-padding"><?php echo $data->no_pelaporan?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Nama Nasabah</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_nasabah?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Jenis Pelaporan</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_jenis_pelaporan?></td>
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