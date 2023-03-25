<?php
function getCustomers()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getCustomersNum();
    return $num_rows;
}
function getEmployees()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getEmployeesNum();
    return $num_rows;
}
function getHotels()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getHotelsNum();
    return $num_rows;
}
function getPackages()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getPackagesNum();
    return $num_rows;
}
function getTopSelling()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getTopSellingNum();
    return $num_rows;
}
function getBookings()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getBookingsNum();
    return $num_rows;
}
function viewHotels()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $result = getHotel();
    return $result;
}
function viewTopSelling()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $result = getTopSellings();
    return $result;
}
function viewBooking()
{
    include_once('../../Model/Admin/AdminDashboardModel.php');
    $result = getBooking();
    return $result;
}
function renderDashboardCards()
{
    $customers = getCustomers();
    $employees = null;
    if ($_SESSION['role'] == "admin") {
        $employees = getEmployees();
    }
    $hotels = getHotels();
    $packages = getPackages();
    $topSelling = getTopSelling();
    $bookings = getBookings();

    ?>
<div class="cardContainer">
    <a href="ViewCustomers.php">
        <div class="card">
            <div class="card-header">
                <h3>Customers</h3>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $customers ?>
                </p>
            </div>
        </div>
    </a>
    <?php if ($_SESSION['role'] == "admin") { ?>
    <a href="ViewEmployee.php">
        <div class="card">
            <div class="card-header">
                <h3>Employees</h3>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $employees ?>
                </p>
            </div>
        </div>
    </a>
    <?php } ?>
    <a href="ViewHotel.php">
        <div class="card">
            <div class="card-header">
                <h3>Hotels</h3>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $hotels ?>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="cardContainer">
    <a href="ViewPackages.php">
        <div class="card">
            <div class="card-header">
                <h3>Packages</h3>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $packages ?>
                </p>
            </div>
        </div>
    </a>
    <a href="TopSelling.php">
        <div class="card">
            <div class="card-header">
                <h3>Packages Sold</h3>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $topSelling ?>
                </p>
            </div>
        </div>
    </a>
    <a href="ViewBookings.php">
        <div class="card">
            <div class="card-header">
                <h3>Bookings</h3>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $bookings ?>
                </p>
            </div>
        </div>
    </a>
</div>
<?php
}
?>