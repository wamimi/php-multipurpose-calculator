<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
    <!-- Link to external CSS file for styling -->
    <link rel="stylesheet" href="styles.css">
    <script>
        // Function to update input fields based on selected operation
        function updateInputFields() {
            var operation = document.getElementById('operation').value; // Get selected operation
            var num1Label = document.getElementById('num1-label'); // Get label for first number
            var num2Label = document.getElementById('num2-label'); // Get label for second number
            var num2Field = document.getElementById('num2'); // Get second input field
            
            // Ensure the second input field is visible by default
            num2Field.style.display = 'block';

            // Update labels and visibility of input fields based on the selected operation
            switch (operation) {
                case 'sqrt':
                    num1Label.innerText = 'Enter the number:'; // Label for square root operation
                    num2Field.style.display = 'none'; // Hide the second input field
                    break;
                case 'percentage':
                    num1Label.innerText = 'Enter the part:'; // Label for percentage operation
                    num2Label.innerText = 'Enter the whole:'; // Label for the whole value
                    break;
                case 'logarithm':
                    num1Label.innerText = 'Enter the value:'; // Label for logarithm value
                    num2Label.innerText = 'Enter the base:'; // Label for logarithm base
                    break;
                case 'exponentiate':
                    num1Label.innerText = 'Enter the base:'; // Label for base in exponentiation
                    num2Label.innerText = 'Enter the exponent:'; // Label for exponent
                    break;
                case 'square':
                    num1Label.innerText = 'Enter the number:'; // Label for squaring a number
                    num2Field.style.display = 'none'; // Hide the second input field
                    break;
                case 'sine':
                case 'cosine':
                case 'tangent':
                    num1Label.innerText = 'Enter the angle (in degrees):'; // Label for trigonometric functions
                    num2Field.style.display = 'none'; // Hide the second input field
                    break;
                default:
                    num1Label.innerText = 'Enter first number:'; // Default label for first number
                    num2Label.innerText = 'Enter second number:'; // Default label for second number
                    num2Field.style.display = 'block'; // Ensure the second input field is visible
                    break;
            }
        }

        // Function to clear the result display
        function clearResult() {
            var resultDiv = document.querySelector('.result'); // Get the result div
            resultDiv.innerHTML = ''; // Clear its content
        }

        // Add an event listener to clear the result when clicking anywhere on the page
        window.onload = function() {
            document.body.addEventListener('click', function(e) {
                var target = e.target;
                if (target.tagName !== 'BUTTON') { // If the clicked element is not a button
                    clearResult(); // Clear the result
                }
            });
        };
    </script>
</head>
<body>
    <div class="calculator">
        <h1>Multipurpose Calculator</h1>
        <!-- Form for user input and selecting operations -->
        <form action="index.php" method="post">
            <label id="num1-label">Enter first number:</label> <!-- Label for the first input field -->
            <input type="number" name="num1" id="num1" placeholder="Enter first number" required> <!-- First input field -->
            <label id="num2-label">Enter second number:</label> <!-- Label for the second input field -->
            <input type="number" name="num2" id="num2" placeholder="Enter second number"> <!-- Second input field -->
            <!-- Dropdown menu for selecting the operation -->
            <select name="operation" id="operation" onchange="updateInputFields()" required>
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
                <option value="exponentiate">Exponentiation</option>
                <option value="percentage">Percentage</option>
                <option value="sqrt">Square Root</option>
                <option value="logarithm">Logarithm</option>
                <option value="square">Square</option>
                <option value="sine">Sine</option>
                <option value="cosine">Cosine</option>
                <option value="tangent">Tangent</option>
            </select>
            <button type="submit" name="submit">Calculate</button> <!-- Submit button for the form -->
        </form>
        <div class="result">
            <?php
                include 'calculator.php'; // Include the file containing the Calculator class
                if (isset($_POST['submit'])) { // Check if the form is submitted
                    $num1 = $_POST['num1']; // Get the first number from the form
                    $num2 = isset($_POST['num2']) ? $_POST['num2'] : null; // Get the second number if available
                    $operation = $_POST['operation']; // Get the selected operation

                    $calculator = new Calculator(); // Create a new instance of the Calculator class
                    $result = $calculator->calculate($num1, $num2, $operation); // Perform the calculation
                    echo "<h2>Result: $result</h2>"; // Display the result
                }
            ?>
        </div>
    </div>
</body>
</html>
