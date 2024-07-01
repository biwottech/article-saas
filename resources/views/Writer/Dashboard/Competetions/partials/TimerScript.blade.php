<script type="text/javascript">
$(document).ready(function() {

    // Set the date we're counting down to
    var countDownDate = new Date("<?php echo date('M d Y',strtotime($competetion->ending_date));?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        $('#year').text("<?php echo date('d-M-Y',strtotime($competetion->ending_date));?>");

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "TIMES OVER";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    url: "<?php echo route('EndCompetetion') ?>",
                    type: 'POST',
                })
                .done(function(e) {
                    console.log(e);
                })
                .fail(function(e) {
                    console.log("error");
                });
        }
    }, 1000);
});

</script>
