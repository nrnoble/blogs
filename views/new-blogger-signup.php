<?php session_start() ?>

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
    .chooserbutton{
        style="width: 50%"
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
                        <form action="/328/blogs/add" method="post" enctype="multipart/form-data">
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
<!--                        </form>-->
                    </div>
                    <div class="col-md-5 col-sm-5 col-sm-12 defaultbackgroundcolor" >

                        <img src="/328/blogs/{{ @imagepath }}" class ="protrait">

                        <form action="/328/blogs/upload" method="post" enctype="multipart/form-data">
                            <label class="control-label">Change your profile picture</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-primary inline chooserbutton" >
                            <input type="submit" id="idimageSummit" class="inline btn btn-primary"  value="Upload Image" name="submit">
                        </form>

                    <BR><BR>
                        <label for="bio">Biography</label>
                        <textarea class="form-control" name="bio" id="bio" rows="7">{{ @bio }}</textarea>
                    </div>
<!--                    <div class="wrapper profilepagenextbutton">-->
<!--                        <input type="submit" class="bet_time btn btn-primary" value="Next >">-->
<!--                    </div>-->

                </div>
                </div>

                       </form>

                    </div>


                </div>

            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <include href="/views/includes/pagefooter-include.php" />
        </div>
    </div>
    </div>


</header>





<include href="/views/includes/libraryscripts-include.php" />

</body>
</html>




