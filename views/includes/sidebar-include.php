
<div class="align-top col-md-2 col-sm-2 col-sm-12 alignleft defaultbackgroundcolor pageheight">
    <img class = "align-top" src="/328/blogs/images/blogsite.JPG" alt="logo">
    <a href="/328/blogs/">Home ></a><BR>

    <check if ="{{ @signedin == 'true'}}">
        <true>
            <a href="/328/blogs/signup"> Create Blog ></a><BR>
        </true>
        <false>
            <a href="/328/blogs/signup">Become a Blogger ></a><BR>
        </false>
    </check>

    <a href="/328/blogs/about">About Us ></a><BR>

    <check if ="{{ @signedin == 'true'}}">
        <true>
            <a href="/328/blogs/signout">Log out ></a><BR>
        </true>
        <false>
            <a href="/328/blogs/signin">log in></a><BR>
        </false>
    </check>

</div>