<?php 
if(!empty($_POST["btnregistrar"])){
    if (!empty($_POST["txtnombre"])) {
        $nombre=$_POST["txtnombre"];
        $verificarNombre=$conexion->query("select count(*) as 'total' from cargo where nombre='$nombre' ");
        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
$(function notificacion() {
    new PNotify({
        title: "ERROR",
        type: "error",
        text: " El cargo <?=$nombre?> ya existe",
        styling: "bootstrap3"
    })
})
</script>
<?php } else {
    $sql=$conexion->query("insert into cargo(nombre) values('$nombre')");
        if ($sql==true) { ?>
            <script>
$(function notificacion() {
    new PNotify({
        title: "CORRECTO",
        type: "success",
        text: " El cargo se ha registrado",
        styling: "bootstrap3"
    })
})
</script>
        <?php } else { ?>
            <script>
$(function notificacion() {
    new PNotify({
        title: "INCORRECTO",
        type: "error",
        text: "ERROR AL REGISTRAR EL CARGOS",
        styling: "bootstrap3"
    })
})
</script>
        <?php }
        }
        
    } else { ?>
        <script>
$(function notificacion() {
    new PNotify({
        title: "ERROR",
        type: "error",
        text: " Los campos estan vacios",
        styling: "bootstrap3"
    })
})
</script>
    <?php } ?>
    <script>
setTimeout(() => {
    window.history.replaceState(null, null, window.location.pathname);
}, 0);
</script>
<?php }

?>