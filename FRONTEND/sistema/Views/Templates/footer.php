<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= MAP_KEY ?>&callback=initMap&v=weekly" defer></script>

<script>
    const base_url = "<?= base_url() ?>";
</script>


<!-- Functions js -->
<?php
if (isset($data) && isset($data->page_functions_js)) {
?>
    <!-- Functions js -->
    <script src="<?= media() ?>/js/pages/<?= $data->page_functions_js ?>"></script>
<?php
}
?>