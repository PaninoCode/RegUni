<title><?php echo "Attività Formative - RegUni" ?></title>
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Attività Formative</h2>
        <button type="button" class="btn btn-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
        </button>
    </div>
    <hr>
</div>
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Nome</th>
                <th>CFU</th>
                <th>Settore</th>
                <th>TAF/Ambito</th>
                <th>Ore Tot.</th>
                <th>Ore Lez.</th>
                <th>Ore Lab.</th>
                <th>Ore Tir.</th>
                <th>Tipo Insegnamento</th>
                <th>Periodo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "api/getActivities.php",
            type: "GET",
            success: function(data) {
                $("#table_body").html(data);
            }
        });
    });

    function startDelete(id, name) {
        if (window.confirm("Sei sicuro di voler eliminare l'attività selezionata? \n ID: " + id + " \n Nome: " + name + " \n Questa operazione è irreversibile!")) {
            $.ajax({
            url: "api/deleteActivity.php",
            type: "POST",
            data: {
                id: id
            },
            success: function(data) {
                if (data == "success") {
                    $.ajax({
                        url: "api/getActivities.php",
                        type: "GET",
                        success: function(data) {
                            $("#table_body").html(data);
                        }
                    });
                    alert("Attività eliminata con successo.");
                } else {
                    alert("Errore durante l'eliminazione dell'attività.");
                }
            }
        });
        }
    }
</script>