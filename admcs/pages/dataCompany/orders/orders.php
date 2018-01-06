        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon icon-list-alt"></i> Data Orders</span>

          <h5></h5>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" style="color:black;">
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No Order</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Name</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Date</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Time</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Status</a></th>
                  <th width="7%">Action</th>
                </tr>
              </thead>
              <tbody>
         <?php
            $qorder=mysql_query("select *, k.nama_lengkap from orders o join kustomer k on k.id_kustomer=o.id_kustomer");
            while($r=mysql_fetch_assoc($qorder)){
            $tglIndo=tgl_indo($r['tgl_order']);
          ?>

                <tr class="gradeA">
                  <td><?php echo $r['id_orders']; ?></td> 
                  <td><?php echo ucwords($r['nama_lengkap']) ?></td>
                  <td><?php echo $tglIndo ?></td>
                  <td><?php echo $r['jam_order'] ?></td>                 
                  <td><?php echo $r['status_order'] ?></td>
                  <td><center><a href="actOrders-<?php echo $r['id_orders'] ?>.html" class="btn btn-mini btn-success tip-bottom" title="Detail Order"><i class="icon icon-eye-open"></i></a></center></td>

                </tr>
          <?php
            }
          ?>
              </tbody>
            </table>
          </div>
        </div>
