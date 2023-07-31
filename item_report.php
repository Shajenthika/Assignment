<?php
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT DISTINCT item.item_name, item_category.category, item_subcategory.sub_category, item.quantity 
            FROM item
            INNER JOIN item_category ON item.item_category = item_category.id
            INNER JOIN item_subcategory ON item.item_subcategory = item_subcategory.id
            GROUP BY item.item_name, item_category.category, item_subcategory.sub_category";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Item Category</th>
                    <th>Item Subcategory</th>
                    <th>Item Quantity</th>
                </tr>
            </thead>
            <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['item_name']}</td>
                <td>{$row['category']}</td>
                <td>{$row['sub_category']}</td>
                <td>{$row['quantity']}</td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No data found in the Item Report.";
    }

    mysqli_close($con);

?>