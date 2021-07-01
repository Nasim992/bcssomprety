       <!-- Footer -->
       <?php include '../footer.php'?>

       <!-- Optional JavaScript; choose one of the two! -->
       <!-- Option 1: Bootstrap Bundle with Popper -->
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
           integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
       </script>
       <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
       </script>

       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
           integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
       </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
           integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
       </script>
       <script>
function handleChange() {
    const freeValue = document.getElementById('course_free').checked;
    if (freeValue) {
        document.getElementById('payment_amount').disabled = true;
        document.getElementById('payment_amount').required = true;
    }
}

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
       </script>

       </body>

       </html>