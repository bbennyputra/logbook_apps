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
                <h4 class="modal-title">Tambah Data Switching</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/tambah_switching')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Form</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_switching" id="kode_switching" value="<?php echo $kode_swtc?>" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal_input" value="<?php echo date('d-m-Y')?>" readonly>
                        </div>
                    </div>
                    <!-- <div class="form-group">
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
                        <label class="col-sm-3 control-label">Nama Fund Redemption</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_fund" style="width: 100%;" name="kode_fund_redemption" id="kode_fund_redemption">
                                <option value=""></option>
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
                    </div> -->
                    <div class="form-group">
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
                            <select class="form-control select2_fund" style="width: 100%;" name="kode_fund_redemption" id="kode_fund_redemption">
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
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Fund Subscription</label>
                        <div class="col-sm-7">
                            <select class="form-control select2_fund" style="width: 100%;" name="kode_fund_subscription" id="kode_fund_subscription">
                                <option value=""></option>
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
                            <select class="form-control" style="width: 100%;" name="nama_fund_redemption" id="nama_fund_redemption">
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_fund_subscription" id="nama_fund_subscription">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nominal Switching</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nominal_switching" id="nominal_switching" placeholder="Nominal Switching" onkeyup="DisableUP()" autocomplete="off">
                        </div>
                        <label class="col-sm-4" name="max_redm" id="max_redm">Min. Saldo : </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">UP Switching</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="up_switching" id="up_switching" placeholder="UP Switching" onkeyup="DisableNominal()" autocomplete="off">
                        </div>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="swtc_all" id="swtc_all" value="all"> Switching All
                            </label>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Rekening Penerima</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="no_rekening_penerima" id="no_rekening_penerima" placeholder="No. Rekening Penerima">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Rekening Penerima</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_bank_rekening_penerima" id="nama_bank_rekening_penerima">
                                <option value=""></option>
                            </select>
                            <input class="form-control" name="nama_bank_rekening_penerima" id="nama_bank_rekening_penerima" placeholder="Bank Rekening Penerima">
                        </div>
                    </div>  -->                 
                    <!-- <div class="form-group ">
                        <label class="col-sm-3 control-label">Numerator</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="numerator" id="numerator" placeholder="Numerator">
                        </div>
                    </div> -->
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">No. Handphone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No. Handphone" autocomplete="off">
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
    if (isset($data_switching)) {
        foreach ($data_switching as $data) {
?>
<div class="modal fade" id="hapus_switching<?php echo $data->kode_switching?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Complain</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/hapus_switching')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-offset-2">
                            <table>
                                <tr>
                                    <td colspan="3"><p><b>Apakah Anda yakin ingin menghapus data ini?</b></p></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="kode_switching" value="<?php echo $data->kode_switching;?>">
                                    <td class="table-padding">Kode  Switching</td>
                                    <td class="table-padding"> : </td>
                                    <td class="table-padding"><?php echo $data->kode_switching?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Nama Nasabah</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_nasabah?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Fund Redemption</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_fund_redemption?></td>
                                </tr>
                                <tr>
                                    <td class="table-padding">Fund Subscription</td> 
                                    <td class="table-padding"> : </td> 
                                    <td class="table-padding"><?php echo $data->nama_fund_subscription?></td>
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
        var nominal_switching = $("#nominal_switching").val();
          if (nominal_switching!='') {
            document.clear();
           $("#up_switching").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#up_switching").prop("disabled", false);
          }
    }

    function DisableNominal(){
        var up_switching = $("#up_switching").val();
          if (up_switching!='') {
            document.clear();
           $("#nominal_switching").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#nominal_switching").prop("disabled", false);
          }
    }

    $('#kode_nasabah').change(function(){
        var kode_nasabah = $("#kode_nasabah").val();
        $.ajax({
            url  : '<?php echo base_url('logbook/data_fund'); ?>', 
            type : 'GET', 
            data : 'kode_nasabah='+kode_nasabah,
            cache: false,
                success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#kode_fund_redemption").html(msg);
                }
            }); 
        });

    $('#kode_fund_redemption').change(function(){
        var kode_fund_redemption = $("#kode_fund_redemption").val();
        $.ajax({
            url  : '<?php echo base_url('logbook/get_nama_fund1'); ?>', 
            type : 'GET', 
            data : 'kode_fund='+kode_fund_redemption,
            cache: false,
                success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#nama_fund_redemption").html(msg);
                }
            }); 
        });

    $('#kode_fund_subscription').change(function(){
        var kode_fund_subscription = $("#kode_fund_subscription").val();
        $.ajax({
            url  : '<?php echo base_url('logbook/get_nama_fund1'); ?>', 
            type : 'GET', 
            data : 'kode_fund='+kode_fund_subscription,
            cache: false,
                success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#nama_fund_subscription").html(msg);
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

    $('#swtc_all').change(function(){
        $("#nominal_switching").prop("disabled", $(this).is(':checked'));
        $("#up_switching").prop("disabled", $(this).is(':checked'));
    });

    var digit_nominal = document.getElementById('nominal_switching');
            digit_nominal.addEventListener('keyup', function(e)
            {
                digit_nominal.value = formatRupiah(this.value);
            });

            /* Dengan Rupiah */
    var digit_up = document.getElementById('up_switching');
        digit_up.addEventListener('keyup', function(e)
        {
            digit_up.value = formatRupiah(this.value);
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