<!DOCTYPE html>
<html lang="en">

<include href="/views/includes/head-include.php" />

<!--TODO: Move all styles to styles.css-->
    <style>
        .submitbutton {
            margin-left: 60px;
            margin-top: 20px;
        }
        .formmargin {
            margin-top: 75px;
            margin-left: 100px;
        }
    </style>

<body>

<header class="bgimage">
    <div class="container">
        <div class="row">

            <include href="/views/includes/navbar-include.php" />

        </div>
        <div class="row">

            <include href="/views/includes/sidebar-include.php" />

            <div class="col-md-10 col-sm-10 col-sm-12 defaultbackgroundcolor" >

                <!--                <div class="container" >-->
                <div class="row pageheight" >
<!--             <include href="/views/includes/cols-include.php" />-->
                    <div class="col-md-6 col-sm-6 col-sm-12 defaultbackgroundcolor " >
                        <h1><p class="paragraphIndent">Welcome Back!</p></h1>
                        <h3><p class="paragraphIndent">Register blogger log in below!</p></h3>
                        <p class="paragraphIndent">To become a blogger, Register here: <a href="/328/blogs/signup">Free registration</a></p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-sm-12 defaultbackgroundcolor " >
                        <!--                        <h1><p class="paragraphIndent">Logo</p></h1>-->
                        <img src="/328/blogs/images/lock.PNG">
                    </div>

<!--                    <include href="/views/includes/emptyrow-include.php" />-->

                    <div class="col-md-12 col-sm-12 col-sm-12 defaultbackgroundcolor formmargin" >
                        {{ @signinError }}
                        <form action="/328/blogs/loginhandler" method="post" enctype="multipart/form-data">
                            <input type="text" name="blogger" id="bloggerID" class="inline numbersOnly" value = "bjohnson">
                            <label class="control-label">Username</label><BR>
                            <input type="text" name="password" id="passwordID" class=" inline numbersOnly" value = "J$p1ter2">
                            <label class="control-label">Password</label><br>

                            <input type="submit" id="idimageSummit" class=" btn btn-primary submitbutton" value="Log In" name="submit">
                        </form>
                    </div>
                    <div class="col-md-12 col-sm-12 col-sm-12 defaultbackgroundcolor  " >


                    </div>



                </div>
                <!--                    </div>-->
            </div>
        </div>

        <!--            <img src ="./images/blogsiteimage.jpg">-->
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <include href="/views/includes/pagefooter-include.php" />
        </div>
    </div>
    </div>


</header>

<script>
    //    [0-9\-\(\)\s]+

    $('.numbersOnly').returnValue(function () {
        if (this.value != this.value.match(/^[a-zA-Z\-]+$/, '')) {
            this.value = this.value.replace (/^[a-zA-Z\-]+$/, '');
        }
    });

</script>

<SCRIPT>
    $('.phoneNumberFilter').keyup(function () {
        if (this.value != this.value.match(/^[a-zA-Z\-]+$, '')) {
            this.value = this.value.replace (/^[a-zA-Z\-]+$/, '');
        }
    });
</SCRIPT>



<include href="/views/includes/libraryscripts-include.php" />

</body>
</html>




