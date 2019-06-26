<!-- Hier wird der Button erstellt, mit welchen man zurück zu dem Anfang kommt erstellt.-->
<main>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Zum Seitenanfang</button>
    <script>
        // Wenn 30px nach unten gescrollt werden, erscheint der button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 23) {
            document.getElementById("myBtn").style.display = "block";
        } 
        else 
        {
            document.getElementById("myBtn").style.display = "none";
        }
        }

        // Wenn auf den Button geklickt wird, zurück zum Anfang des Dokuments
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
    </script>
</main>