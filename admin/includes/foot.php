<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $(document).ready(function() {
    $("#summernote").summernote();
    $('.dropdown-toggle').dropdown();
  });

  $('#summernote').summernote({
    placeholder: 'Hello Bootstrap 5',
    height: 300
  });
</script>
<!-- //Summernote JS - CDN Link -->
<script src="js/main.js"></script>
</body>

</html>