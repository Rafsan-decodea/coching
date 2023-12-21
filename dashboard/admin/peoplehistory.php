<?php include '../extra/nav.php'?>

<?php
if ($_SESSION["uid"] == 0) {
    // ini_set('display_errors', 1);
    ?>
<br><br>
<button class="btn btn-success" onclick="generatePDF()">report PDF</button>
<table id="pdf-content" class="table  table-bordered table-responsive">
    <thead>
        <tr id="lazyTable">
            <th scope="col">Count</th>
            <th scope="col">picture</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Father Name</th>
            <th scope="col">gender</th>
            <th scope="col">Present Address</th>
            <th scope="col">Parmanent Address</th>
        </tr>
        <?php

    $id = $_SESSION["id"];
    $sql = "select * from users_data ";
    $result = $db->query($sql);
    ?>
    </thead>
    <tbody id="tableBody">
        <?php while ($row = $result->fetch_assoc()) {?>
        <tr>
            <th scope="row"><?php echo $number += 1; ?></th>
            <td><img height="80" width="80" src="/dashboard/images/<?php echo $row["picture"] ?>" alt="Profile 1"
                    class="rounded-profile"></td>
            <td><?php $id = $row["uid"];
        $data = $db->query("select name from users where id = $id ");while ($row1 = $data->fetch_assoc()) {echo $row1["name"];}
        $data->free();?>
            </td>
            <td><?php $id = $row["uid"];
        $data = $db->query("select phone from users where id = $id ");while ($row1 = $data->fetch_assoc()) {echo $row1["phone"];}
        $data->free();?>
            </td>
            <td><?php echo $row["fathername"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["presentaddress"] ?></td>
            <td><?php echo $row["parmanentaddress"] ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<script>
const table = document.getElementById('lazyTable');
const tableBody = document.getElementById('tableBody');
let currentPage = 1; // Track the current page of data
const itemsPerPage = 5; // Number of items to load per page

// Function to load more data when the user scrolls
function loadMoreData() {
    if (table.clientHeight + table.scrollTop >= table.scrollHeight) {
        // User has scrolled to the bottom, load more data
        $.ajax({
            url: `peoplehistory.php`, // Replace with your data source URL
            method: 'GET',
            success: function(data) {
                // Append the loaded data to the table
                tableBody.innerHTML += data;
                currentPage++;
            },
        });
    }
}

// Attach the loadMoreData function to the table's scroll event
table.addEventListener('scroll', loadMoreData);

// Initial data load
loadMoreData();
</script>



<script>
function generatePDF() {
    const pdf = new jsPDF({
        orientation: 'landscape',
        unit: 'mm',
        format: 'a4',
    });



    pdf.autoTable({
        html: '#pdf-content',
        didDrawCell: function(data) {
            if (data.column.index === 1) { // Assuming the image column is the second column (index 1)
                const cell = data.cell;
                const imgData = () => {
                    const table = document.getElementById('pdf-content');
                    const rows = table.querySelectorAll('tr');

                    for (let i = 1; i < rows.length; i++) {
                        const row = rows[i];
                        const img = row.querySelector('img');
                        if (img) {
                            const canvas = document.createElement('canvas');
                            const context = canvas.getContext('2d');
                            canvas.width = img.width;
                            canvas.height = img.height;
                            context.drawImage(img, 0, 0, img.width, img.height);
                            return canvas.toDataURL('image/jpg');


                        }
                    }
                };
                pdf.addImage(imgData, 'jpg', cell.textPos.x + 5, cell.textPos.y + 5, 20, 20);
            }
        },
    });

    pdf.save('table_with_images.pdf');
}
</script>

<?php }?>

<?php include '../extra/fotter.php';?>