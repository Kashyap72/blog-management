 
        <footer class="footer text-center">
          All Rights Reserved 
        </footer>
      </div>
    </div>    
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/jquery/dist/jquery.min.js"></script>

    
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/extra-libs/sparkline/sparkline.js"></script>

    
    <script src="<?= BASE_URL; ?>assets/admin/dist/js/waves.js"></script>

    
    <script src="<?= BASE_URL; ?>assets/admin/dist/js/sidebarmenu.js"></script>

    
    <script src="<?= BASE_URL; ?>assets/admin/dist/js/custom.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/flot/excanvas.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
      $("#zero_config").DataTable();
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#long_description'), {
            toolbar: [
                'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', 'blockQuote', 'link', 
                'bulletedList', 'numberedList', 'imageUpload', 'mediaEmbed', 'insertTable', 
                'tableColumn', 'tableRow', 'mergeTableCells', 'undo', 'redo', 'alignment', 
                'fontColor', 'fontBackgroundColor', 'fontSize', 'fontFamily', 'highlight', 
                'horizontalLine', 'pageBreak', 'removeFormat', 'specialCharacters', 
                'subscript', 'superscript', 'todoList', 'code', 'codeBlock'
            ],
            image: {
                toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
            },
            table: {
                contentToolbar: [
                    'tableColumn', 'tableRow', 'mergeTableCells'
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
  </body>
</html>
