<div class="modal hide" id="pendapatan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Laporan Pendapatan</h4>
                </div>
              <div class="modal-body" >
                <form action="actLogoSlider-inputlogo.html" method="POST">
                  <label>Tampilkan :</label>
                    <div  data-date="" class="input-append date datepicker">
                      <input name="awal" type="text" placeholder="Tanggal Awal"  data-date-format="mm-dd-yyyy" class="span2" readonly="" >
                      <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>s/d
                    <div  data-date="" class="input-append date datepicker">
                      <input name="akhir" type="text" placeholder="Tanggal Akhir"  data-date-format="mm-dd-yyyy" class="span2" readonly="">
                      <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="report-pendapatan.html" target="_blank" class="btn btn-success"><i class="icon icon-file"></i> Get PDF</a>
              </div>
              </form>
            </div>
          </div>
        </div>

<div class="modal hide" id="penjualan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Laporan Penjualan Produk</h4>
                </div>
              <div class="modal-body" >
                <form action="actLogoSlider-inputlogo.html" method="POST">
                  <label>Tampilkan :</label>
                   <div  data-date="" class="input-append date datepicker">
                      <input name="from" type="text" placeholder="Tanggal Awal"  data-date-format="mm-dd-yyyy" class="span2" readonly="">
                      <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>s/d
                    <div  data-date="" class="input-append date datepicker">
                      <input name="to" type="text" placeholder="Tanggal Akhir"  data-date-format="mm-dd-yyyy" class="span2" readonly="">
                      <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit"><i class="icon icon-file"></i> Get PDF</button>
              </div>
              </form>
            </div>
          </div>
        </div>
