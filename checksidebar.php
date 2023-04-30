<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
body{
    margin: 0;
	font-family: 'Ubuntu', sans-serif;
}
*{
	margin: 0;
	padding: 0;
	list-style: none;
	text-decoration: none;
	box-sizing: border-box;
}
#sidebar{
	position: fixed;
left: -250px;
width: 250px;
height: 100%;
transition: all .5s ease;
border: 1px solid rgba(255, 255, 255, 0.18);
padding: 0em 0.5em;
background-color: white;
border-bottom-right-radius: 14px;
border-top-right-radius: 14px;
}
#sidebar header{
	font-size: 20px;
	font-weight: bold;
	color: black;
	text-align: center;
	line-height: 70px;
	border-bottom: 1px solid black;
	user-select: none;

}
#sidebar ul a{
	display: block;
	height: 100%;
	width: 100%;
	line-height: 65px;
	font-size: 17px;
	color: black;
	padding-left: 40px;
	box-sizing: border-box;
	transition: .4s;

}
#sidebar ul li:hover a{
	padding-left: 50px;
	background-color: rgba(255, 255, 255, 0.3);
	border:none;
	border-radius: 30px 0px 30px 0px;

}
#sidebar ul a i{
margin-right: 16px;
}
#check{
	display: none;
}
label #btn, label #cancel{
	position: absolute;
	cursor: pointer;

	
}
label #btn{
	left: 40px;
	top: 25px;
	font-size: 35px;
	color: black;
	padding: 6px 12px;
	transition: all .5s;
	z-index: 1;
}
label #cancel{
	z-index: 1111;
	left: -195px;
	top: 22px;
	font-size: 20px;
	color: black;
	padding: 4px 9px;
	transition: all .5s ease;
}
#check:checked ~ .sidebar{
	left : 0;
}
#check:checked ~ label #btn{
	left : 250px;
	opacity: 0;
	pointer-events: none;
}
#check:checked ~ label #cancel{
	left : 195px;	
}

#check:checked ~ #sarnuparyo{
	margin-left: 250px;
}


    </style>
    <input type="checkbox" id="check" checked>
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar" id="sidebar">
        <header>Management</header>
        <ul>
            <li><a href="index.php"><img src="../illustrations/dashboard.png" width="15" height="15">Dashboard</a></li>
            <li><a href="final.php"><img src="../illustrations/active.png" width="15" height="15">Notifications</a></li>
            <li><a href="airdetails.php"><img src="../illustrations/project.png" width="15" height="15">Projects</a></li>
            <li><a href="display.php"><img src="../illustrations/students.png" width="15" height="15">Students list</a></li>
            <li><a href="searchlocation.php"><img src="../illustrations/project-management.png" width="15" height="15">Manage Report</a></li>
            <li><a href="about.html"><img src="../illustrations/folder-management.png" width="15" height="15">Manage Resources</a></li>
			<li><a href="about.html"><img src="../illustrations/interview.png" width="15" height="15">Requests</a></li>
			<li><a href="about.html"><img src="../illustrations/briefing.png" width="15" height="15">Assign Marks</a></li>
            
        </ul>
    
    </div>

</body>
</html>