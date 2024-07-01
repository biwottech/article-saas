<!--begin::If this is not User Article-->
@if($article->user_id !== Auth::user()->id)
<!--begin::User Has Joined-->
@if(Student::hasJoined())
<!--begin::User Has Rated Already-->
@if(!(Student::RatedArticle($article->id)))
<!--begin::User Rating Limit-->
@if(Student::RatingLimit())
<script type="text/javascript">
$(document).ready(function() {
    /*Start Ratings*/
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });
    }).on('mouseout', function() {
        $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
        });
    });

    /* 2. Action to perform on click */
    $('#stars li').on('click', function() {

        var onStar = parseInt($(this).data('value'), 6);
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }
        //console.log(onStar);
        $.ajax({
                url: "<?php echo route('WriterRateArticle',[1,$article->id]); ?>",
                type: 'GET',
                data: { ratings: onStar },
            })
            .done(function(e) {
                $('#stars').text("You have Rated " + onStar + " Starts");
            })
            .fail(function(e) {
                console.log(e);
            });
    });
});

</script>
@endif
<!--begin::User Rating Limit-->
@endif
<!--end::User Has Rated Already-->
@endif
<!--end::User Has Joined-->
@endif
<!--end::If this is not User Article-->
