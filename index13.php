<?php

require_once __DIR__ . '/Doctors.php';
require_once __DIR__ . '/Active_Record.php';
require_once __DIR__ . '/DBase.php';

$db = DBase::pdo();

Active_Record::setDb($db);

$doctor = new Doctors();

$doctor->name = 'Дуров Иван';
$doctor->phone = '+79132540033';
$doctor->salary = 29100;

if ($doctor->insert()) {
    echo $doctor->id . ' - ' . $doctor->name . ' -  ' . $doctor->phone . ' - ' . $doctor->salary . '<br/>';
};

$doctor = Doctors::findById(10);

$doctor = Doctors::findById(40);

if (($doctor !== null)) {
    $doctor->name = 'Теркин Василий';
    $doctor->phone = '+79157376652';
    $doctor->salary = 36200;
    $doctor->update();
};

$doctor = Doctors::findById(41);

if ($doctor !== null) {
    try {
        $doctor->delete();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
};

$result = $db->query("SELECT * FROM doctors ")->fetchAll(PDO::FETCH_ASSOC);
echo "_________Данные записей таблицы \"Doctors\":" . '<br />';
foreach ($result as $row) {
    echo $row['ID'] . ' - ' . $row['Name'] . ' --  ' . $row['Phone'] . ' -- ' . $row['Salary'] . '<br />';
}



