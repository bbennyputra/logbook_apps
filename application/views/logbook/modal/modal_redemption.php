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
                        <label class="col-sm-3 control-label">Kode Form</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_redemption" id="kode_redemption" value="<?php echo $kode_redm ?>" autocomplete="off" readonly>
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
                            <select class="form-control select2_fund" style="width: 100%;" name="kode_fund" id="kode_fund">
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
                        <label class="col-sm-3 control-label">Nominal Redemption</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nominal_redemption" id="nominal_redemption" placeholder="Nominal Redemption" onkeyup="DisableUP()" autocomplete="off">
                        </div>
                        <label class="col-sm-4" name="max_redm" id="max_redm">Min. Saldo : </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">UP Redemption</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="up_redemption" id="" placeholder="UP Redemption" onkeyup="DisableNominal()" autocomplete="off">
                        </div>
                        <div class="col-sm-3 checkbox">
                            <label>
                                <input type="checkbox" name="redm_all" id="redm_all" value="all"> Redm All
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Redemption Fee</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="redemption_fee" id="redemption_fee" placeholder="Redemption Fee" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rekening Penerima</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="no_rekening_penerima" id="no_rekening_penerima" onclick="DisableNoRekening()">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Bank Penerima</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_bank_rekening_penerima" id="nama_bank_rekening_penerima">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rekening Lain</label>
                        <div class="col-sm-3">
                            <input class="form-control" name="no_rekening_penerima1" id="no_rekening_penerima1" placeholder="No. Rekening Lain" onkeyup="DisableNoRekening1()" autocomplete="off">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" name="nama_bank_rekening_penerima1" id="nama_bank_rekening_penerima1" placeholder="Nama Bank Rekening Lain" autocomplete="off">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Bank</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="nama_bank_rekening_penerima1" id="nama_bank_rekening_penerima1" placeholder="No. Rekening Penerima">
                        </div>
                    </div> -->
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Rekening Penerima</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_bank_rekening_penerima" id="nama_bank_rekening_penerima">
                                <option value=""></option>
                            </select>
                            <input class="form-control" name="nama_bank_rekening_penerima" id="nama_bank_rekening_penerima" placeholder="Bank Rekening Penerima">
                        </div>
                    </div>  -->       
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Date</label>
                        <div class="col-sm-7">
                            <div class="input-group form-date">
                                <input type="text" class="form-control" name="payment_date" id="datetimepicker1" placeholder="Payment Date">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>          
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
                                <input type="checkbox" name="ttd_sales" value="1"> Timestamp
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
    if (isset($data_redemption)) {
        foreach ($data_redemption as $data) {
?>
<div class="modal fade" id="edit_redemption<?php echo $data->kode_redemption?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Complain</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/edit_redemption')?>" method="post">
                <div class="modal-body">
                    <!-- <input type="hidden" class="form-control" name="no_pelaporan" value="<?php echo $data->no_pelaporan ?>"> -->
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
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="kode_fund" id="kode_fund1">
                                <?php
                                    foreach ($ref_data_fund as $data_fund){
                                        $selected=($data->kode_fund == $data_fund->kode_fund)?"selected":"";
                                        echo "<option value='$data_fund->kode_fund' $selected>$data_fund->nama_fund</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Nama Fund</label>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 100%;" name="nama_fund" id="nama_fund1">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nominal Redemption</label>
                        <div class="col-sm-4">
                        <?php 
                            if ($data->nominal_redemption!='') {
                        ?>
                            <input type="text" class="form-control" name="nominal_redemption" id="nominal_redemption1" placeholder="Nominal Redemption" onkeyup="DisableUP1()" value="<?php echo $data->nominal_redemption ; ?>">
                        <?php }
                            else
                                {
                        ?>
                            <input type="text" class="form-control" name="nominal_redemption" id="nominal_redemption1" placeholder="Nominal Redemption" onkeyup="DisableUP1()" value="<?php echo $data->nominal_redemption ; ?>" disabled>
                        <?php }
                        ?>
                        </div>
                        <label class="col-sm-4" name="max_redm" id="max_redm">Min. Saldo : </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">UP Redemption</label>
                        <div class="col-sm-4">
                        <?php 
                            if ($data->up_redemption!='') {
                        ?>
                            <input type="text" class="form-control" name="up_redemption" id="up_redemption1" placeholder="UP Redemption" onkeyup="DisableNominal1()" value="<?php echo $data->up_redemption ; ?>">
                        <?php } 
                            else 
                            {
                        ?>
                            <input type="text" class="form-control" name="up_redemption" id="up_redemption1" placeholder="UP Redemption" onkeyup="DisableNominal1()" value="<?php echo $data->up_redemption ; ?>" disabled>
                        <?php }
                        ?>
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
        }
    }
?>

<?php
    if (isset($data_redemption)) {
        foreach ($data_redemption as $data) {
?>
<div class="modal fade" id="hapus_redemption<?php echo $data->kode_redemption?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data Redemption</h4>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('logbook/hapus_redemption')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-offset-2">
                            <table>
                                <tr>
                                    <td colspan="3"><p><b>Apakah Anda yakin ingin menghapus data ini?</b></p></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="kode_redemption" value="<?php echo $data->kode_redemption;?>">
                                    <td class="table-padding">Kode Redemption</td>
                                    <td class="table-padding"> : </td>
                                    <td class="table-padding"><?php echo $data->kode_redemption?></td>
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
           $("#up_redemption").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#up_redemption").prop("disabled", false);
          }
    }

    function DisableUP1(){
        var nominal_redemption = $("#nominal_redemption1").val();
          if (nominal_redemption!='') {
           $("#up_redemption1").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#up_redemption1").prop("disabled", false);
          }
    }

    function DisableNominal(){
        var up_redemption = $("#up_redemption").val();
          if (up_redemption!='') {
           $("#nominal_redemption").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#nominal_redemption").prop("disabled", false);
          }
    }

    function DisableNominal1(){
        var up_redemption = $("#up_redemption1").val();
          if (up_redemption!='') {
           $("#nominal_redemption1").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#nominal_redemption1").prop("disabled", false);
          }
    }

    function DisableNoRekening(){
        var no_rekening_penerima = $("#no_rekening_penerima").val();
          if (no_rekening_penerima!='') {
           $("#no_rekening_penerima1").prop("disabled", true);
           $("#nama_bank_rekening_penerima1").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#no_rekening_penerima1").prop("disabled", false);
           $("#nama_bank_rekening_penerima1").prop("disabled", false);
          }
    }

    function DisableNoRekening1(){
        var no_rekening_penerima1 = $("#no_rekening_penerima1").val();
          if (no_rekening_penerima1!='') {
           $("#no_rekening_penerima").prop("disabled", true);
           $("#nama_bank_rekening_penerima").prop("disabled", true);
           // $("#up_redemption").clear();
           // document.getElementById('up_redemption').disabled='disabled';    
          }
          else {
            // document.getElementById("#up_redemption").disabled = false;
           $("#no_rekening_penerima").prop("disabled", false);
           $("#nama_bank_rekening_penerima").prop("disabled", false);
          }
    }

    $(document).ready(function(){
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
                url  : '<?php echo base_url('logbook/data_fund'); ?>', 
                type : 'GET', 
                data : 'kode_nasabah='+kode_nasabah,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#kode_fund").html(msg);
                    }
                }); 
            });

        $('#kode_nasabah').change(function(){
            var kode_nasabah = $("#kode_nasabah").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/get_rekening_nasabah'); ?>', 
                type : 'GET', 
                data : 'kode_nasabah='+kode_nasabah,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#no_rekening_penerima").html(msg);
                    }
                }); 
            });

        $('#kode_nasabah').change(function(){
            var kode_nasabah = $("#kode_nasabah").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/get_nama_bank_by_rekenig'); ?>', 
                type : 'GET', 
                data : 'kode_nasabah='+kode_nasabah,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#nama_bank_rekening_penerima").html(msg);
                    }
                }); 
            });

        $('#kode_fund1').change(function(){
            var kode_fund = $("#kode_fund1").val();
            $.ajax({
                url  : '<?php echo base_url('logbook/get_nama_fund1'); ?>', 
                type : 'GET', 
                data : 'kode_fund='+kode_fund,
                cache: false,
                    success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#nama_fund1").html(msg);
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

        $('#redm_all').change(function(){
            $("#nominal_redemption").prop("disabled", $(this).is(':checked'));
            $("#up_redemption").prop("disabled", $(this).is(':checked'));
        });

        $('#datetimepicker1').datetimepicker({
          format: 'DD-MM-Y',
          // sideBySide: true,
          minDate:moment(),
        });

        var digit_nominal = document.getElementById('nominal_redemption');
            digit_nominal.addEventListener('keyup', function(e)
            {
                digit_nominal.value = formatRupiah(this.value);
            });

            /* Dengan Rupiah */
        // var digit_up = document.getElementById('up_redemption');
        //     digit_up.addEventListener('keyup', function(e)
        //     {
        //         digit_up.value = formatRupiah(this.value);
        //     });

        // var digit_fee = document.getElementById('redemption_fee');
        //     digit_fee.addEventListener('keyup', function(e)
        //     {
        //         digit_fee.value = formatRupiah(this.value);
        //     });   

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
    });
    
 </script>