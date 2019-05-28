<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">

    <div class="col-md-8">
      <div class="card ">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Profil Mahasiswa</h6>
         </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <div class="row">
              <div class="col-md-4">
                <div>
                  <h4 class="text-primary font-weight-bold">NIM</h4>
                </div>
                <div class="mt-3">
                  <?= $mahasiswa->nim; ?>
                </div>
                <div class="mt-3">
                  <h4 class="text-primary font-weight-bold">Nama</h4>
                </div>
                <div>
                  <?= $mahasiswa->nama; ?>
                </div>
                <div class="mt-3">
                  <h4 class="text-primary font-weight-bold">Jurusan</h4>
                </div>
                <div>
                  <?= $mahasiswa->nama_jurusan; ?>
                </div>
                </div>
              <div class="col-md-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Status Permohonan Penerjemahan</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div>
            <?php
            if ($mahasiswa->status == 0) $sstatus = "Belum Request";
            else if ($mahasiswa->status == 1) $sstatus = "Menunggu Konfirmasi";
            if ($mahasiswa->status == 2) $sstatus = "Telah Dikonfirmasi";
            ?>
            <h5 class="font-weight-bold text-center"><?= $sstatus ?></h5>
          </div>
        </div>
        <div class="card-footer">
          <?php
          if ($mahasiswa->status == 0) {
            echo '<a class="btn btn-secondary form-control text-white" href="'.base_url("user/request/$nim").'">Request</a>';
          } else if ($mahasiswa->status == 1) {
            echo '<a class="btn btn-warning form-control disabled">Pending</a>';
          } else if ($mahasiswa->status == 2) {
            echo '<a class="btn btn-primary form-control text-white" href="'.base_url("user/cetak").'">Print</a>';
          }
          ?>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->