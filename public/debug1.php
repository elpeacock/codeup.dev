<?php var_dump($_POST) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/external_css.css">
    <title></title>
</head>
<body>
    <h1>Please Sign Up</h1>
    <form method="POST">
        <label for="username">Username
        <input id="username" type="text" name="username">
        </label>
        <br>

        <label for="email">Email
        <input id="email" type="text" name="email">
        </label>
        <br>

        <label for="newsletter">Sign Me Up For The Newsletter
            <input type="checkbox" name="newsletter" id="newsletter" value="yes" checked>
        </label>
        <br>

        <label for="password">password
        <input id="password" type="password" name="password">
        </label>
        <br>

        <label for="confirm_password">confirm password
        <input id="confirm_password" type="password" name="confirm_password">
        </label>
        <br>

        <h2>Filing Status</h2>

        <label for="single">
            <input type="radio" name="filing_status" value="single" id="single">
            Single
        </label>
        <br>
        
        <label for="married_joint">
            <input type="radio" name="filing_status" value="married_joint" id="married_joint">
            Married Filing Jointly
        </label>
        <br>
        
        <label for="married_seperate">
            <input type="radio" name="filing_status" value="married_separate" id="married_seperate">
            Married Filing Separately
        </label>
        <br>
        
        <label for="hoh">
            <input type="radio" name="filing_status" value="hoh" id="hoh">
            Head of Household
        </label>
        <br>
        
        <h2>This past year I was (check all that apply)</h2>

        <label for="self_employed">
            <input type="checkbox" name="employment_status[]" value="self_employed" id="self_employed">
            Self - Employed
        </label>
        <br>
        
        <label for="small_business">
            <input type="checkbox" name="employment_status[]" value="small_business" id="small_business">
            Employed by a small business (< 50 employees)
        </label>
        <br>
        
        <label for="large_business">
            <input type="checkbox" name="employment_status[]" value="large_business" id="large_business">
            Employed by a large business (> 50 employees)
        </label>
        <br>
        
        <h2>What kind of phone do you have</h2>
        <p>
        <select name="phone type">
            <option value="android">Android</option>
            <option value="iphone">iPhone</option>
            <option value="windows">Windows Phone</option>
            <option value="other">Other</option>
        </select>
        </p>
        <button type="submit">Sign Me Up</button>
        <hr>

        
        
    </form>
    


</body>
</html>