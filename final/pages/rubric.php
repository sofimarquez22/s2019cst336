<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/rubric.css">
    </head>
    <body>
        <nav>
            <div id="nav-bar">
                <ul>
                    <li><a href = "dashboard.php">Dashboard</a></li>
                    <li><a href = "login.php">Login</a></li>
                    <li><a href = "signUp.php">Sign Up</a></li>
                    <li><a class = "active" href = "#rubric">Rubric</a></li>
                    <li><a href = "logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
        <h1>Rubric</h1>
        <table>
            <thead>
                <tr>
                    <th style="text-align:left">#</th>
                    <th style="text-align:left">Task Description</th>
                    <th style="text-align:left">Points</th>
                </tr>
            </thead>
            <tbody>
                <tr class = "complete">
                    <td style="text-align:left">1</td>
                    <td style="text-align:left">You provide a ERD diagram representing the data and its relationships. This may be included in Cloud9 as a picture or from a designer tool</td>
                    <td style="text-align:left">10</td>
                </tr>
                <tr class = "complete">
                    <td style="text-align:left">2</td>
                    <td style="text-align:left">Tables in MySQL match the ERD and support the requirements of the application</td>
                    <td style="text-align:left">20</td>
                </tr>
                <tr class = "complete">
                    <td style="text-align:left">3</td>
                    <td style="text-align:left">The list of available appointments is pulled from MySQL using the API endpoint and displayed using the specified page design</td>
                    <td style="text-align:left">20</td>
                </tr>
                <tr class = "incomplete">
                    <td style="text-align:left">4</td>
                    <td style="text-align:left">Available times with dates in the past do not show up in the Dashboard list</td>
                    <td style="text-align:left">5</td>
                </tr>
                <tr class = "complete">
                    <td style="text-align:left">5</td>
                    <td style="text-align:left">A user can add an available time slot to the MySQL using the API endpoint and displayed using the specified modal design</td>
                    <td style="text-align:left">20</td>
                </tr>
                <tr class = "complete">
                    <td style="text-align:left">6</td>
                    <td style="text-align:left">A user can remove an available time slot from MySQL using the API endpoint</td>
                    <td style="text-align:left">15</td>
                </tr>
                <tr class = "complete">
                    <td style="text-align:left">7</td>
                    <td style="text-align:left">The user confirms the removal using the specified modal design</td>
                    <td style="text-align:left">10</td>
                </tr>
                <tr>
                    <td style="text-align:left"></td>
                    <td style="text-align:left">TOTAL</td>
                    <td style="text-align:left">100</td>
                </tr>
                <tr class = "complete">
                    <td style="text-align:left"></td>
                    <td style="text-align:left">This rubric is properly included AND UPDATED (BONUS)</td>
                    <td style="text-align:left">2</td>
                </tr>
                <tr class = "complete">
                    <td style="text-align:left">BD</td>
                    <td style="text-align:left">Login works with a User table and BCrypt</td>
                    <td style="text-align:left">20</td>
                </tr>
                <tr class = "incomplete">
                    <td style="text-align:left">BD</td>
                    <td style="text-align:left">Add Google Signin for app login</td>
                    <td style="text-align:left">10</td>
                </tr>
                <tr class = "sortOf">
                    <td style="text-align:left">BD</td>
                    <td style="text-align:left">The app is deployed to Heroku</td>
                    <td style="text-align:left">15</td>
                </tr>
                <tr class = "incomplete">
                    <td style="text-align:left">BD</td>
                    <td style="text-align:left">A banner file can be uploaded and displayed</td>
                    <td style="text-align:left">20</td>
                </tr>
                <tr class = "incomplete">
                    <td style="text-align:left">BD</td>
                    <td style="text-align:left">The user can add multiple available time slots as specified</td>
                    <td style="text-align:left">10</td>
                </tr>
                <tr class = "incomplete">
                    <td style="text-align:left">BD</td>
                    <td style="text-align:left">In a separate page, you show the correct list of available time slots to the user who navigates to the correct invitation URL</td>
                    <td style="text-align:left">10</td>
                </tr>
                <tr class = "incomplete">
                    <td style="text-align:left">BD</td>
                    <td style="text-align:left">You correctly implement booking of the appointement, including all side effects</td>
                    <td style="text-align:left">30</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>