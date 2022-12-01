<?php

/**
 * Exercise 6 : Fichier CSV
 */

/**
 * Undocumented function
 *
 * @param array $data
 * @return void
 */
function arrayToCSV(array $data) {
    $string="";
    for ($i = 0; $i < count($data); $i++) {
        for ($j = 0; $j < count($data[$i]); $j++) {
            $string .= $data[$i][$j];
            if ($j < count($data[$i]) - 1) {
                $string .= ';';
            } else {
                $string .= "\n";
            }
        }
    }
    file_put_contents('employees.csv', $string);
}

function getCSVFromFile(string $file): array {
    return file($file, FILE_SKIP_EMPTY_LINES);
}

function parseCSV(array $lines): array {
    $parsedData = [];
    foreach($lines as $line) {
        $parsedData[] = explode(';', $line);
    }
    return $parsedData;
}

function printEmployees(array $employees): void {
    foreach($employees as $employee) {
        echo $employee[0] . ' ' . $employee[1] . ', salaire : ' . $employee[2];
    }
}

function getSalaryFromEmployee(string $firstname, string $lastname, array $employees): int {
    foreach($employees as $employee) {
        if ($employee[0] == $lastname && $employee[1] == $firstname) {
            return $employee[2];
        }
    }
    return 0;
}

function printLowerSalary($employees): void {
    $smaller = $employees[0][2];
    $index = 0;

    for ($i = 0; $i < count($employees); $i++) {
        if ($employees[$i][2] < $smaller) {
            $smaller = $employees[2];
            $index = $i;
        }
    }
    echo "Salaire le plus petit : ";
    echo $employees[$index][0] . ' ' . $employees[$index][1];
}

function printHigherSalary($employees): void {
    $higher = $employees[0][2];
    $index = 0;

    for ($i = 0; $i < count($employees); $i++) {
        if ($employees[$i][2] > $higher) {
            $higher = $employees[2];
            $index = $i;
        }
    }
    echo "Salaire le plus élevé : ";
    echo $employees[$index][0] . ' ' . $employees[$index][1];
}

function getWages(array $employees): array {
    $wages = [];
    foreach($employees as $employee) {
        $wages[] = $employee[2];
    }
    return $wages;
}

function printAverageSalary(array $wages): void {
    $total = 0;
    
    foreach($wages as $salary) {
        $total += $salary;
    }

    $average = $total / count($wages);
    echo 'Average salary ' . $average; 
}

function ascendingSort(array $values): array {
    for ($i = 1; $i < count($values); $i++) {
        while ($values[$i] < $values[$i-1]) {
            if ($values[$i] < $values[$i-1]) {
                $min = $values[$i];
                $values[$i] = $values[$i-1];
                $values[$i-1] = $min;
            }
            $i = 1;
        }
    }
    return $values;
}

function printMedianSalary(array $wages): void {
    // Trier ordre croissant
    $sortedWages = ascendingSort($wages);
    
    $smaller = [];
    $higher = [];
    $middle = floor(count($sortedWages) / 2) - 1;
    
    // Séparer les salaires en 2 sous ensemble de 50%
    for ($i = 0; $i < count($sortedWages); $i++) {
        if ($i <= $middle) {
            $smaller[] = $sortedWages[$i];
        } else {
            $higher[] = $sortedWages[$i];
        }
    }

    echo "Salaire médian : " . $higher[0];
}

$newEmployees = [
    ['nom1', 'prenom1', 1200],
    ['nom2', 'prenom2', 1400],
    ['nom3', 'prenom3', 1300],
    ['nom4', 'prenom4', 1500],
    ['nom5', 'prenom5', 600]
];

arrayToCSV($newEmployees);
$csv = getCSVFromFile('employees.csv');
$employees = parseCSV($csv);

echo getSalaryFromEmployee('prenom2', 'nom2', $employees) . "\n";
printLowerSalary($employees);
echo "\n";
printHigherSalary($employees);
echo "\n";
printAverageSalary(getWages($employees));
echo "\n";
printMedianSalary(getWages($employees));