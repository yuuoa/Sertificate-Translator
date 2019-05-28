<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Data Mahasiswa</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>NO</td>
                                    <td>NIM</td>
                                    <td>NAMA</td>
                                    <td>JURUSAN</td>
                                    <td align="center">AKSI</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;;
                                foreach ($mahasiswa as $m) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $m->nim; ?></td>
                                        <td><?= $m->nama; ?></td>
                                        <td><?= $m->nama_jurusan; ?></td>
                                        <?php
                                        if ($m->status == 1) {
                                            echo '<td align="center"><a href="'.base_url("admin/setRequest/").$m->nim.'" class="btn btn-success">terima</a></td>';
                                        } else if ($m->status == 2) {
                                            echo '<td align="center"><a href="" class="btn btn-secondary" disabled>telah diterima</a></td>';
                                        }
                                        ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->