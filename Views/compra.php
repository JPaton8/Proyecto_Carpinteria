<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{


require 'header.php';

if ($_SESSION['compras']==1) {
  require_once "../Models/Negocio.php"; 
  $cnegocio = new Negocio();
  $rsptan = $cnegocio->listar();
  $regn=$rsptan->fetch_object();
    if (empty($regn)) {
      $smoneda='';
      $tipo_impuesto='';
    $nombrenegocio='Configurar datos de su Empresa';

  }else{
    $smoneda=$regn->simbolo;
    $tipo_impuesto=$regn->nombre_impuesto; 
    $nombrenegocio=$regn->nombre;
  };
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Compras <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Fecha</th>
      <th>Proveedor</th>
      <th>Usuario</th>
      <th>Documento</th>
      <th>Número</th>
      <th>Total Compra</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Fecha</th>
      <th>Proveedor</th>
      <th>Usuario</th>
      <th>Documento</th>
      <th>Número</th>
      <th>Total Compra</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>
<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-8 col-md-8 col-xs-12">
      <label for="">Proveedor(*):</label>
      <input class="form-control" type="hidden" name="idingreso" id="idingreso">
      <select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true" required>
        
      </select>
    </div>
      <div class="form-group col-lg-4 col-md-4 col-xs-12">
      <label for="">Fecha(*): </label>
      <input class="form-control" type="date" name="fecha_hora" id="fecha_hora" required>
    </div>
     <div class="form-group col-lg-4 col-md-4 col-xs-12">
      <label for="">Tipo Comprobante(*): </label>
     <select name="tipo_comprobante" id="tipo_comprobante" class="form-control selectpicker" required>   
       <option value="Factura">Factura</option>
     </select>
    </div>
     <div class="form-group col-lg-2 col-md-2 col-xs-12">
      <label for="">Serie: </label>
      <input class="form-control" type="text" name="serie_comprobante" id="serie_comprobante" maxlength="7" placeholder="Serie" required>
    </div>
     <div class="form-group col-lg-2 col-md-2 col-xs-12">
      <label for="">Número: </label>
      <input class="form-control" type="text" name="num_comprobante" id="num_comprobante" maxlength="10" placeholder="Número" required>
    </div>
     <div class="form-group col-lg-4 col-md-4 col-xs-12">
        <label for="">Aplicar Impuesto: </label>
                    <input class="form-control" onchange="modificarSubtotales();" type="text" name="impuesto" id="impuesto">
                  <!-- /input-group -->
    </div>
    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <a data-toggle="modal" href="#myModal">
       <button id="btnAgregarMat" type="button" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar Materiales</button>
     </a>
    </div>

<div class="form-group table-responsive col-lg-12 col-md-12 col-xs-12">

     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
       <thead style="background-color:#8B4513">
        <th>Opciones</th>
        <th>Material</th>
        <th>Cantidad</th>
        <th>Precio Compra</th>
        <th>Subtotal</th>
       </thead>
       <tfoot style="background-color:#F5F5DC">
         <th><span>SubTotal</span><br><span id="valor_impuesto"><?php echo $tipo_impuesto; ?> 0.00</span><br><span>TOTAL</span></th>
         <th></th>
         <th></th>
         <th></th>
         <th><span id="total"><?php echo $smoneda; ?> 0.00</span><br><span id="most_imp" maxlength="4">0.00</span><br><span id="most_total">0.00</span><input type="hidden" step="0.01" name="total_compra" id="total_compra"></th> 
       </tfoot>
       <tbody>
         
       </tbody>
     </table>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
    </div>
  </form>
</div>
<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <!--Modal-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un material</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
          <table id="tblmaterial" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              
            </thead>
            <tbody>
              
            </tbody>
            <tfoot> 
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Descripcion</th>
            </tfoot>
          </table>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  <!--modal para ver la venta-->
 <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Vista de Compra</h4>
        </div>
        <div class="modal-body">
              <div class="form-group col-lg-12 col-md-12 col-xs-12">
      <label for="">Proveedor(*):</label>
      <input class="form-control" type="hidden" name="idingreso" id="idingreso">
     <input class="form-control" type="text" name="idproveedorm" id="idproveedorm" readonly>
    </div>
      <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fecha(*): </label>
      <input class="form-control" type="text" name="fecha_horam" id="fecha_horam" readonly>
    </div>
     <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo Comprobante(*): </label>
    <input class="form-control" type="text" name="tipo_comprobantem" id="tipo_comprobantem" readonly>
    </div>
     <div class="form-group col-lg-4 col-md-4 col-xs-12">
      <label for="">Serie: </label>
      <input class="form-control" type="text" name="serie_comprobantem" id="serie_comprobantem" maxlength="7" readonly>
    </div>
     <div class="form-group col-lg-4 col-md-4 col-xs-12">
      <label for="">Número: </label>
      <input class="form-control" type="text" name="num_comprobantem" id="num_comprobantem" maxlength="10" readonly>
    </div>
    <div class="form-group col-lg-4 col-md-4 col-xs-12">
      <label for="">Impuesto: </label>
      <div class="input-group">
      <input class="form-control" type="text" name="impuestom" id="impuestom" readonly>
      <span class="input-group-addon">%</span>
    </div>
    </div>
<div class="form-group table-responsive col-lg-12 col-md-12 col-xs-12">
     <table id="detallesm" class="table table-striped table-bordered table-condensed table-hover">
       <tbody>
         
       </tbody>
     </table>
    </div>
    </div>
     <div class="form-group col-lg-12 col-md-12 col-xs-12">
      
    </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
        </div>
</div>
</div>
</div>
  <!-- fin Modal-->
<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
 <script src="scripts/compra.js"></script>
 <?php 
}

ob_end_flush();
  ?>

