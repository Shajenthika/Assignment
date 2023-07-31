<?php
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        	
        $query = "SELECT invoice_master.invoice_no, invoice.date, customer.first_name, item.item_name, item.item_code, item_category.category ,invoice_master.unit_price
            FROM invoice_master
            INNER JOIN item ON invoice_master.item_id=item.id
            INNER JOIN invoice ON invoice_master.invoice_no=invoice.invoice_no
            INNER JOIN customer ON invoice.customer = customer.id
            INNER JOIN item_category ON item.item_category=item_category.id
            WHERE date BETWEEN '$start_date' AND '$end_date'
            GROUP BY invoice.invoice_no, invoice.date, customer.first_name
            ORDER BY invoice.date";

            $query_run = mysqli_query($con,$query);
            
            if ($query_run->num_rows > 0) {
                echo "<table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Invoiced Date</th>
                            <th>Customer Name</th>
                            <th>Item name</th>
                            <th>Item code</th>
                            <th>Item category</th>
                            <th>Item unit price</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = $query_run->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['invoice_no']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['item_name']}</td>
                            <td>{$row['item_code']}</td>
                            <td>{$row['category']}</td>
                            <td>{$row['unit_price']}</td>
                        </tr>";
                    }
                echo "</tbody></table>";
            } else {
                echo "No data found for the selected date range.";
            }

        $con->close();
?>