<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<include href="/views/includes/head-include.php" />

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
                        <div class="col-md-12 col-sm-12 col-sm-12 defaultbackgroundcolor myborder" >
                            <h3><p class="paragraphIndent">The internet is abuzz with our blog content.</p></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-sm-12 defaultbackgroundcolor myborder" >
                            <p class="paragraphIndent">
                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                        <div class="col-md-12 col-sm-12 col-sm-12 defaultbackgroundcolor  " >
                            <h3><p class="paragraphIndent">Hear what others are saying about us!</p></h3>
                            <p class="paragraphIndent2">
                                "laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem" - long time user Sally Nguyen<BR><BR>
                                "aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto" - blog contributer Terry Stone<BR><BR>
                            </p>

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


