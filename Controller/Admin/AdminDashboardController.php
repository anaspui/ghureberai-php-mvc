<?php
function getCustomers()
{
    include('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getCustomersNum();
    return $num_rows;
}
function getEmployees()
{
    include('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getEmployeesNum();
    return $num_rows;
}
function getHotels()
{
    include('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getHotelsNum();
    return $num_rows;
}
function getPackages()
{
    include('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getPackagesNum();
    return $num_rows;
}
function getTopSelling()
{
    include('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getTopSellingNum();
    return $num_rows;
}
function getBookings()
{
    include('../../Model/Admin/AdminDashboardModel.php');
    $num_rows = getBookingsNum();
    return $num_rows;
}

?>