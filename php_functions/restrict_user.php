<?php 
if(!isset($_SESSION['username']))
{
header('location:index.php');
}
function teacher()
{
    if($_SESSION['type']!=1)
    {
        header('location:home-teacher.php');
    }
}
function director()
{
    if($_SESSION['type']!=2)
    {
        header('location:home-teacher.php');
    }
}
function ec()
{
    if($_SESSION['type']!=3)
    {
        header('location:home-teacher.php');
    }
}


?>