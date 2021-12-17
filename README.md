# CMS-Projects

In this project I'm trying to make CMS of my own. The main reason I'm doing this project is to grow my own knowledge in PHP, building something from streatch will help me in long run.

### So What Going On
<hr>

What I first did is added template from wrapbootstrap for cms projects. I don't want to spend my time on buiding degine in HTML, CSS and JAVASCRIPT so I basily skip that.
After that I made database in phpmyadmin with name CMS and made table category inside CMS.
Also I will use API called MYSQLI.

- I connect with database in another way by using array. It was really great experiences.

For my blog post I created table posts in database. And for now I just insert data directly in database and just call that data. I also used while loop so if just insert new data in table post then it will create new blog or post in my website.

Now it's time to serach somethings in search table. So, I can do here is make a form so it can feed to database.

#### COOL
<hr>

So while duing this project I found query that will help to search. 

$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";

So, This query will basily look for the specific tag that we put in our database. 

### So What Going On
<hr>

Today is 28/11/2021 and I finally complete the index.php of home page. Now its time start with Admin section. This is start of another hard challenge but I know it will help in long run. So, let's this party started.

I did little bit of refactoring so it will me to understand the code. Made a includes folder in Admin folder. Inside their is file called footer, navigation, header .php. 


enctype="multipart/form-data"

move_uploaded_file($postImageTemp, "../img/$postImage");

$postImageTemp =  $_FILES['image']['tmp_name'];

Query Error You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'portfolio, 'hi', 'shreejan' , now(), '', 'hi', 'html, css', 'draft' )' at line 1
$query .= "VALUES('{$postCategoryId}', '{$postTitle}', '{$author}' , now(), '{$postImage}', '{$postContent}', '{$postTags}', '{$postStatus}' ) "; =>forgot '' on first












                

