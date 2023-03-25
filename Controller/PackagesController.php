<?php
function showPackages($page)
{
    require('../Model/Admin/PackagesModel.php');
    $rows = getPackages($page);
    if ($rows) {
        while ($row = $rows->fetch_assoc()) {
            echo '<div class="Pcard">
                        <div class="Pcard-header">
                            <p>' . $row["Name"] . '</p>
                        </div>
                        <div class="Pcard-body">
                            <table>
                            <tr>
                                    <th>Hotel</th>
                                    <td>:</td>
                                    <td>' . $row["Hotel_Name"] . '</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>:</td>
                                    <td>' . $row["Days"] . ' Days</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>:</td>
                                    <td>' . $row["Price"] . ' BDT</td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>:</td>
                                    <td>' . date('d F', strtotime($row['Start_Date'])) . '</td>
                                </tr>
                            </table>
                            <div class="BookBtn"> 
                            <button>
                            <a href="../Controller/BookAction.php?Package_Id=' . $row['Package_Id'] . '">Book
                                    Now
                            </button></div>
                        </div>
                    </div>';
        }
    }

}
function viewAllPackages($page)
{
    require('../../Model/Admin/PackagesModel.php');
    $result = getPackages($page);
    return $result;
}

?>