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
left: -280px;
width: 250px;
height: 100%;
transition: all .5s ease;
border: 1px solid rgba(255, 255, 255, 0.18);
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
	display: flex;
	align-items: center;
	padding: 0 25px;
	transition: all .5s ease;
	grid-gap: 10px;

}
#sidebar ul a{
	display: block;
	height: 100%;
	width: 100%;
	line-height: 65px;
	font-size: 14px;
	color: black;
	padding-left: 25px;
	box-sizing: border-box;
	transition: all .5s ease;

}
#sidebar ul li:hover a{
	padding-left: 40px;
	background-color: #eee;
	border-top-left-radius: 30px;
	border-bottom-right-radius: 30px;

}
#sidebar ul a img{
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
	top: 26px;
	font-size: 35px;
	color: black;
	transition: all .5s;
	z-index: 1;
}
label #cancel{
	z-index: 1111;
	left: -195px;
	top: 26px;
	font-size: 20px;
	color: black;
	transition: all .5s ease;
}
#check:checked ~ .sidebar{
	left : 0;
}
#check:checked ~ label #btn{
	left : 280px;
	opacity: 0;
	pointer-events: none;
}
#check:checked ~ label #cancel{
	left : 195px;	
}

#check:checked ~ #sarnuparyo{
	margin-left: 150px;
}
.sidebar .logout {
	margin-top: 20px;
margin-left: 10px;
border-top: 1px solid black;
}
.sidebar .logout a{
text-decoration: none;
  color: black;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 15px;
  cursor: pointer;
  transition: all 0.5s ease;
  /* position: relative;
  left: 12em;
  top: 6em; */
  align-items: center;
display: flex;
grid-gap: 7px;
}
.sidebar .logout a:hover{
    background-color: #eee;
    color: black;
	padding-left: 40px;
    
}

    </style>
    <input type="checkbox" id="check" checked>
    <label for="check">
       <!--  <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i> -->
    </label>
    <div class="sidebar" id="sidebar">
        <header><img src="../illustrations/logo.png" width="25" height="25"> Management</header>
        <ul>
			<!-- euta . rakhera include gardaa supervisor/supervisor vayo  -->
            <li><a href="../html/userdashboard.php"><img src="../illustrations/dashboard.png" width="20" height="20">Dashboard</a></li>
            <li><a href="myproject.php"><img src="../illustrations/project.png" width="20" height="20">My Project</a></li>
			<li><a href="taskview.php"><img src="../illustrations/briefing.png" width="20" height="20">Tasks</a></li>
            
        </ul>
		<div class="logout"><a href="../html/logout.php">Logout <img src="../illustrations/logout.png" width="20"height="20"></a>
            </div>
    
    </div>

</body>
</html>