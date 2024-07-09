</div>
</div>


<script>
    $(document).ready(function () {
        $("#tabla_id").DataTable({
            "pageLength": 10,
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50]
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
            }
        });
    });
</script>



</body>

</html>