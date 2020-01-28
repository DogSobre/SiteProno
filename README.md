-------------------------------------------------- SiteProno --------------------------------------------------


----- indexLogin -----


The indexLogin is the first page of our website. The visitor must need to be connected with he's collaborator email. Use is very simple:

-> <body>...</body> :
    -> <header>...</header> :
        The <header>...</header> does not have anything complicated, just an <a href=""> who refer to the mother web site cse-marketpay.fr .
    -> <section>...</section> :
        The section has a <form>...</form> for the SEO(referencing in google). Inside this <form>...</form> we have a <table>...</table>:
        -> <table>...</table>:
            The table is consitued first by rows <tr>...</tr> and inside cells <td>...</td> who behave like columns.
            We choose this system to make easier the alignement of rows.
            Basically this page just have 2 <inputs> and one <button>:
                - <input type="email"> is to enter your collaborator email.
                - <input type="password"> is to enter your password from your collaborator account.
                - <button> ... </button> :  the button tag convert on button any things inside. So into the button we put inside an <a href="..."> who refer to the main index of the web site indexAccueil.html.
        We shut in the <form>...</form> into a <center>...</center> tag tog align the <table>...</table> with Y axe.
    -> <footer>...</footer> :
        Finally, the <footer>...</footer> to put here the Copyright (©).


----- indexAccueil -----


The indexAccueil is a little bit more complicated than indexLogin. The visitor arrived to the main menu and can see all of the website with just a look. He can see the rules, the ranking, the match of the day and the rewards.

-> <body>...</body> :
    -> <header>...</header> :
        This <header>...</header> is different form the <header>...</header> of the indexLogin. Indeed we meet again the logo with the <a href=""> but we can see a new tag :
        -> <nav>...</nav> :
            The <nav>...</nav> allow us to make the responsive navition bar. Into this nav we make a list <li>...</li> with the differents links : indexAccueil ; indexClassement ; indexCalendrier ; indexParis ; indexRewards.
    -> <section>...</section> :
        This <section>...</section> is divided into two parts :
        -> <aside class="g1">...</aside> :
            It's the first part of our <section>...</section>. Into dis class we input the first part of the _"carrousel"_(1) . We put into 3 <div>...</div> 3 differents picture and each of them has an <a href="">.
        -> <article class="g2Conteneur">...</article> :
            Is the real body of this page of our website. Into this <article>...</article> we write the rules. And with the CSS we made sure this tag bigger than the rest.
    -> <footer>...</footer> :
        We put the Copyright (©) into the <footer>...</footer>.

-> <script>...</script> :
    In the <script>...</script> we put the secont part of ouf _"carrousel"_(2), how did you see, it's writed on JavaScript. It's only one function who pemite us to slide the different pictures of the <aside>...</aside>:
        This function take the picture, affects a number to the picture (start at 0), and increment + 1 to the picture. But as we have a variable  i = 0, if "i" is under the number of the picture we move on the next one after x time exemple :
            <script>
                var picture = 0;
                var i = 0; 
            </script>
        The two varibales start at 0, so we can start. We put ++ into the picture so :
            <script>
                var picture = 1;
                var i = 0;
            </script>
        As "i" is under "picture", we put ++ into "i".
            <script>
                var picture = 1;
                var i = 1;
            </script>
        And we can repeat this <script>...</script> x times.


----- indexClassement -----


The indexClassement is same like indexAccueil for few things. For exemple the header is the same.

-> <body>...</body> :
    -> <header>...</header> :
        This <header>...</header> is exactly the same than indexAccueil :
        -> <nav>...</nav> :
            The <nav>...</nav> allow us to make the responsive navition bar. Into this nav we make a list <li>...</li> with the differents links : indexAccueil ; indexClassement ; indexCalendrier ; indexParis ; indexRewards.
    -> <section>...</section> :
        ==>> Actually the <section>...</section> is on WIP phase : <<==
    -> <footer>...</footer> :
        We put the Copyright (©) into the <footer>...</footer>.
     

----- indexCalendrier -----

The indexCalendrier is gonna be same like the indexClassement. Indeed, the top nav and basically the functionalities of this page are simple. In this page you can consult the calendar for the next matches during the Euro 2020.
The <header> is the same for the rest of website :

-> <body>...</body> :
    -> <header>...</header> :
        This <header>...</header> is exactly the same than indexAccueil :
        -> <nav>...</nav> :
            The <nav>...</nav> allow us to make the responsive navition bar. Into this nav we make a list <li>...</li> with the differents links : indexAccueil ; indexClassement ; indexCalendrier ; indexParis ; indexRewards.

The only differences in the rest of the pages are the section :

-> <body>...</body> :
    -> <section>...</body> :
        ==>> Actually the <section>...</section> is on WIP phase : <<==

And the <footer>, the same for the all website :

-> <body>...</body> :
    -> <footer>...</footer> :
        We put the Copyright (©) into the <footer>...</footer>


----- indexParis -----

In the indexParis, the user can bet on the team he thinks will win.

-> <header>...</header> :
    Refer you to the previous explications.
-> <section>...</section> :
    ==>> Actually the <section>...</section> is on WIP phase : <<==
-> <footer>...</footer> :
    Refer you to the previous explications.


----- indexRewards -----


In the rewards page, the user can consult the differents rewards for the winners. To see what he can win, the user must be motivated to play at our Euro2020 game. And in function of his rank too, he can see what he can win. Another time, many similarities than the rest of the website pages.

-> <header>...</header> :
    Refer you to the previous explications.
-> <section>...</section> :
    ==>> Actually the <section>...</section> is on WIP phase : <<==
-> <footer>...</footer> :
    Refer you to the previous explications.