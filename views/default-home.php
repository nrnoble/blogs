<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<include href="/views/includes/head-include.php" />

<body>

<header class="bgimage ">
    <div class="container defaultbackgroundcolor" >
        <div class="row">

            <include href="/views/includes/navbar-include.php" />
<!--        <script>-->
<!--            alert("banana".substring(2, 5) )-->
<!--        </script>-->

        </div>
        <div class="">

            <include href="/views/includes/sidebar-include.php" />

            <div class="col-md-10 col-sm-10 col-sm-12" >

                <div class="container">
                    <div class="row">

                    <repeat group="{{ @bloggers }}" value="{{ @blogger }}">

                        <div class="col-md-2 col-sm-6 col-sm-12" >
                            <div>
                                <img src="/328/blogs/{{ trim(@blogger['profileimage']) }}" class="profileimage dropshadowing" alt="profile image" >
                                <h3>{{ trim(@blogger['firstname']) }}</h3>
                                    <hr>
<!--                                    TODO: total needs to become a valid count of number of blogs-->
                                    <span class ="alignleft"><a href="">view blogs</a></span><span class="alignright">total: {{ @blogCount }}</span><br>
                                    <hr>
                                    {{ trim(@blogger['bio']) }}<br>
                            </div>
                        </div>
                    </repeat>
                </div>

            </div>
        </div>
            <hr>
            <include href="/views/includes/pagefooter-include.php" />
        </div>
    </div>
</header>
    <include href="/views/includes/libraryscripts-include.php" />

</body>
</html>




