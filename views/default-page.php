<!DOCTYPE html>
<html lang="en">

<include href="/views/includes/head-include.php" />

<body>

<header class="bgimage">
    <div class="container">
        <div class="row">

            <include href="/views/includes/navbar-include.php" />

        </div>
        <div class="">

            <include href="/views/includes/sidebar-include.php" />

            <div class="col-md-10 col-sm-10 col-sm-12" >

                <div class="container">
                    <div class="row">

                    <repeat group="{{ @bloggers }}" value="{{ @blogger }}">

                        <div class="col-md-3 col-sm-6 col-sm-12" >
                            <div>
                                <img src="/328/blogs/profile_images/{{ trim(@blogger['profileimage']) }}" class="profileimage dropshadowing" alt="profile image" >
                                <h3>{{ trim(@blogger['firstname']) }}   {{ trim(@blogger['lastname']) }}</h3>
                                    <hr>
                                    <span class ="alignleft"><a href="">view blogs</a></span><span class="alignright">total: 10</span><br>
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




