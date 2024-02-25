<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Log Aktivitas</h6>
               </div>
               <div class="card-body">
                  <table id="datatables" class="table table-striped" width="100%">
                     <thead>
                         <tr>
                           <th style="color: black;" class="text-center">No</th>
                           <th style="color: black;" class="text-center">Pengguna</th>
                           <th style="color: black;" class="text-center">Log Tipe</th>
                           <th style="color: black;" class="text-center">Aktivitas</th>
                           <th style="color: black;" class="text-center">Waktu</th>
                        </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1; 
                            foreach($log as $main) : ?>
                       <tr>
                          <td width="5%" class="text-center"><?= $no++; ?></td>
                          <td><?= $main['log_user']; ?></td>
                          <td class="text-center"><?= $main['log_tipe']; ?></td>
                          <td><?= $main['log_desc']; ?></td>
                          <td class="text-center"><?= $main['log_time']; ?></td>
                       </tr>
                       <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
          </div>
      </div>
   </div>
   <div class="hidden-lg mg-b-100"></div>
</div>