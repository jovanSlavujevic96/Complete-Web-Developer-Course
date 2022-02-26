<!--
    THIS PART IS COMMON FOR ALL PAGES:
    index.php
    loggedinpage.php
-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Added because of AJAX, beacuse slim.min from abvoe does not support it -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script type="text/javascript">
        $(".toggle-form").click(function() {
            $("#signUpForm").toggle();
            $("#logInForm").toggle();
        });

        //setup before functions
        var typingTimer;                //timer identifier
        var doneTypingInterval = 1000;  //time in ms (1 second)

        //on keyup, start the countdown
        $('#diary').bind('input propertychange', function() {
            clearTimeout(typingTimer);
            if ($('#diary').val()) {
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            }
        });

        //user is "finished typing," do something
        function doneTyping () {
            /* update diary on database */
            $.ajax({
                method: "POST",
                url: "updatedatabase.php",
                data: {content: $("#diary").val()}
                error: function() {
                    alert("Error during the update");
                }
            });
        }

    </script>
</body>
</html>
