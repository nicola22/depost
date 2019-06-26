<!-- Hier wird die Seite gemacht, wo man das Passwort ändern kann. -->
<main>
    <h1 class = "ueberschrift">Passwort ändern</h1>
    <p>Hier kannst du das Passwort ändern.</p>
    <form class="passwortform" action="passwortaendern" method = "post">
        <input class="passwort" type="password" name="pw1" placeholder="Neues Passwort*">
        <br>
        <input class="passwort" type="password" name="pw2" placeholder="Passwort Wiederholen*">
        <br>
        <input id="passwortsubmit" class="passwort" type="submit" name="submit" value="ändern">
    </form>
    <div class="passwortimg"></div>
</main>