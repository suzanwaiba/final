<?php 
include('../sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
		<section id="sarnuparyo">
            <main>
                <div class="notif_panel">
                    <header> Create a notice</header>
                    <form action="" method="post">
                        <div class= "details notice">
                            <span  class= "title">Notice details</span>
                            <div class = "fields">
                                <div class="input-field">
                                    <label>Title</label>
                                    <input type="text" name="notice_title" required>
                                </div>
                                <div class="input-field">
                                    <label>Body</label>
                                    <input type="text" name="notice_body" required>
                                </div>
                                <div class="input-field">
                                    <label>Due Date</label>
                                    <input type="date" name="due_date" required>
                                </div>
                            </div>
                            <button class="btn" name="send_notice">
                        <span class="btntext">Send notice</span>
                       <img src="../illustrations/send-message.png"class="send-notice"alt="">
                    </button>
                        </div>

                    </form>
                </div>
            </main>
        </section>
</body>
</html>
