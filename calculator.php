<?php
// Define the Calculator class
class Calculator {

    // Method to perform the calculation based on the provided operation
    public function calculate($num1, $num2, $operation) {
        // Use a switch statement to handle different operations
        switch ($operation) {
            // Addition operation
            case 'add':
                return $num1 + $num2;

            // Subtraction operation
            case 'subtract':
                return $num1 - $num2;

            // Multiplication operation
            case 'multiply':
                return $num1 * $num2;

            // Division operation
            case 'divide':
                return $num1 / $num2;

            // Exponentiation operation
            case 'exponentiate':
                return pow($num1, $num2);

            // Percentage calculation
            case 'percentage':
                return ($num1 / $num2) * 100;

            // Square root calculation (only requires one number)
            case 'sqrt':
                return sqrt($num1);

            // Logarithm calculation (logarithm of num1 with base num2)
            case 'logarithm':
                return log($num1) / log($num2); // log(num1) base num2

            // Square calculation (num1 squared)
            case 'square':
                return $num1 * $num1;

            // Sine calculation (angle in degrees)
            case 'sine':
                return sin(deg2rad($num1)); // Convert degrees to radians

            // Cosine calculation (angle in degrees)
            case 'cosine':
                return cos(deg2rad($num1)); // Convert degrees to radians

            // Tangent calculation (angle in degrees)
            case 'tangent':
                return tan(deg2rad($num1)); // Convert degrees to radians

            // Default case for invalid operation
            default:
                return "Invalid operation";
        }
    }
}
?>
