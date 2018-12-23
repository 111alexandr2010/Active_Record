<?php

require_once __DIR__ . '/Active_Record.php';

class Doctors extends Active_Record
{
    public  $id;
    public  $name;
    public  $phone;
    public  $salary;

}