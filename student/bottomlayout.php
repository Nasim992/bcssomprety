       <!-- Footer -->
       <?php include '../footer.php'?>

       <!-- Optional JavaScript; choose one of the two! -->
       <!-- Option 1: Bootstrap Bundle with Popper -->
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
           integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
       </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
           integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg=="
           crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
       </script>

       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
           integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
       </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
           integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
       </script>
       <script type="text/javascript"
           src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js">
       </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"
           integrity="sha512-hlLgIh4nncb2yc4YPtWk5wOykcFxF0fBd5rHfJ6xsALI2khY3H8LbivswJE5Fpz7hws7CJCqOzdyjWHiKJYl+A=="
           crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src = "/js/application.js"></script>
       <script>
        //    Function Handle Change 
        function handleChange() {
            const freeValue = document.getElementById('course_free').checked;
            if (freeValue) {
                document.getElementById('payment_amount').disabled = true;
                document.getElementById('payment_amount').required = true;
            }
        }
        // Functions Handle Change Paid
        function handleChangePaid() {
            const paidValue = document.getElementById('course_paid').checked;
            if (paidValue) {
                document.getElementById('payment_amount').disabled = false;
            }
        }
        $(document).ready(function() {
            $('#table_id').DataTable({
                ordering: false
            });
        });
        // Hiding Messages
        $("#message").show();
        setTimeout(function() {
            $("#message").hide();
        }, 5000);

        // Get Current Time and Date
        $('#picker').datetimepicker({
            timepicker: true,
            datepicker: true,
            format: `Y-m-d h:m A`,
            formatTime: 'g:i a',
            step: 5,
            minDate: 0,
            validateOnBlur: false,
            useCurrent: false
        })

        // Modal Pop-up Showing Section
        $(document).ready(function() {
            $("#staticBackdrop").modal('show');
        });
       </script>
       <script>
           $(".start_exam_btn").on('click', function(){
        $('.start_exam_btn').hide();
        $('.exam_script').show();
        $('.exam_timer').show();

        let min = parseInt(document.getElementById('exam_duration').getAttribute('data-value')) ;
        let totalSec = min * 60 * 1000;
        let intervalVar = setInterval(intervalTimer, 1000);

        min--;
        function intervalTimer() {
            totalSec--;
            let sec = totalSec % 60;
            if(totalSec == 0){
                clearInterval(intervalVar);
            }
            document.getElementById("mins").innerHTML = min;
            document.getElementById("secs").innerHTML = sec;
            if(sec == 0){
                min--;
            }
        }

        setTimeout(function(){
            document.getElementById('new_model_test_form').click();
        }, totalSec);
    });

       </script>
       

       </body>

       </html>