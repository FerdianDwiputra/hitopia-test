<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>
</head>

<body>
    <h1>Input Form</h1>
    <form action="/process" method="POST">
        @csrf
        <label for="type">Select Task:</label>
        <select name="type" id="type" required>
            <option value="weightedStrings">Weighted Strings</option>
            <option value="balancedBrackets">Balanced Brackets</option>
            <option value="highestPalindrome">Highest Palindrome</option>
        </select>
        <br><br>

        <label for="s">Enter String (s):</label>
        <input type="text" id="s" name="s" required>
        <br><br>

        <label for="k">Enter k (for Highest Palindrome):</label>
        <input type="number" id="k" name="k">
        <br><br>

        <label for="queries">Enter Queries (for Weighted Strings, comma-separated):</label>
        <input type="text" id="queries" name="queries">
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
