<?php
// initialize variables
$name = "";
$email = "";
$phone = "";
$city = "";
$feedback_options = "";
$your_message = "";
$by_email = "";
$by_phone = "";

// get posted form data
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$city = $_REQUEST['city'];
$feedback = $_REQUEST['feedback_options'];
$message = $_REQUEST['your_message'];
$by_email =  isset($_REQUEST['by_email']);
$by_phone =  isset($_REQUEST['by_phone']);

//// ensure that all fields are entered
//if (($first_name == "")
//  || ($last_name == "")
//  || ($username == "")
//  || ($email == "")
//  || ($verify_email == "")) {
//    header("Location: /register.html");
//    exit();
//  }
//
//// first name must be >= 3 characters
//if (strlen($first_name) < 3){
//  header("Location: /register.html");
//  echo "Firstname is too short";
//  exit();
//}
//
//// last name must be >= 3 characters
//if (strlen($last_name) < 3){
//  header("Location: /register.html");
//  exit();
//}
//
// Check by_email
if ($by_email == 1) {
  $by_email = "True";
 }
 else {
  $by_email = "False";
 }

// Check by_phone
if ($by_phone == 1) {
  $by_phone = "True";
}
else {
  $by_phone = "False";
}

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA_Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registeration complete!</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Customer feedback received</h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <?php echo $name ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <?php echo $email ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>
                                  <?php echo $phone ?>
                                </td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>
                                  <?php echo $city ?>
                                </td>
                            </tr>
                            <tr>
                                <th>feedback</th>
                                <td>
                                    <?php echo $feedback ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Feedback</th>
                                <td>
                                    <?php echo $message ?>
                                </td>
                            </tr>
                            <tr>
                                <th>By Email</th>
                                <td>
                                  <?php echo $by_email ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>