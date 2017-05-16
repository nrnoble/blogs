<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--                                                        -->
<!--    Neal Noble                                          -->
<!--    Course: IT 328 - Full-Stack Web Development         -->
<!--    Assignment: Blogs                                   -->
<!--    May 2017                                            -->
<!--    Instructor: Tina Ostrander                          -->
<!--                                                        -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/328/blogs/css/styles.css">
<!--    <link rel="stylesheet" type="text/css" href="./styles/signupstyles.css">-->

    <style>
        .profileimage{

            width: 214px;
            height: 317px;

        }

        .alignleft {
            float:left;
        }

        .alignright{
            float:right;
        }


    </style>



    <title>Blogs</title>

</head>

<body>

<header class="bgimage">
    <div class="container">
        <div class="row">
            <h2>BLOGS</h2>
            <hr>

            <repeat group="{{ @bloggers }}" value="{{ @blogger}}">

                <div class="col-md-3 col-sm-6 col-sm-12" >
                    <div>
                        <image src="/328/blogs/profile_images/{{ trim(@blogger['profileimage']) }}" class="profileimage dropshadowing" >
                        <h3>{{ trim(@blogger['firstname']) }}   {{ trim(@blogger['lastname']) }}</h3>
                            <hr>
                            <span class ="alignleft"><a href="">view blogs</a></span><span class="alignright">total: 10</span><br>
                            <hr>
                            {{ trim(@blogger['bio']) }}<br>
                    </div>
                </div>
            </repeat>


<!--            <div class="col-md-3 col-sm-6 col-sm-12">-->
<!--                <div>-->
<!--                    <h2>{{ trim(@fruit) }}</h2>-->
<!--                    text-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->

<!--            <div class="col-md-3 col-sm-6 col-sm-12">-->
<!--                <div>-->
<!--                    <h2>Column three</h2>-->
<!--                    text-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--            <div class="col-md-3 col-sm-6 col-sm-12">-->
<!--                <div>-->
<!--                    <h2>Column four</h2>-->
<!--                    text-->
<!---->
<!--                </div>-->
<!---->
            </div>

            <hr>
            <h2>page Footer Goes here</h2>
        </div>
    </div>
</header>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>




