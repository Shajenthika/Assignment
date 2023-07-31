<?php
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $query = "SELECT invoice.invoice_no, invoice.date, customer.first_name, district.district, invoice.item_count, invoice.amount 
            FROM invoice
            INNER JOIN customer ON invoice.customer = customer.id
            INNER JOIN district ON customer.district = district.id
            WHERE date BETWEEN '$start_date' AND '$end_date'
            GROUP BY invoice.invoice_no, invoice.date, customer.first_name, district.district
            ORDER BY date";

            $query_run = mysqli_query($con,$query);
            
            if ($query_run->num_rows > 0) {
                echo "<table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Customer District</th>
                            <th>Item Count</th>
                            <th>Invoice Amount</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = $query_run->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['invoice_no']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['district']}</td>
                            <td>{$row['item_count']}</td>
                            <td>{$row['amount']}</td>
                        </tr>";
                    }
                echo "</tbody></table>";
            } else {
                echo "No data found for the selected date range.";
            }

        $con->close();
?>