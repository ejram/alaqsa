<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>   
<meta charset="UTF-8" />
<link rel="stylesheet" href="css/style.css" type="text/css"  />
<style type="text/css">

#carbonForm{
	/* The main form container */
	background-color:#1C1C1C;
	border:1px solid #080808;
	margin:50px auto;
	padding:20px;
	width:400px;

	-moz-box-shadow:0 0 1px #444 inset;
	-webkit-box-shadow:0 0 1px #444 inset;
	box-shadow:0 0 1px #444 inset;
}

.fieldContainer{
	/* The light rounded section, which contans the fields */
	background-color:#1E1E1E;
	border:1px solid #0E0E0E;
margin-top:20px;
	/* CSS3 box shadow, used as an inner glow */
	-moz-box-shadow:0 0 20px #292929 inset;
	-webkit-box-shadow:0 0 20px #292929 inset;
	box-shadow:0 0 20px #292929 inset;
	height:150px;
}

#carbonForm,.fieldContainer,.errorTip{
	/* Rounding the divs at once */
	-moz-border-radius:12px;
	-webkit-border-radius:12px;
	border-radius:12px;
}

.formRow{
	height:35px;
	padding:10px;
	position:relative;
}

.label{
	float:left;
	padding:0 20px 0 0;
	text-align:right;
	width:300px;
}

label{
	font-family:Century Gothic,Myriad Pro,Arial,Helvetica,sans-serif;
	font-size:18px;
	letter-spacing:1px;
	width:200px;
	color: #CCCCCC;
    float: right;
    margin-right: 10px;
	
}

.field{
	float:right;
}

.field input{
	/* The text boxes */
	border:1px solid white;
	color:#666666;
	font-family:Arial,Helvetica,sans-serif;
	font-size:22px;
	padding:4px 5px;
	background:url("img/box_bg.png") repeat-x scroll left top #FFFFFF;
	outline:none;
}

#submit{
	/* The submit button */
	border:1px solid #f4f4f4;
	cursor:pointer;
	height:25px;
	text-transform:uppercase;
	width:80px;
margin-top:20px;
	background:url("img/submit.png") no-repeat center center #d0ecfd;

	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
}


input:hover,
input:focus{
	/* CSS3 glow effect */
	-moz-box-shadow:0 0 8px lightblue;
	-webkit-box-shadow:0 0 8px lightblue;
	box-shadow:0 0 8px lightblue;
}
.inputcon{
margin-bottom:20px;


}

</style>
    <title>Jotorres Login Screen | Welcome </title>
</head>
<body>

    <div id='login_form'>

<div id="carbonForm">
	<h1>تسجيل الدخول</h1>

        <form action='<?php echo base_url();?>login/process' method='post' name='process'>
	
		<div class="fieldContainer">
			            <br />
            <?php if(! is_null($msg)) echo $msg;?>    
            <div class="inputcon">        
            <label for='username'>اسم الدخول للمستخدم</label>
            <input type='text' name='username' id='username' size='25' />
        </div>
                    <div class="inputcon">        
        
            <label for='password'>كلمة السر</label>
            <input type='password' name='password' id='password' size='25' />     
            </div>                       
        
		</div>

		<div class="signupButton">
            <input id='submit' type='Submit' value='تسجيل الدخول' />            
				</div>

	</form>
	
</div>
</div>

</body>
</html>