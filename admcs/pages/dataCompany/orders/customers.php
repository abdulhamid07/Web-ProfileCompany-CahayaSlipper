        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon icon-list-alt"></i> Data Customers</span>

          <h5></h5>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" style="color:black;">
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Name</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Address</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Email</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Telpon</a></th>
                </tr>
              </thead>
              <tbody>
         <?php
            $no=1;
            $qCust=viewAutoLoad("kustomer","id_kustomer");
            while($r=mysql_fetch_assoc($qCust)){
          ?>

                <tr class="gradeA">
                  <td><?php echo $no++; ?></td> 
                  <td><?php echo ucwords($r['nama_lengkap']) ?></td>
                  <td><?php echo ucfirst($r['alamat']) ?></td>
                  <td><?php echo $r['email'] ?></td>                 
                  <td><?php echo $r['telpon'] ?></td>
                </tr>
          <?php
            }
          ?>
              </tbody>
            </table>
          </div>
        </div>
