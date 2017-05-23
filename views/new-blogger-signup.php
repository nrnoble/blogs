<?php session_start();
echo "test";
print_r($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<include href="/views/includes/head-include.php" />


<style>
    .intent1{
        margin-top: 75px;
        margin-left: 50px;
    }

    .startbutton {
        margin-left: 60px;
        margin-top: 20px;
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
                    <!--                        <include href="/views/includes/cols-include.php" />-->
                    <div class="col-md-6 col-sm6 col-sm-12 defaultbackgroundcolor " >
                        <h1><p class="paragraphIndent">Become a Blogger!</p></h1>
                        <h3><p class="paragraphIndent">Create a new account below</p></h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-sm-12 defaultbackgroundcolor " >
<!--                        <h1><p class="paragraphIndent">Logo</p></h1>-->
                        <img src="/328/blogs/images/notepad.PNG">
                    </div>
<!--                    <include href="/views/includes/emptyrow-include.php" />-->

                <div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-sm-12 defaultbackgroundcolor intent1">
                        {{ @signinError }}
                        <form action="/328/blogs/loginhandler" method="post" enctype="multipart/form-data">
                            <input type="text" name="firstname" id="firstnameID" class="inline numbersOnly" value = "bob">
                            <label class="control-label">First Name</label><BR>
                            <input type="text" name="lastname" id="lastnameID" class="inline numbersOnly" value = "johnson">
                            <label class="control-label">Last Name</label><BR>
                            <input type="text" name="blogger" id="bloggerID" class="inline numbersOnly" value = "bjohnson">
                            <label class="control-label">Username</label><BR>
                            <input type="password" name="password" id="passwordID" class=" inline numbersOnly" value = "J$p1ter2">
                            <label class="control-label">Password</label><br>
                            <input type="password"  name="password" id=verifyID" class=" inline numbersOnly" value = "J$p1ter2">
                            <label class="control-label">Verify</label><br>

                            <input type="submit" id="idimageSummit" class=" btn btn-primary startbutton" value="Start Blogging" name="submit" >
                        </form>
                    </div>
                    <div class="col-md-5 col-sm-5 col-sm-12 defaultbackgroundcolor" >

                        above
<!--                        --><?php //echo '$_SESSION[\'imagePath\']' . $_SESSION['imagePath']; ?>


                        <img src="/328/blogs/{{ @imagepath }}" class ="protrait">-->

<!--                        <check if = "@imagepath != null">-->
<!--                            <true>-->
<!--                                true-->
<!--                                <img src="/328/blogs/profile_images/defaultprofileimage.jpg">-->
<!--                            </true>-->
<!--                            <false>-->
<!--                                false {{@imagepath }}-->
<!--<!--                                -->--><?php ////echo 'test $_SESSION[\'imagePath\']' . $_SESSION['imagePath']; ?>
<!--                                <img src="/328/blog" --><?php //echo $_SESSION['imagePath'] ?><!-- >-->
<!--                            </false>-->
<!--                        </check>-->

                        <form action="/328/blogs/upload" method="post" enctype="multipart/form-data">
                            <label class="control-label">Change your profile picture</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-primary inline " style="width: 50%">
                            <input type="submit" id="idimageSummit" class="inline btn btn-primary"  value="Upload Image" name="submit">
                        </form>
                    </div>

                    {{ @test22 }}
                    {{ @files }}


                </div>
                <!--                    </div>-->
            </div>
        </div>
        <hr>
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




