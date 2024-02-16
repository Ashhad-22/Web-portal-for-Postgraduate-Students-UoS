<script type='text/javascript'>
    $(document).ready(function () {
        $('#searchRecord').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "add_Marks.php",
                data: $('#displayData').serialize(),
                dataType: "html",
                success: function (response) {
                    
                }
            });
        })
})

</script>