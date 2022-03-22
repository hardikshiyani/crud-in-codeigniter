<html>

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

    <center><br><br>

        <table border="1" id="datatable">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $id = 1;
                foreach ($data as $row) {
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->email ?></td>
                        <td><?php echo $row->mobile ?></td>
                        <td><img src="<?php echo base_url('asset/uploads/' . $row->image); ?>" width="100" height="100" />
                        <td><a href='<?php echo base_url('edit/' . $row->id) ?>'>Update</a></td>
                        <td><a href="<?php echo base_url('delete/' . $row->id) ?> " onClick="return confirm('Are you sure want to delete ??')">Delete</a></td>
                    </tr>
                <?php
                    $id++;
                }
                ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>

        <body>

    </center>

</body>
</table>
</body>

</html>