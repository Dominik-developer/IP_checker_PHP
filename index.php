<!DOCTYPE html>

<?php

include_once 'algo.php';

// Collect the IP address
$ip_address = getIPaddress();

// Check the IP address in the database
$respond = IPchecker($ip_address);

?>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP checker</title>

    <!-- BaseFrame CSS library  -->
    <link rel="stylesheet" type="text/css" href="https://dominik-developer.github.io/BaseFrame_CSS_library/index.css"> 

    <!-- project CSS stylesheet -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1><!--Witamy na stronie weryfikacji IP-->Welcome to the IP verification page</h1>
    </header>

    <?php if ($respond == 'pass'): /* access granted */ ?>
        <main>
            <h2><!--Witam, dostęp przyznany!-->Hello, access granted!</h2>
            <section id="content">
                <!--<div class="intro">
                    <h3>Wprowadzenie do tematu/Intruduction to the topic</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius, felis et hendrerit fermentum, odio purus fringilla metus, ac volutpat neque justo sit amet justo.</p>
                </div>-->

                <article class="main-article">
                    <h3><!--Artykuł--> Article 1</h3>
                    <p>Nullam euismod dui nec felis auctor, a bibendum urna efficitur. Vivamus hendrerit risus et ex aliquam, eu tincidunt eros suscipit. Morbi ut consequat elit, nec efficitur augue.</p>
                </article>

                <article class="main-article">
                    <h3><!--Artykuł--> Article 2</h3>
                    <p>Maecenas suscipit ante felis, non iaculis purus faucibus et. Proin ac justo ac risus sagittis eleifend sed at ante. Ut facilisis turpis nec nulla varius, et tempus sapien varius.</p>
                </article>

                <article class="main-article">
                    <h3><!--Artykuł--> Article 3</h3>
                    <p>Fusce volutpat sem eu orci posuere, a euismod libero auctor. Nam tincidunt felis sed mi tempor, non tincidunt lorem gravida. Quisque mollis nunc ut leo ullamcorper, id efficitur purus ullamcorper.</p>
                </article>
            </section>
        </main>
    <?php elseif ($respond == 'block'): /* access blocked */ ?> 
        <main>
            <h2><!--Dostęp zablokowany-->Access blocked</h2>
            <section id="content">
                <p><!--Twoje IP zostało zablokowane. Jeśli uważasz, że to błąd, prosimy o kontakt z administratorem systemu. Odwołania można składać przez naszą stronę kontaktową: <a href="#">formularz kontaktowy</a>.-->Your IP has been blocked. If you think this is a mistake, please contact your system administrator. Appeals can be submitted through our contact page: <a href="#">contact form.</a></p>
                <p><!--Proszę pamiętać, że zablokowanie dostępu może wynikać z naruszenia naszych zasad użytkowania. Skontaktuj się z nami, aby wyjaśnić sytuację.-->Please note that blocking access may result from a violation of our terms of use. Contact us to clarify the situation.</p>
            </section>
        </main>
        <?php else: /* error*/ ?>
        <main>
            <h2><!--Błąd w systemie-->Error in the system</h2>
            <section id="content">
                <p><!--Wystąpił problem podczas weryfikacji twojego adresu IP. Nasz system sprawdzający napotkał błąd, przez co nie możemy potwierdzić twojego statusu w tej chwili.-->There was a problem verifying your IP address. Our verification system has encountered an error, so we cannot confirm your status at this time.</p>
                <p><!--Prosimy spróbować ponownie później. Jeśli problem się powtarza, prosimy o kontakt z naszym zespołem wsparcia technicznego.-->Please try again later. If the problem persists, please contact our technical support team.</p>
                <p><!--by zgłosić problem, skontaktuj się z nami przez nasz formularz kontaktowy: <a href="#">formularz kontaktowy</a>.-->To report a problem, contact us via our contact form: <a href="#">contact form.</a></p>
            </section>
        </main>
    <?php endif; ?>
    
    <footer>
        <p>&copy; <!--2024 Firma XYZ. Wszystkie prawa zastrzeżone.--> <?php echo date('Y'); ?> XYZ Company. All rights reserved.</p>
    </footer>
</body>
</html>