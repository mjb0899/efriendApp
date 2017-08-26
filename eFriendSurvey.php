

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>eFriend</title>
    <!--MENUBAR CSS-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">







    <!--NEW ADDED-->
    <title>jQuery UI Slider - Range slider</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 18,
                max: 100,
                values: [ 25, 60 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
                " - " + $( "#slider-range" ).slider( "values", 1 ) );
        } );
    </script>


    <!--NEW XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXADDED-->










    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style type="text/css">
        textarea[name=bio] {
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
    <script>
    //   $(document).ready(function () {
    //        $("submit").click(function () {
    //            var like1 =document.getElementById('like1').value;
    //            var like2 =document.getElementById('like2').value;
    //           var like3 =document.getElementById('like3').value;
    //            var like4 =document.getElementById('like4').value;
    //            var like5 =document.getElementById('like5').value;
    //            document.getElementById('likes').value=like1+'#'+like2+'#'+like3+'#'+like4+'#'+like5;
   //        })
    //    })

    </script>

    <script type="text/javascript">
        function join_ym()
        {
            var like1 =document.getElementById('like1').value;
            var like2 =document.getElementById('like2').value;
            var like3 =document.getElementById('like3').value;
            var like4 =document.getElementById('like4').value;
            var like5 =document.getElementById('like5').value;
            document.getElementById('likes').value=like1+'#'+like2+'#'+like3+'#'+like4+'#'+like5;
        //    alert(document.getElementById('likes').value);
        }
    </script>


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
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <a class="navbar-brand menu_logo" href="#" >One Last Step...</a>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="wrapper_reg">

        <form action="searchMatrix.php" method="post" style="width: 80%;margin: auto;">
            <div class="container_reg2">
                <div class="header_div">
                    <h2>  Let's Find You a match </h2>
                </div>
                <div >





                    <!--New form-->
                    <ol>
                        <li>What type of person will you claim yourself to be?</li>
                        <div class="form-group ">
                        <select class="form-control" name="type">
                            <option value="_5">Introvert</option>
                            <option value="_6">Extrovert</option>

                        </select>
                        </div>

                <div style="clear: both">
                        <li>List your top five likes/hobbies.</li>
                        <ul>
                            <div class="form-group" >

                            <li><input class="form-control" id="like1" type="text"></li>
                            <li><input class="form-control" id="like2" type="text"></li>
                            <li><input class="form-control"  id="like3" type="text"></li>
                            <li><input class="form-control" id="like4" type="text"></li>
                            <li><input class="form-control" id="like5" type="text"></li>
                            </div>
                        </ul>

                        <input type="hidden" name="likes" id="likes">
                </div>

                        <div style="clear: both" >

                        <li>Create a small bio about something you like?</li> <!--BIO-->
                        <textarea name="bio" rows="5" class="form-control" cols="30" placeholder="Say something here" id="tarea">
                     </textarea>
                        <br>
                        <p>
                            Slide right for a generic auto generated bio
                        </p>
                        <label  class="switch">
                            <input type="checkbox" onclick="document.getElementById('tarea').disabled=this.checked;" >
                            <span class="slider round"></span>
                        </label>
                        </div>

                        <div style="clear: both"  >

                        <!--p/q/r-->
                        <li>What would your ideal weekend be?</li> <!--weekend-->
                        <select class="form-control" name="weekend">
                            <option value="p">Something at home</option>
                            <option value="q">Definitely an outing</option>
                            <option value="r">Take advantage of the empty Library</option>
                            <option value="ss">sleep</option>
                        </select>
                        </div>

                        <div style="clear: both" >

                        <!--a/b/c/d/e/f-->
                        <li>The best thing you have going is:</li><!--self-->
                        <select class="form-control" name="self">
                            <option value="a">incredible intelligence</option>
                            <option value="b">gut splitting  humor</option>
                            <option value="c">amazing honesty</option>
                            <option value="d"> super looks</option>
                            <option value="e">compassionate caring</option>
                            <option value="f">exceptional enthusiasm</option>
                        </select>
                        </div>

                        <div style="clear: both">

                        <!--p/q/r-->
                        <li>After work/school I usually: <!--workmeter-->
                        </li>
                        <select class="form-control" name="workMeter">
                            <option value="ww">work/study</option>
                            <option value="ss">sleep</option>
                            <option value="shop">shop</option>
                            <option value="hh">hang out</option>
                        </select>
                        </div>

                        <div style="clear: both">

                        <li>The best way for someone to notice you is:
                        </li>
                        <select class="form-control" name="approach_game">
                            <option value="v"> smile and wink</option>

                            <option value="w">introduce yourself</option>

                            <option value="x">have a friend introduce you</option>
                            <option value="y"> do the worm in the hall</option>
                        </select>
                        </div>

                        <div style="clear: both">

                        <li>Do you smoke?</li>
                        <select class="form-control" name="smoke">
                            <option value="_1">Yes</option>
                            <option value="_2">No</option>
                        </select>
                        </div>
                        <div style="clear: both">

                        <li>Do you drink?</li>
                        <select class="form-control" name="drink">
                            <option value="_1">Yes</option>
                            <option value="_2">No</option>
                        </select>
                        </div>
                        <div style="clear: both">

                        <li>Would you say you're religious?</li>
                        <select class="form-control" name="religion">
                            <option value="_1">Yes</option>
                            <option value="_2">No</option>
                        </select>
                        </div>
                        <div style="clear: both">

                        <li>Ethnicity?</li>
                        <select class="form-control" name="ethnicity">
                            <option value="g">White</option>
                            <option value="h">Black</option>
                            <option value="i">Asian</option>
                            <option value="j">Mixed</option>
                            <option value="k">Brown</option>
                            <option value="l">Other</option>
                        </select>
                        </div>
                        <div style="clear: both">

                        <li>How would you like to be approached?</li>
                        <select class="form-control" name="approach_wanted">
                            <option value="s">Flirtline</option>
                            <option value="t">Keeping it simple</option>
                            <option value="u">A compliment</option>
                        </select>
                        </div>
                        <!--SEARCH SEX-->

                        <!--SEARCH CRITERIA-->

                        <li>What do you look for first in others?
                        </li>
                        <select class="form-control" name="searchCriteria">
                            <option value="z">doesn't matter</option>
                            <option value="a">intelligence</option>
                            <option value="b">humor</option>
                            <option value="c">honesty</option>
                            <option value="d">looks</option>
                            <option value="e">caring</option>
                            <option value="f">enthusiasm</option>
                        </select>

                        <li>Your friend should be a?</li>
                        <select class="form-control" name="searchSex">
                            <option value="_3">Male</option>
                            <option value="_4">Female</option>
                            <option value="z">Doesn't Matter</option>
                        </select>
                    </ol>


                        <!--PART 2 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXxxxxxx-->
                <h1>PART 2</h1>
                  <ol>
                    <li>Is it okay if your friend/connection smokes?</li>
                    <select class="form-control"  name="searchSmoke">
                        <option value="_1">Yes</option>
                        <option value="_2">No</option>
                    </select>
                    <li>Is it okay if your friend/connection drinks?</li>
                    <select class="form-control" name="searchDrink">
                        <option value="_1">Yes</option>
                        <option value="_2">No</option>
                    </select>
                    <li>Is it okay if your friend/connection is religious?</li>
                    <select class="form-control" name="searchReligion">
                        <option value="_1">Yes</option>
                        <option value="_2">No</option>
                    </select>

                      <!--Select AGE to find people-->
<div class="mySlider">
                      <p>
                          <label for="amount">Search Age:</label>
                          <input type="text" name="ageRange" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;width:5rem;">
                      </p>

                      <div id="slider-range"style="width:20rem;"></div>

</div>








                      <!--UID-->






                  </ol>






                    <!-- new form end -->
                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                    <div class="clearfix">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn" onclick="join_ym();">Sign Up</button>
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

