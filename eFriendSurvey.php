

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>MusicAndMe</title>
    <!--MENUBAR CSS-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style type="text/css">
        textarea[name=foo] {
            resize: none;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


    </style>


</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top menu_logo">
        <div class="container-fluid">
            <div class="navbar-header menu_logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand menu_logo" href="#" >eFriend</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Features <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">eFriend Finder</a></li>
                            <li><a href="#">eConnect</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Happy Friends</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="wrapper_reg">

        <form action="insertUser.php" method="post">
            <div class="container_reg">
                <div class="header_div">
                    <h2>  Join Our Family </h2>
                </div>
                <div >

                    <!--New form-->
                    <ol>
                        <li>What type of person will you claim yourself to be?</li>
                        <select>
                            <option value="volvo">Introvert</option>
                            <option value="saab">Extrovert</option>

                        </select>



                        <li>List your top five likes/hobbies?</li>
                        <ol>
                            <li><input type="text"></li>
                            <li><input type="text"></li>
                            <li><input type="text"></li>
                            <li><input type="text"></li>
                            <li><input type="text"></li>
                        </ol>




                        <li>Create a small bio about something you like?</li>
                        <textarea name="foo" rows="5" cols="30" placeholder="Say something here" id="tarea">
      
      </textarea>
                        <br>
                        <p>
                            Slide right for a generic auto generated bio
                        </p>
                        <label class="switch">
                            <input type="checkbox" onclick="document.getElementById('tarea').disabled=this.checked;" >
                            <span class="slider round"></span>
                        </label>


                        <li>What would your ideal weekend be?</li>
                        <select>
                            <option value="home">Something at home</option>
                            <option value="saab">Definitely an outing</option>
                            <option value="saab">
                                Take advantage of the empty Library</option>



                        </select>

                        <li>How would you like to be approached?</li>
                        <select>
                            <option value="home">Flirtline</option>
                            <option value="saab">Keeping it simple</option>
                            <option value="saab">A compliment</option>
                        </select>
                        <li>The best thing you have going is:</li>
                        <select>
                            <option value="home">incredible intelligence</option>
                            <option value="saab">gut splitting  humor</option>
                            <option value="saab">amazing honesty</option>
                            <option value="saab"> super looks</option>
                            <option value="saab">compassionate caring</option>
                            <option value="saab">exceptional enthusiasm</option>
                        </select>

                        <li>What do you look for first in others?
                        </li>
                        <select>
                            <option value="home">doesn't matter</option>
                            <option value="saab">intelligence</option>
                            <option value="saab"> sense of humor</option>
                            <option value="saab">honesty</option>
                            <option value="saab">looks</option>
                            <option value="saab">enthusiasm</option>
                        </select>

                        <li>Your friend should be a?</li>
                        <select>
                            <option value="home">Male</option>
                            <option value="saab">Female</option>
                            <option value="saab">Doesn't Matter</option>
                        </select>

                        <li>After work/school I usually:
                        </li>
                        <select>
                            <option value="home">work</option>
                            <option value="saab">sleep</option>
                            <option value="saab">  study</option>
                            <option value="saab">shop</option>
                            <option value="saab">hang out</option>
                        </select>

                        <li>The best way for someone to notice you is:
                        </li>
                        <select>
                            <option value="saab"> smile and wink</option>

                            <option value="home">introduce yourself</option>

                            <option value="saab">have a friend introduce you</option>
                            <option value="saab"> do the worm in the hall</option>
                        </select>




                    </ol>

                    <!-- new form end -->
                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                    <div class="clearfix">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                </div>

            </div>
</main>
<footer>
    <div class="footer_left" >
        <h1>eFriend</h1>
    </div>
    <div class="footer_right" >
        <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/PLACEHOLDER"><img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png" border=0></a>
        <a target="_blank" title="follow me on Twitter" href="http://www.twitter.com/PLACEHOLDER"><img alt="follow me on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter30x30.png" border=0></a>
        <a target="_blank" title="follow me on instagram" href="http://www.instagram.com/PLACEHOLDER"><img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png" border=0></a>
    </div>
    <div class="footer_below" >
        <h5>Copyright &copy; 2017 &bull; All rights reserved &bull; Music&me.com</h5>
    </div>
</footer>
</body>
</html>

