<table class="table table-sm table-striped" id="datasiswa">
    <thead>
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Tempat Lahir</td>
            <td>Tanggal Lahir</td>
            <td>Jenis Kelamin</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php foreach($siswa as $sw): ?>
        <tr>
            <td><?= $nomor++; ?></td>
            <td><?= $sw['NIS']; ?></td>
            <td><?= $sw['Nama']; ?></td>
            <td><?= $sw['Tem_Lahir']; ?></td>
            <td><?= $sw['Tgl_Lahir']; ?></td>
            <td><?= $sw['Jns_Kelamin']; ?></td>
            <td>Detail</td>
        </tr> 
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#datasiswa').DataTable();
    });
</script>