<?php

/**
 * Exercise 6 : Fichier CSV
 */

$newEmployees = [
    ['Édouard',     'Trudeau',  1200],
    ['Kerman',      'Demers',   1400],
    ['Germain',     'Laforest', 800],
    ['Marjolaine',  'Lajoie',   1500],
    ['Russell',     'Petrie',   600]
];

// Working on the CSV file, writing and reading
arrayToCSVFile($newEmployees, 'employees.csv');
$csv = getCSVFromFile('employees.csv');
$employees = parseCSV($csv);

echo "\n";
displayEmployeesSalary($employees);
echo "\n";

echo 'Le salaire de Kerman Demers est de ' . getSalaryFromEmployee('Kerman', 'Demers', $employees) . "€\n";

displayLowerSalaryEmployee($employees);
echo "\n";

displayHigherSalaryEmployee($employees);
echo "\n";

displayAverageSalary(getSalaries($employees));
echo "\n";

displayMedianSalary(getSalaries($employees));


/**
 * Converts an array of values ​​to CSV format
 * The CSV is then written to a file
 *
 * @param array $data The table of values
 * @param string $filename The filename with extension
 * @return void
 */
function arrayToCSVFile(array $data, string $filename) {
    $string="";
    for ($i = 0; $i < count($data); $i++) {
        for ($j = 0; $j < count($data[$i]); $j++) {
            $string .= $data[$i][$j];
            // semicolon between value
            if ($j < count($data[$i]) - 1) {
                $string .= ';';
            // Line break to last item
            } else {
                $string .= "\n";
            }
        }
    }
    file_put_contents($filename, $string);
}

/**
 * Retrieve the contents of a CSV file
 *
 * @param string $filename The filename with extension
 * @return array Look like [value1;value2;value3]
 */
function getCSVFromFile(string $filename): array {
    return file($filename, FILE_SKIP_EMPTY_LINES);
}

/**
 * To obtain an easily usable table of values
 *
 * @param array $CSV The CSV file
 * @return array Look like [[0]=>value1, [1]=>value2, [2]=>value3]
 */
function parseCSV(array $CSV): array {
    $parsedCSV = [];
    foreach($CSV as $value) {
        $parsedCSV[] = explode(';', $value);
    }
    return $parsedCSV;
}

/**
 * Displays the employees of a list with their salary
 *
 * @param array $employees
 * @return void
 */
function displayEmployeesSalary(array $employees): void {
    foreach($employees as $employee) {
        echo $employee[0] . ' ' . $employee[1] . ', salaire : ' . $employee[2];
    }
}

/**
 * Find an employee in a list and recover his salary
 *
 * @param string $firstname
 * @param string $lastname
 * @param array $employees The list of employees
 * @return integer The salary of employee, 0 if employee don't exist
 */
function getSalaryFromEmployee(string $firstname, string $lastname, array $employees): int {
    foreach($employees as $employee) {
        if ($employee[0] == $firstname && $employee[1] == $lastname) {
            return $employee[2];
        }
    }
    return 0;
}

/**
 * Finds the lowest salary and displays the employee fullname
 *
 * @param array $employees The list of employees
 * @return void
 */
function displayLowerSalaryEmployee(array $employees): void {
    // Comparison reference for the smallest salary
    $smaller = (int)$employees[0][2];
    $index = 0;

    // Comparison with each salary
    for ($i = 0; $i < count($employees); $i++) {
        $salary = (int)$employees[$i][2];
        // Get the new smaller salary
        if ($salary < $smaller) {
            $smaller = $salary;
            $index = $i;
        }
    }
    echo "Salaire le plus petit : ";
    echo $employees[$index][0] . ' ' . $employees[$index][1];
}

/**
 * Finds the higher salary and displays the employee fullname
 *
 * @param array $employees The list of employees
 * @return void
 */
function displayHigherSalaryEmployee($employees): void {
    // Comparison reference for the higher salary
    $higher = (int)$employees[0][2];
    $index = 0;

    // Comparison with each salary
    for ($i = 0; $i < count($employees); $i++) {
        $salary = (int)$employees[$i][2];
        // Get the new higher salary
        if ($salary > $higher) {
            $higher = $salary;
            $index = $i;
        }
    }
    echo "Salaire le plus élevé : ";
    echo $employees[$index][0] . ' ' . $employees[$index][1];
}

/**
 * Extract the salaries from the employees list
 *
 * @param array $employees Employees list
 * @return array All the salaries
 */
function getSalaries(array $employees): array {
    $salaries = [];
    foreach($employees as $employee) {
        $salaries[] = (int)$employee[2];
    }
    return $salaries;
}

/**
 * Display the average salary from a list
 *
 * @param array $salaries
 * @return void
 */
function displayAverageSalary(array $salaries): void {
    $total = 0;
    foreach($salaries as $salary) {
        $total += $salary;
    }
    $average = $total / count($salaries);
    echo 'Salaire moyen ' . $average; 
}

/**
 * Display the median salary from a list
 *
 * @param array $salaries
 * @return void
 */
function displayMedianSalary(array $salaries): void {
    $sortedSalaries = sortAscending($salaries);
    $smaller = [];
    $higher = [];
    $middle = floor(count($sortedSalaries) / 2) - 1;
    
    // Split salaries into 2 subsets of 50%
    // The median salary is the smallest salary from the higher array
    for ($i = 0; $i < count($sortedSalaries); $i++) {
        if ($i <= $middle) {
            $smaller[] = $sortedSalaries[$i];
        } else {
            $higher[] = $sortedSalaries[$i];
        }
    }
    echo "Salaire médian : " . $higher[0];
}

/**
 * Sort an array of values, negative or not, in ascending order
 *
 * @param array $numbers The array of numbers to sort
 * @return array The sorted array
 */
function sortAscending(array $numbers): array {
    for ($i = 0; $i < count($numbers); $i++) {
        // As long as the array is not sorted
        while ($numbers[$i] < $numbers[$i-1]) {
            // Compare which of the 2 numbers is greater
            if ($numbers[$i] < $numbers[$i-1]) {
                // If so, swap the 2 numbers with temp variable
                $min = $numbers[$i];
                $numbers[$i] = $numbers[$i-1];
                $numbers[$i-1] = $min;
            }
            // Check the table again by returning the index to 0
            $i = 0;
        }
    }
    return $numbers;
}